<?php 
error_reporting(0);
if (isset($_POST['proses'])) {

	include("c45.php");
    include('koneksi.php');

	$c45 = new C45;

    function klasifikasi($attribut, $val = '')
    {
        include 'koneksi.php';
        $data = $koneksi->query("SELECT * FROM tbl_klasifikasi WHERE attribut = '$attribut'");
        
        foreach ($data as $key) {
            if ($key['operator'] == 'Between') {
                $value = json_decode($key['value']);
                
                if ($val >= (int) $value[0] AND $val <= (int) $value[1]) {
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '=') {
                $value = $key['value'];

                if ($val == $value){
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '>=') {
                $value = $key['value'];

                if ($val >= (int) $value){
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '>') {
                $value = $key['value'];

                if ($val > (int) $value){
                    return $key['klasifikasi'];
                }
            }
            if ($key['operator'] == '<=') {
                $value = $key['value'];

                if ($val <= (int) $value){
                    return $key['klasifikasi'];
                }
            }else
            if ($key['operator'] == '<') {
                $value = $key['value'];

                if ($val < (int) $value){
                    return $key['klasifikasi'];
                }
            }

        }
    }

	$tbl_data = $koneksi->query('SELECT * FROM tbl_data');
	$koneksi->query("TRUNCATE tbl_keputusan");
    $koneksi->query("TRUNCATE tbl_pohon");
    $koneksi->query("TRUNCATE tbl_pohonkeputusan");

	foreach ($tbl_data as $value) {
    $data[] = array(
                    klasifikasi('pekerjaan',$value['pekerjaan']),
                    klasifikasi('penghasilan',$value['penghasilan']),
                    klasifikasi('plafond',$value['plafond']),
                    klasifikasi('saldo',$value['saldo']),
                    klasifikasi('tujuan',$value['tujuan']),
                    klasifikasi('jaminan',$value['jaminan']),
                    klasifikasi('jangka waktu',$value['jangka_waktu']),
                    $value['kelas']);
	}


	// Nama Atribut data
    $tbl_attribut = $koneksi->query('SELECT * FROM tbl_attribut');

    foreach ($tbl_attribut as $value) {
        $attributes[$value['id']] = $value['attribut'];
    }

	$c45->setData($data)->setAttributes($attributes);
	$c45->hitung();

    if ($_POST['proses'] == 'mining') {
        // function getForward($val=''){
        //     $id = $val['id'];
        //     $koneksi = mysqli_connect('localhost','root','','c45');
        //     $data = $koneksi->query("SELECT * FROM tbl_pohon");     

        //     foreach ($data as $key => $value) {
        //         if ($key < $id) {
        //             $res[] = $value;
        //         }
        //     }
        //     $i=count($res)-1;
        //     $forward = $res[$i]['forward'];
        //     while($forward != ''){
        //         $result['nilai'] = $val['kelas'];
        //         $result[$val['root']] = $val['attribut'];
        //         if ($res[$i]['root'] == $forward) {
        //             $result[$res[$i]['root']] = $res[$i]['attribut'];
        //             $forward = $res[$i]['forward'];
        //         }
        //         $i--;
        //     }

        //     if (!isset($result)) {
        //         $result['nilai'] = $val['kelas'];
        //         $result[$val['root']] = $val['attribut'];
        //     }

        //     return array_reverse($result);
        // }
        function getForward($val=''){
            $id = $val['id'];
            $koneksi = mysqli_connect('localhost','root','','c45');
            $data = $koneksi->query("SELECT * FROM tbl_pohon");     

            foreach ($data as $key => $value) {
                if ($key < $id) {
                    $res[] = $value;
                }
            }
            $i=count($res)-1;
            $forward = $res[$i]['forward'];
            while($forward != ''){
                $result['nilai'] = $val['kelas'];
                $result[$val['root']] = $val['attribut'];
                if ($res[$i]['root'] == $forward) {
                    $result[$res[$i]['root']] = $res[$i]['attribut'];
                    $forward = $res[$i]['forward'];
                }
                $i--;
            }

            if (!isset($result)) {
                $result['nilai'] = $val['kelas'];
                $result[$val['root']] = $val['attribut'];
            }

            return array_reverse($result);
        }

        $data_pohon = $koneksi->query("SELECT * FROM tbl_pohon");
        foreach ($data_pohon as $key => $value) {
            $pohon[] = $value;
        }

        while ($res_pohon = array_pop($pohon)) {
            $kelas = $res_pohon['kelas'];
                if ($kelas != '-') {
                    // $result[] = getForward($res_pohon);
                    $result = json_encode(getForward($res_pohon));
                    $koneksi->query("INSERT INTO tbl_pohonkeputusan VALUES('','$result')");
                }
        }

        echo json_encode('oke');
    }
}else{
    header('Location: index.php');
}
 ?>