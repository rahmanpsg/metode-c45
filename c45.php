<?php
class C45 
{
    protected $data;
    protected $attributes;
    protected $target;
    protected $rules;
    protected $finalRules;
    protected $hasilPrediksi;
    private $tabel;
    private $tabel2;

    public function setData(array $data) 
    {
        $this->data = $data;

        return $this;
    }

    public function setAttributes(array $attributes)
    {
        $this->attributes = $attributes;

        return $this;
    }

    protected function getTarget() 
    {
        $target = [];
        foreach($this->data as $item) {
            $target[] = $item[count($item) -1];
        }

        return $target;
    }


    public function hitung()
    {
        $this->_hitung($this->data, $this->attributes);
        $this->generateRules();
    }

    public function _hitung(array $data, array $attributes, $base = null, $kasus = null)     
    {
        // HITUNG JUMLAH DATA
        $jumlah_data = count($data);

        // MENGAMBIL DATA KOLOM TARGET
        $kolom_target = [];
        foreach($data as $item) {
            $kolom_target[] = $item[count($item)-1];
        }
        // print_r(array_count_values($kolom_target));
        // MENGHITUNG NILAI ENTROPY
        $entropy_total = 0;
        foreach(array_count_values($kolom_target) as $t) {
            $entropy_total = $entropy_total - $t/$jumlah_data * log($t/$jumlah_data, 2);
            $total[] = $t;
            $res_total = array_merge(array_count_values($kolom_target),array('total'=>number_format($entropy_total,5)));
        }

        /**
         * UNTUK TIAP ATRIBUT:
         *     - MENGHITUNG ENTROPY TIAP KASUS
         *     - MENGHITUNG GAIN
         */

        include('koneksi.php');

        $no=1;
        foreach($attributes as $indexAttribute => $label) {

            $data_kolom_atribut = []; // VARIABEL UNTUK MENAMPUNG DATA KOLOM ATRIBUT KE-I
            $data_kolom_target = [];  // VARIABEL UNTUK MENAMPUNG DATA KOLOM TARGET
            $data_atribut_and_target = [];
            foreach ($data as $key => $value) {
                $data_kolom_atribut[$key] = $value[$indexAttribute-1];
                $data_kolom_target[$key] = $value[count($value)-1];
                $data_atribut_and_target[] = [$value[$indexAttribute-1], $value[count($value)-1]];
            }
            // echo "<br>";
            
            $jumlah_data_tiap_kasus = array_count_values($data_kolom_atribut);

            $label_target = array_unique($this->getTarget());
            $total_data= 0;

            $data_per_kasus = [];
            foreach($data_atribut_and_target as $item) {
                if(!isset($data_per_kasus[$item[0]][$item[1]])) 
                    $data_per_kasus[$item[0]][$item[1]] = 1;
                else
                    $data_per_kasus[$item[0]][$item[1]]++;
            }

            $lx = 0;
            $labels[$indexAttribute] = [];


            foreach($data_per_kasus as $case=>$value){
                $entropyAttribute=0;
                $l = 0;
                $jumlah_case = array_sum($value);
                foreach($value as $i=>$v) {
                    $pi = $v/$jumlah_case;
                    $entropyAttribute = $entropyAttribute -$pi*log($pi,2);
                }
                
                // echo "<td>$entropyAttribute</td>";
                if($entropyAttribute == 0) {
                    $nilai_default = array_keys($value)[0];
                    $labels[$indexAttribute][$case] = $nilai_default;
                }
                $leafs[$indexAttribute][$case] = $entropyAttribute;
                $entr[$case] = number_format($entropyAttribute,5);
                // $kds[$case] = array('ENTROPY'=>$entropyAttribute);

                // echo $case." Entropy ", $entropyAttribute , "<br>";
                
                $lx += $jumlah_case/$jumlah_data*$entropyAttribute;

            }

            $gain =  $entropy_total - $lx;
            $gains[$indexAttribute] = $gain;
            $res_gains[] = number_format($gain,5);
            // print_r($res_gains);
            // echo "Gain " . $gain, "<br>";

            $arr[] = array_merge(array($label),$data_per_kasus);
            // print_r($data_per_kasus);

                
        }
        // $res = array_merge($arr,$leafs);
        
        if ($this->getDetail() == '' && $this->getDetail2() == '') {
            $det1[] = "Semua Data";
            $det2[] = "";
            $det = array_merge($det1,$det2);
        }else{
            $det1[] = $this->getDetail();
            $det2[] = $this->getDetail2();
            $det = array_merge($det1,$det2);
        }

        $detail = array_merge($det,$res_total);

        $json_detail = json_encode($detail);

        if (isset($arr)) {
        
        $json_attribute = json_encode($arr);
        $json_entropy = json_encode($entr);
        $json_gain = json_encode($res_gains);
        
        $query = "INSERT INTO tbl_keputusan (detail,attribut,entropy,gain) VALUES ('$json_detail','$json_attribute','$json_entropy','$json_gain')";

        if ($json_attribute != 'null') {
            $koneksi->query($query);
        }  
        
        }

        // Mengurutkan gain, untuk menjacari gain terbesar
        $l = arsort($gains);
        // Mengambil gain terbesar
        $root = array_keys($gains)[0]; 

        $this->rules[$root] = [];
        if($base != null) {
            $this->rules[$base][$kasus] = [
                'kasus' => $kasus,
                'forward' => $root
            ];
        }
        
        // print_r($this->rules);
        // echo "<h1>Atribut root ", $attributes[$root], "</h1>";
        // Nama Atribut data
        $tbl_attribut = $koneksi->query('SELECT * FROM tbl_attribut');
        foreach ($tbl_attribut as $value) {
            $nama_attributes[$value['id']] = $value['attribut'];
        }
        $this->setDetail($attributes[$root]);


        foreach($leafs[$root] as $label => $entropy) {
            $this->setDetail2($label);
             // echo "<h1 style='color:red'>$label $entropy</h1>";

            if($entropy == 0) {
                $this->rules[$root][$label] = [
                    "kasus" => $label, 
                    "nilai" => $labels[$root][$label]
                ];
                // echo "<h1 style='color:blue'> $root ". $label . ' '.$labels[$root][$label], "</h1>";
                $kelas = $labels[$root][$label];

                $koneksi->query("INSERT into tbl_pohon VALUES('','$nama_attributes[$root]','$label','$nama_attributes[$base]',".$this->getForward($nama_attributes[$base]).",'$kelas')");
            }

            if($entropy > 0 && $entropy <= 1) {
                if ($base != null) {
                    // print_r($this->rules[$base][$kasus]);
                    // print_r($nama_attributes[$base]);
                    $koneksi->query("INSERT into tbl_pohon VALUES('','$nama_attributes[$root]','$label','$nama_attributes[$base]',".$this->getForward($nama_attributes[$base]).",'-')");
                    // echo "Roote ".$root;
                    $this->setDetail($nama_attributes[$root]);
                    $this->rules[$root][$label] = [
                        "kasus" => $label.'-', "forward" => $base+1

                    ];
                    // echo "<hr>", $root;
                    // echo "<hr>";
                } else {
                    $this->rules[$root][$label] = $label;
                    // echo "<hr>", $root;
                    $koneksi->query("INSERT into tbl_pohon VALUES('','$nama_attributes[$root]','$label','','0','-')");
                }

                // Hapus atribut yang telah menjadi root
                unset($attributes[$root]);

                $data_next_itarasi = [];
                foreach($data as $index=>$itemData) {
                    if($itemData[$root - 1] == $label) {
                        $data_next_itarasi[] = $itemData;
                    }
                }
                // Next Iterasi
                $this->_hitung($data_next_itarasi, $attributes, $root, $label);
            }

        }

    }

