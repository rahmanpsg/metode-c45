<?php 
	include('koneksi.php');

	function menghitungUmur($tgllahir)
	{
		$today = new DateTime();
		$umur = $today->diff(new DateTime($tgllahir));
		return $umur->y;
	}

	function menghitungJangkaWaktu($awal,$akhir)
	{
		$wktu_peminjaman = new DateTime($awal);
		$selisih = $wktu_peminjaman->diff(new DateTime($akhir));
		return $selisih->y;
	}

	if (isset($_POST['proses'])) {
		if ($_POST['proses'] == 'tambah_data_nasabah') {
			$keys = array_column($_POST['data'],'name');
			array_shift($keys);
			$values = array_column($_POST['data'],'value');
			array_shift($values);
			//Menghitung umur
			$keys[] = "umur";
			$values[] = menghitungUmur($values[1]);
			//Menghitung jangka waktu
			$keys[] = "jangka_waktu";
			$values[] = menghitungJangkaWaktu($values[8],$values[9]);
			//Memecah array kolom dan value menjadi string
			$kolom = implode(", ", $keys);
			
			$escaped_values = array_map(array($koneksi, 'real_escape_string'), array_values($values));
    		foreach ($escaped_values as $idx=>$datax) $escaped_values[$idx] = "'".$datax."'";

    		$nilai = implode(", ", str_replace(".","",$escaped_values));

			$query = "INSERT INTO tbl_data ($kolom) VALUES ($nilai)";
			$tambah = $koneksi->query($query);

			echo json_encode($tambah);
		}else
		if ($_POST['proses'] == 'update_data_nasabah') {
			$keys = array_column($_POST['data'],'name');
			$values = array_column($_POST['data'],'value');
			$id = $values[0];
			foreach ($keys as $key => $value) {
				$data[] = $value." = '".$values[$key]."'";
			}
			array_shift($data);

			//Menghitung umur
			$data[] = "umur = '".menghitungUmur($values[2])."'";
			//Menghitung jangka waktu
			$data[] = "jangka_waktu = '".menghitungJangkaWaktu($values[9],$values[10])."'";
			//Memecah array menjadi string
			$set = implode(", ",str_replace(".", "", $data));

			$query = "UPDATE tbl_data SET $set WHERE id = '$id'";
			$update = $koneksi->query($query);
			
			echo json_encode($update);
		}else
		if($_POST['proses'] == 'hapus_data_nasabah') {
			$id = $_POST['data']['id'];

			if ($koneksi->query("DELETE FROM tbl_data WHERE id = $id")) {
				echo json_encode(true);
			}
		}else
		if ($_POST['proses'] == 'hapus_all_data_nasabah') {
			if ($koneksi->query('TRUNCATE tbl_data') AND $koneksi->query('TRUNCATE tbl_keputusan') AND $koneksi->query('TRUNCATE tbl_pohon') AND $koneksi->query('TRUNCATE tbl_pohonkeputusan')) {
				echo json_encode('oke');
			}
		}
	}else{
		 header('Location: index.php');
	}
?>