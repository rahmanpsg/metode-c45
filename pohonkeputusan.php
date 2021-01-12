<?php 
include('koneksi.php');

$klasifikasi = $koneksi->query("SELECT * FROM tbl_klasifikasi"); 
$data = $koneksi->query("SELECT * FROM tbl_keputusan");

if ($klasifikasi->num_rows == 0) {
?>
<div class="container-fluid p-0">
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="data_nasabah">
<div class="w-100">
<h2 class="mb-0">Anda belum melakukan proses klasifikasi</h2>
<div class="subheading mb-1">Silahkan tambahkan klasifikasi di menu <a href="index.php?menu=klasifikasi">Klasifikasi</a></div>
</div>
</section>
</div>
<?php
}else
if ($data->num_rows == 0) {
?>
<div class="container-fluid p-0">
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="data_nasabah">
<div class="w-100">
<h2 class="mb-0">Belum ada data yang tersimpan</h2>
<div class="subheading mb-1">Silahkan lakukan proses mining di menu <a href="index.php?menu=nasabah">Data Nasabah</a></div>
</div>
</section>
</div>
<?php
}else{
    $data_pohon = $koneksi->query("SELECT * FROM tbl_pohon");

    function createTreeView($array, $currentParent, $currLevel = 0, $prevLevel = -1) {

        foreach ($array as $categoryId => $category) {

        if ($currentParent == $category['parent_id']) {                       
            if ($currLevel > $prevLevel) echo " <ul> "; 

            if ($currLevel == $prevLevel) echo " </li> ";

            echo "<li id='$categoryId'><b>".ucfirst($category['name']).' : '.$category['attribut'];
             if($category['kelas'] != '-'): echo ', Kelas = <u>'.$category['kelas'].'</u>'; endif;
             echo "</b>";

            if ($currLevel > $prevLevel) { $prevLevel = $currLevel; }

            $currLevel++; 

            createTreeView ($array, $categoryId, $currLevel, $prevLevel);

            $currLevel--;               
            }   

        }

        if ($currLevel == $prevLevel) echo " </li>  </ul> ";

        }  

?>
<link rel="stylesheet" href="vendor/jstree/themes/default/style.min.css" />
<link rel="stylesheet" href="css/fontstyle.css">
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="ujidata">
  <div class="w-100">
    <h2 class="mb-0">POHON KEPUTUSAN</h2>
    <div class="subheading mb-1">Hasil dari metode c4.5</div>
    
    <div id="info"></div>
    <div id="tree">
    <?php 
        $arrayCategories = array();
 
        while($row = mysqli_fetch_assoc($data_pohon)){ 
         $arrayCategories[$row['id']] = array("parent_id" => $row['parent_id'], "name" =>                       
         $row['root'], "attribut" => $row['attribut'], "kelas" => $row['kelas']);   
          }

        createTreeView($arrayCategories, 0);
    ?>
    </div>

      </div>
</section>
<hr class="m-0">
<script src="vendor/jquery/jquery.js"></script>
<script src="vendor/jstree/jstree.min.js"></script>

<script type="text/javascript">
    var arrayCategories = <?php echo json_encode($arrayCategories); ?>;
    $('#tree').jstree(
    {
        "types": {
            "default": {"icon":"fas fa-tree"}
        },
        "plugins": ["types"]
    });

    $('#tree').jstree(true).open_all();

    $('#tree').on("changed.jstree", function (e, data) {
        var push = [];
      // console.log(data.selected);
      // console.log(arrayCategories[data.selected]);
      if(arrayCategories[data.selected].kelas != '-'){
        var id = parseInt(data.selected);
        var parent_id = arrayCategories[id].parent_id;
        while(id != 0){
            // console.log(arrayCategories[id].kelas);
            if (arrayCategories[id].kelas != '-') {
                push.unshift(arrayCategories[id].name + ' : ' + arrayCategories[id].attribut + ' maka kelas = ' + arrayCategories[id].kelas);
            }else{
                push.unshift(arrayCategories[id].name + ' : ' + arrayCategories[id].attribut);
            }
            id = arrayCategories[id].parent_id;
        }
        $('#info').show();
        $('#info').html("<div class='alert alert-info alert-dismissable'><button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button><h4>Jika "+ push.join(', ') +" </h4></div>");
      }else{
        $('#info').hide();
      }
      
      
    });
</script>
<?php 
}
 ?>