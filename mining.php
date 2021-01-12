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
function floattostr( $val )
{
    preg_match( "#^([\+\-]|)([0-9]*)(\.([0-9]*?)|)(0*)$#", trim($val), $o );
    return $o[1].sprintf('%d',$o[2]).($o[3]!='.'?$o[3]:'');
}

function functionSortKeys($a, $b){
  $a = preg_replace('/-(.*)/', '', $a);
  $b = preg_replace('/-(.*)/', '', $b);


  $a = preg_replace('/[^a-zA-Z0-9]/', '', $a);
  $b = preg_replace('/[^a-zA-Z0-9]/', '', $b);
  // return strcasecmp($a, $b);

  if ($a==$b) return 0;
  return ($a<$b)?-1:1;
}

foreach ($data as $key => $value) {
  $detail[] = json_decode($value['detail'],true);
  $attribut[] = json_decode($value['attribut'],true);
  $entropy[] = json_decode($value['entropy'],true);
  $gain[] = json_decode($value['gain'],true);
}

?>

<div class="container-fluid p-0">
 <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="data_nasabah">
  <div class="w-100">
    <h2 class="mb-0">C4.5</h2>
<?php
for ($i=0; $i < count($attribut); $i++) { 
  echo '<h4>Tabel : '.$detail[$i][0].'</h4>';
  if ($detail[$i][1] != '') {
    echo "<h4>Kriteria : ".$detail[$i][1].'</h4>';
  };
  $total = $detail[$i]['LANCAR']+$detail[$i]['MACET'];
 ?>
  <table data-toggle="table" data-row-style="rowStyle">
    <thead class="text-center">
      <tr>
        <th rowspan="2" class="text-center">No</th>
        <th rowspan="2">Attribut</th>
        <th rowspan="2">Kriteria</th>
        <th>Lancar</th>
        <th>Macet</th>
        <th>Total</th>
        <th>Entrophy</th>
        <th rowspan="2" data-field="gain" class="text-center">Gain</th>
        <th data-field="maxgain" data-visible="false">Max Gain</th>
      </tr>
      <tr>
        <th class="text-center"><?php echo $detail[$i]['LANCAR']; ?></th>
        <th class="text-center"><?php echo $detail[$i]['MACET']; ?></th>
        <th class="text-center"><?php echo $total; ?></th>
        <th class="text-center"><?php echo floattostr($detail[$i]['total']); ?></th>
      </tr>
    </thead>
    <tbody>
      <?php 
      $no = 1;
      $index = 0;
        foreach ($attribut[$i] as $key => $value){
      ?>
      <tr>
        <td><?php echo $no++; ?></td>
        <td><?php echo ucfirst($value[0]); ?></td>
        <td>
        <?php 
        uksort($value, "functionSortKeys");
        foreach ($value as $key => $val):
          if ($key != '0') {
            echo $key.'<br>';
          }
        endforeach 
        ?>
        </td>
        <td>
        <?php 
        foreach ($value as $key => $val):
          if ($key != '0') {
            if (isset($val['LANCAR'])) {
              echo $val['LANCAR'].'<br>';
            }else{
              echo '0'.'<br>';
            }
          }
        endforeach 
        ?>
        </td>
        <td>
        <?php 
        foreach ($value as $key => $val):
          if ($key != '0') {
            if (isset($val['MACET'])) {
              echo $val['MACET'].'<br>';
            }else{
              echo '0'.'<br>';
            }
          }
        endforeach 
        ?>
        </td>
        <td>
        <?php 
        foreach ($value as $key => $val):
          if ($key != '0') {
            if (isset($val['LANCAR'])) {
              $lancar = $val['LANCAR'];
            }else{
              $lancar = 0;
            }
            if (isset($val['MACET'])) {
              $macet = $val['MACET'];
            }else{
              $macet = 0;
            }
            echo $lancar + $macet.'<br>';
          }
        endforeach 
        ?>
        </td>
        <td>
        <?php 
        foreach ($value as $key => $val):
          if ($key != '0') {
            echo floattostr($entropy[$i][$key]).'<br>';
          }
        endforeach 
        ?>
        </td>
        <td><?php echo floattostr($gain[$i][$index++]); ?></td>
        <td><?php echo floattostr(max($gain[$i])); ?></td>
      </tr>
      <?php 
      }
      ?>
    </tbody>
  </table>
  <hr>
<?php   
}
?>
</div>
</section>
</div>
<?php
}
?>

<script type="text/javascript">
  function rowStyle(row, index) {
    var classes = [
      'table-secondary',
      'table-warning',
    ]

    if (row.gain == row.maxgain) {
      if (row.gain == "0") {
        return {
          classes: classes[0]
        }
      }else{
        return {
          classes: classes[1]
        }
      }
    }
    return {}
  }
</script>
