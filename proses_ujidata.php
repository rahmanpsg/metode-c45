<?php 
if (isset($_POST['proses'])) {
	include 'koneksi.php';

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

    function CariNilai($array, $search_list)
	{
	    foreach ($array as $key => $value) {
	        $keys = array_keys($value);
	        for ($i=0; $i < count($keys); $i++) { 
	            if ($keys[$i] != 'nilai') {
	                if ($value[$keys[$i]] == $search_list[$keys[$i]]) {
	                    $nilai[$key][$keys[$i]] = $value[$keys[$i]];
	                    // print_r($value[$keys[$i]]);
	                    // echo "<hr>";
	                }else{
	                    continue 2;
	                }
	            }else{
	                $nilai[$key][$keys[$i]] = $value[$keys[$i]];
	            }
	        }
	    }
	    if (isset(max($nilai)['nilai'])) {
			return max($nilai)['nilai'];
		}else{
			return null;
		}
	}

    $tbl_attribut = $koneksi->query('SELECT * FROM tbl_attribut');

    foreach ($tbl_attribut as $value) {
	    $attributes[] = $value['attribut'];
	}

	$data_pohonkeputusan = $koneksi->query("SELECT data FROM tbl_pohonkeputusan");

	foreach ($data_pohonkeputusan as $key => $value) {
	    $res_pohonkeputusan[] = (array) json_decode($value['data']);
	}

	// if ($_POST['proses'] == 'ujidata') {
	// 	if ($data_pohonkeputusan->num_rows <= 0) {
	// 		echo json_encode(array('cek'=>'gagal','data'=>'Tabel pohon keputusan tidak ditemukan'));
	// 	}else{

	// 	$data = $_POST['data'];

	// 	$nama = $data[0]['value'];
	// 	$tgl_lahir = new DateTime($data[1]['value']);
	// 	$today = new DateTime();
	// 	$umur = $today->diff($tgl_lahir);
	// 	$umur_res = klasifikasi('umur',$umur->y);

	// 	$pekerjaan = klasifikasi('pekerjaan',$data[2]['value']);
	// 	$penghasilan = klasifikasi('penghasilan',str_replace('.', '', $data[3]['value']));
	// 	$plafond = klasifikasi('plafond',str_replace('.', '', $data[4]['value']));
	// 	$saldo = klasifikasi('saldo',str_replace('.', '', $data[5]['value']));
	// 	$tujuan = klasifikasi('tujuan',$data[6]['value']);
	// 	$jaminan = klasifikasi('jaminan',$data[7]['value']);

	// 	$peminjaman = date_diff(date_create($data[8]['value']),date_create($data[9]['value']));
	// 	$jangka_waktu = klasifikasi('jangka waktu',$peminjaman->y);

	// 	$data_testing = [$umur_res, $pekerjaan, $penghasilan, $plafond, $saldo, $tujuan, $jaminan, $jangka_waktu];

	// 	for ($i=0; $i < count($attributes); $i++) { 
	// 	    $res_testing[$attributes[$i]] = $data_testing[$i];
	// 	}

		
	// 	if(CariNilai($res_pohonkeputusan,$res_testing) == 'LANCAR'):
	// 	    echo json_encode(array('cek'=>'ok','data'=>array_merge(array($nama),$data_testing)));
	// 	elseif(CariNilai($res_pohonkeputusan,$res_testing) == 'MACET'):
	// 	    echo json_encode(array('cek'=>'no','data'=>array_merge(array($nama),$data_testing)));
	// 	else:
	// 		echo json_encode(array('cek'=>null,'data'=>array_merge(array($nama),$data_testing)));
	// 	endif;
		
	// 	}
	// }else
if ($_POST['proses'] == 'ujidata_upload') {
    $data_tbl_keputusan = $koneksi->query("SELECT detail FROM tbl_keputusan WHERE id = 2");
    //     $koneksi->query("TRUNCATE tbl_ujidata");

    if ($data_tbl_keputusan->num_rows <= 0) {
    	// header('location:index.php?menu=ujidata&pesan=gagal'); 
      echo json_encode("gagal");
    }else{

        foreach ($data_tbl_keputusan as $key => $value) {
            $akar = (array) json_decode($value['detail']);
        }

        $attribut = array_values($akar)[0];

        $data_tbl_klasifikasi = $koneksi->query("SELECT klasifikasi FROM tbl_klasifikasi WHERE attribut = '$attribut'");

        foreach ($data_tbl_klasifikasi as $key => $value) {
            $klasifikasi[] = $value['klasifikasi'];
        }

        $data_tbl_keputusan2 = $koneksi->query("SELECT entropy FROM tbl_keputusan WHERE id = 1");

        foreach ($data_tbl_keputusan2 as $key => $value) {
            $entropy = (array) json_decode($value['entropy']);
        }

        for ($i=0; $i < count($klasifikasi); $i++) { 
            $res_entropy[$klasifikasi[$i]] = $entropy[$klasifikasi[$i]];
        }

   //      include "import/excel_reader2.php";

   //      $target = basename($_FILES['inputFile']['name']) ;
   //      move_uploaded_file($_FILES['inputFile']['tmp_name'], $target);
         
   //      chmod($_FILES['inputFile']['name'],0777);
         
   //      $upload = new Spreadsheet_Excel_Reader($_FILES['inputFile']['name'],false);

   //      $jumlah_baris = $upload->rowcount($sheet_index=0);

   //      for ($i=2; $i<=$jumlah_baris; $i++){
         
   //        $nama     = $upload->val($i, 1);
   //        $umur     = $upload->val($i, 2);
   //        $pekerjaan  = $upload->val($i, 3);
   //        $penghasilan  = $upload->val($i, 4);
   //        $plafond  = $upload->val($i, 5);
   //        $saldo  = $upload->val($i, 6);
   //        $tujuan  = $upload->val($i, 7);
   //        $jaminan  = $upload->val($i, 8);
   //        $jangka_waktu  = $upload->val($i, 9);
   //        $data_nasabah = [$umur,$pekerjaan,$penghasilan,$plafond,$saldo,$tujuan,$jaminan,$jangka_waktu];

   //        $data_testing = [klasifikasi('umur',$umur), 
   //                         klasifikasi('pekerjaan',$pekerjaan), 
   //                         klasifikasi('penghasilan',$penghasilan), 
   //                         klasifikasi('plafond',$plafond), 
   //                         klasifikasi('saldo',$saldo), 
   //                         klasifikasi('tujuan',$tujuan), 
   //                         klasifikasi('jaminan',$jaminan), 
   //                         klasifikasi('jangka waktu',$jangka_waktu)];

   //        for ($x=0; $x < count($attributes); $x++) { 
			//     $res_testing[$attributes[$x]] = $data_testing[$x];
			// }

   //        $entropy = $res_entropy[klasifikasi($attribut,$$attribut)];
   //        // $kelas = $c45->predictDataTesting($data_testing);
   //        $kelas = CariNilai($res_pohonkeputusan,$res_testing);

   //        if ($kelas == null) {
   //        	$kelas = "not found";
   //        }

   //        // print_r($kelas);
   //        $res = $koneksi->query("INSERT into tbl_ujidata values('','$nama','".json_encode($data_nasabah)."','$entropy','$kelas')");
   //      }
        $data = $_POST['data'];

        $nama = $data[0]['value'];
        $tgl_lahir = new DateTime($data[1]['value']);
        $today = new DateTime();
        $diff = $today->diff($tgl_lahir);
        $umur = $diff->y;

        $pekerjaan = $data[2]['value'];
        $penghasilan = str_replace('.', '', $data[3]['value']);
        $plafond = str_replace('.', '', $data[4]['value']);
        $saldo = str_replace('.', '', $data[5]['value']);
        $tujuan = $data[6]['value'];
        $jaminan = $data[7]['value'];

        $peminjaman = date_diff(date_create($data[8]['value']),date_create($data[9]['value']));
        $jangka_waktu = $peminjaman->y;

        $data_nasabah = [$umur,$pekerjaan,$penghasilan,$plafond,$saldo,$tujuan,$jaminan,$jangka_waktu];

          $data_testing = [klasifikasi('umur',$umur), 
                           klasifikasi('pekerjaan',$pekerjaan), 
                           klasifikasi('penghasilan',$penghasilan), 
                           klasifikasi('plafond',$plafond), 
                           klasifikasi('saldo',$saldo), 
                           klasifikasi('tujuan',$tujuan), 
                           klasifikasi('jaminan',$jaminan), 
                           klasifikasi('jangka waktu',$jangka_waktu)];

          for ($x=0; $x < count($attributes); $x++) { 
              $res_testing[$attributes[$x]] = $data_testing[$x];
          }

          $entropy = $res_entropy[klasifikasi($attribut,$$attribut)];
          // $kelas = $c45->predictDataTesting($data_testing);
          $kelas = CariNilai($res_pohonkeputusan,$res_testing);

          if ($kelas == null) {
           $kelas = "not found";
           echo json_encode("not found");
          }else{
            $res = $koneksi->query("INSERT into tbl_ujidata values('','$nama','".json_encode($data_nasabah)."','$entropy','$kelas')");
            echo json_encode(true);
          }

          // print_r($kelas);
          
        

        // unlink($_FILES['inputFile']['name']);
        // if ($res) {
        //   header('location:index.php?menu=ujidata&pesan=berhasil');
        // }else{
        //   header('location:index.php?menu=ujidata&pesan=gagal'); 
        // }

  }
  }else if ($_POST['proses'] == 'hapus_data_uji') {
    if ($koneksi->query('TRUNCATE tbl_ujidata')) {
          echo json_encode(true);
      }else{
        echo json_encode(false);
      }
  }
}else{
	header('Location: index.php');
}
?>