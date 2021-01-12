<?php 
	if (isset($_POST['proses'])) {
		include 'koneksi.php';

		if ($_POST['proses'] == 'Tambah') {
			$attribut = $_POST['attribut'];
			$operator = $_POST['operator'];
			$klasifikasi = $_POST['klasifikasi'];

			if ($operator == 'Between') {
				$min = $_POST['min'];
				$max = $_POST['max'];

				$value = json_encode(array($min,$max));

				$query = "INSERT INTO tbl_klasifikasi VALUES ('','$attribut','$operator','$value','$klasifikasi')";
				$res = $koneksi->query($query);
				if ($res) {
					echo json_encode('oke');
				}
			}else{
				$value = $_POST['value'];

				$query = "INSERT INTO tbl_klasifikasi VALUES ('','$attribut','$operator','$value','$klasifikasi')";
				$res = $koneksi->query($query);
				if ($res) {
					echo json_encode('oke');
				}
			}
		}else
		if ($_POST['proses'] == 'Update') {
			$id = $_POST['id'];
			$operator = $_POST['operator'];
			$klasifikasi = $_POST['klasifikasi'];

			if ($operator == 'Between') {
				$min = $_POST['min'];
				$max = $_POST['max'];

				$value = json_encode(array($min,$max));

				$query = "UPDATE tbl_klasifikasi SET value='$value',klasifikasi='$klasifikasi' WHERE id='$id'";
				$res = $koneksi->query($query);
				if ($res) {
					echo json_encode('oke');
				}else{
					echo json_encode('gagal');
				}
			}else{
				$value = $_POST['value'];

				$query = "UPDATE tbl_klasifikasi SET value='$value',klasifikasi='$klasifikasi' WHERE id='$id'";
				$res = $koneksi->query($query);
				if ($res) {
					echo json_encode('oke');
				}else{
					echo json_encode('gagal');
				}
			}
		}else
		if ($_POST['proses'] == 'Hapus') {

			$id = implode($_POST['id'],',');

			$query = "DELETE from tbl_klasifikasi where id in($id)";
			if ($koneksi->query($query)) {
				echo json_encode('oke');
			}else{
				echo json_encode('gagal');
			}
		}
	}
?>