    public function getForward($attr){
        if ($attr == '') {
            return '0';
        }else{
            return "(SELECT a.id FROM tbl_pohon a WHERE a.root = '$attr' ORDER BY a.id DESC LIMIT 1)";
        }
    }

    public function setDetail($tabel){
        $this->tabel = $tabel;
    }

    public function getDetail(){
        return $this->tabel;
    }

    public function setDetail2($tabel2){
        $this->tabel2 = $tabel2;
    }

    public function getDetail2(){
        return $this->tabel2;
    }

    public function _printRules($rules = null, $tab = 2)
    {
        $root = array_keys($rules)[0];
        $root_data = array_values($rules)[0];
        echo "<ul id='pohon'>";
        foreach($root_data as $kasus=>$data){
            if(isset($data['nilai'])) {
                echo "<li>if ", strtoupper($root), " : ", strtoupper($kasus) ,"</li>";
                echo "&nbsp;&nbsp;&nbsp; return ", strtoupper($data['nilai']), "<br>";
            } 
            if(isset($data['forward'])) {
                $l[$data['attribute']] = $data['forward'];
                // print_r($l);
                echo "<li>if ", strtoupper($root), " : ", strtoupper($kasus)," </li>";
                $this->_printRules($l, $tab = $tab*2);
            }

        }
        echo "</ul>";
    }

    public function generateRules() 
    {
        $l = $this->_generateRules(array_values($this->rules)[0]);
        $x = array_keys($this->rules)[0];
        $rules[$this->attributes[$x]] = $l;
        $this->finalRules = $rules;
        // print_r($rules);
    }
    public $l = [];

    public function _generateRules($i)
    {
        $l = $i;
        foreach($i as $kasus=>$item) {
            if(isset($item['forward'])) {
                $l[$kasus]['attribute'] = $this->attributes[$item['forward']];
                $l[$kasus]['forward'] = $this->_generateRules($this->rules[$item['forward']]);
            }
        }

        return $l;
    }

    public function printRules()
    {
        $this->_printRules($this->finalRules);
    }

    public function predictDataTesting(array $data = []) 
    {
        $_data = array_combine($this->attributes, $data);
        $this->_predictDataTesting($_data, $this->finalRules);
        return $this->hasilPrediksi;
    }

    public function _predictDataTesting(array $data, array $rules)
    {
        $attribute = array_keys($rules)[0];
        $kasusAttribute = array_values($rules)[0];

        foreach($kasusAttribute as $kasus => $item) {
            if($data[$attribute] == $kasus && isset($item['nilai'])) {
                $this->hasilPrediksi = strtoupper($item['nilai']);
            }

            if($data[$attribute] == $kasus && isset($item['forward'])) {
                $ll[$item['attribute']] = $item['forward'];
                $this->_predictDataTesting($data, $ll);
            }
        }
    }

}
?>