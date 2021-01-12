 <link rel="stylesheet" href="css/style.css">
 <script src="vendor/jquery/jquery.js"></script>
<?php
  include('koneksi.php');

  $data = $koneksi->query("SELECT * FROM tbl_data");

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

  if (isset($_POST['upload'])) {
    include "import/excel_reader2.php";

    $target = basename($_FILES['inputFile']['name']) ;
    move_uploaded_file($_FILES['inputFile']['tmp_name'], $target);
     
    chmod($_FILES['inputFile']['name'],0777);
     
    $upload = new Spreadsheet_Excel_Reader($_FILES['inputFile']['name'],false);

    $jumlah_baris = $upload->rowcount($sheet_index=0);

    $berhasil = 0;
    for ($i=2; $i<=$jumlah_baris; $i++){
     
      $nama     = $upload->val($i, 1);
      $tgl_lahir = $upload->val($i, 2);
      $umur     = menghitungUmur($tgl_lahir);
      $pekerjaan  = $upload->val($i, 3);
      $penghasilan  = $upload->val($i, 4);
      $plafond  = $upload->val($i, 5);
      $saldo  = $upload->val($i, 6);
      $tujuan  = $upload->val($i, 7);
      $jaminan  = $upload->val($i, 8);
      $waktu_peminjaman = $upload->val($i, 9);
      $batas_peminjaman = $upload->val($i, 10);
      $jangka_waktu = menghitungJangkaWaktu($waktu_peminjaman,$batas_peminjaman);
      $kelas  = $upload->val($i, 11);

     
      if($nama != "" && $umur != "" && $pekerjaan != "" && $penghasilan != "" && $plafond != "" && $saldo != "" && $tujuan != "" && $jaminan != "" && $jangka_waktu != "" && $kelas != ""){

        $res = $koneksi->query("INSERT into tbl_data values('','$nama','$tgl_lahir','$umur','$pekerjaan','$penghasilan','$plafond','$saldo','$tujuan','$jaminan','$waktu_peminjaman','$batas_peminjaman','$jangka_waktu','$kelas')");
        $berhasil++;
      }
    }
    unlink($_FILES['inputFile']['name']);
    if ($res) {
      ?>
        <script> location.replace("?menu=nasabah&pesan=berhasil");</script>
      <?php
    }else{
      ?>
        <script> location.replace("?menu=nasabah&pesan=gagal");</script>
      <?php 
    }
  }
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'berhasil') {
      echo "<div class='alert alert-info alert-dismissable'>
                    <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
                    <h4><i class='icon fa fa-check'></i> Success. </h4>
                    Data berhasil diimport
                  </div>";
    }else
      if ($_GET['pesan'] == 'gagal') {
      echo "<div class='alert alert-danger alert-dismissable'>
            
            <h4><i class='icon fa fa-ban'></i> Error! </h4>
            Data gagal diimport
        </div>";
    }

  }
?>

<div class="container-fluid p-0">
   <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="data_nasabah">
    <div class="w-100">
      <h2 class="mb-0">Data Nasabah</h2>
      <div class="subheading mb-1">Import Data Dari Excel</div>
        
      <form method="post" enctype="multipart/form-data" action="">
      <div class="input-group mb-3">
        <input type="file" class="form-control col-4 font-weight" name="inputFile" accept="application/vnd.ms-excel" onchange="readUrl(this)" data-title="Drag and drop a file" required>
        <div class="input-group-prepend">
            <button class="btn btn-info" name="upload" type="submit"><i class="fa fa-upload"></i> Import</button>
          </div>
      </div>
      </form>

      <button class="btn btn-primary" onclick="setModalTambah()" data-toggle="modal" data-target="#myNasabah"><i class="fa fa-plus-circle"></i> Tambah Data Nasabah</button>
      <button class="btn btn-danger" onclick="hapustable()"><i class="fa fa-trash-o"></i> Hapus Semua Data Nasabah</button>
      <button class="btn btn-info" onclick="prosesmining()"><i class="fa fa-exchange"></i> Proses Mining</button>
      
        <table id="table" class="table table-sm" data-toggle="table" data-pagination="true" data-search="true">
          <thead>
          <tr>
            <th>Nama</th>
            <th data-formatter="tahunFormatter">Umur</th>
            <th>Pekerjaan</th>
            <th data-formatter="hargaFormatter">Penghasilan</th>
            <th data-formatter="hargaFormatter">Plafond</th>
            <th data-formatter="hargaFormatter">Saldo</th>
            <th>Tujuan</th>
            <th>Jaminan</th>
            <th data-formatter="tahunFormatter">Jangka Waktu</th>
            <th>Kelas</th>
            <th class="col-md-1">Aksi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no=1;
            foreach ($data as $key => $value) {
            echo "<tr>
                    <td>".$value['nama']."</td>
                    <td>".$value['umur']."</td>
                    <td>".$value['pekerjaan']."</td>
                    <td>".$value['penghasilan']."</td>
                    <td>".$value['plafond']."</td>
                    <td>".$value['saldo']."</td>
                    <td>".$value['tujuan']."</td>
                    <td>".$value['jaminan']."</td>
                    <td>".$value['jangka_waktu']."</td>
                    <td>".$value['kelas']."</td>
                    <td><button data-toggle='modal' title='Ubah' class='btn btn-light' onclick='setModalUpdate(".json_encode($value).");' data-target='#myNasabah'><i style='color: #0000ff;' class='fa fa-pencil-square-o' aria-hidden='true'></i></button>
                        <button data-toggle='tooltip' title='Hapus' class='btn btn-light' onclick='Hapus(".json_encode($value).");'><i style='color: #ff1500;' class='fa fa-trash-o' aria-hidden='true'></i></button></td>
                  </tr>";
            }
          ?>
          </tbody>
        </table>  

<!-- Modal Nasabah -->
<div id="myNasabah" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal blue">
                <h4 class="modal-title">Form <font id="aksi_nasabah">Tambah</font> DATA Nasabah</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close blue" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
              <form id="formModalNasabah"">
              <input type="hidden" class="form-control" name="id_nasabah">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="input-group mb-3">          
                          <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                              <span class="input-group-text">Tanggal Lahir </span>
                            </div>
                            <input type="date" class="form-control" name="tanggal_lahir" id="tanggal_lahir">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="pekerjaan">Pekerjaan</label>
                          </div>
                          <select class="custom-select" name="pekerjaan" id="pekerjaan">
                            <option selected value="">- Pilih -</option>
                            <option value="PNS">PNS</option>
                            <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
                          </select>
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Penghasilan </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Penghasilan" id="penghasilan" name="penghasilan">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Plafond </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Plafond" id="plafond" name="plafond">
                        </div>

                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                              <span class="input-group-text">Saldo </span>
                            </div>
                            <input type="text" class="form-control" placeholder="Saldo" id="saldo" name="saldo">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="tujuan">Tujuan</label>
                          </div>
                          <select class="custom-select" name="tujuan" id="tujuan">
                            <option selected value="">- Pilih -</option>
                            <option value="PRODUKTIF">PRODUKTIF</option>
                            <option value="KONSUMTIF">KONSUMTIF</option>
                          </select>
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="jaminan">Nilai Jaminan</label>
                          </div>
                          <select class="custom-select" name="jaminan" id="jaminan">
                            <option selected value="">- Pilih -</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                          </select>
                        </div>

                        <div class="input-group mb-3">
                            <input type="date" class="form-control" placeholder="Jangka Waktu" name="waktu_peminjaman" id="waktu_peminjaman" title="Waktu Peminjaman">
                            
                            <input type="date" class="form-control" placeholder="Jangka Waktu" name="batas_peminjaman" id="batas_peminjaman" title="Batas Peminjaman">
                        </div>

                        <div class="input-group mb-3">
                          <div class="input-group-prepend">
                            <label class="input-group-text" for="kelas">Kelas</label>
                          </div>
                          <select class="custom-select" name="kelas" id="kelas">
                            <option selected value="">- Pilih -</option>
                            <option value="LANCAR">LANCAR</option>
                            <option value="MACET">MACET</option>
                          </select>
                        </div>
                </div>
            </div>
            </form>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn btn-primary" id="btn_modal_nasabah">Simpan</a>
        </div>
    </div>
</div>
</div>
</div>

<script type="text/javascript">
$('#nama').change(function(){
    $(this).val($(this).val().toUpperCase());
});

function prosesmining(){
  jQuery.ajax({
    type: "POST",
    url: "proses_c45.php",
    dataType: "JSON",
    data: {proses:'mining'},
    beforeSend: function() {
        // Swal.showLoading();
        Swal.fire({
          title: 'Sedang melakukan proses mining',
          timerProgressBar: true,
          onBeforeOpen: () => {
            Swal.showLoading()
          }})
    },
    success: function(res){
      if (res == 'oke') {
        Swal.fire(
          'Informasi',
          'Data berhasil diproses',
          'success'
        )
        setTimeout(function(){window.location = "index.php?menu=c45"},1200);
      }
    },
    error: function(xhr, ajaxOptions, thrownError){
      console.log(xhr.responseText);
    }
  });
}

function setModalUpdate(data){
  $('#aksi_nasabah').text('UBAH');
  $('input[name=id_nasabah]').val(data['id']);
  $('input[name=nama]').val(data['nama']);
  $('input[name=tanggal_lahir]').val(data['tanggal_lahir']);
  $('select[name=pekerjaan]').val(data['pekerjaan']);
  $('input[name=penghasilan]').val(formatRupiah(data['penghasilan']));
  $('input[name=plafond]').val(formatRupiah(data['plafond']));
  $('input[name=saldo]').val(formatRupiah(data['saldo']));
  $('select[name=tujuan]').val(data['tujuan']);
  $('select[name=jaminan]').val(data['jaminan']);
  $('input[name=waktu_peminjaman]').val(data['waktu_peminjaman']);
  $('input[name=batas_peminjaman]').val(data['batas_peminjaman']);
  $('select[name=kelas]').val(data['kelas']);
  $('#btn_modal_nasabah').text('Update');
}

function setModalTambah(){
  $("#formModalNasabah").trigger('reset');
  $('#aksi_nasabah').text('TAMBAH');
  $('#btn_modal_nasabah').text('Simpan');
}

$('#btn_modal_nasabah').on('click',function(e){
  data = $('#formModalNasabah').serializeArray();
  
  var lanjut = true;
  // index dimulai dari 1 karena index 0 adalah id_nasabah
  for (var i = 1; i < data.length; i++) {
    if (data[i].value == "") {
      $('#'+data[i].name).focus();
      lanjut = false;
      break;
    }
      lanjut = true;
  }

if (lanjut) {
  if(this.text == "Simpan"){
    jQuery.ajax({
      type: "POST",
      url: "proses_nasabah.php",
      dataType: "json",
      data: {proses:'tambah_data_nasabah',data:data},
      success: function(res){
        if(res){
          Swal.fire(
              'Informasi',
              'Data berhasil ditambahkan',
              'success'
            )
          setTimeout(function(){window.location = "index.php?menu=nasabah"},1200);
        }else{
          Swal.fire(
              'Informasi',
              'Data gagal ditambahkan',
              'error'
            )
        }
      }
    })
  }else
  if(this.text == "Update"){
    jQuery.ajax({
      type: "POST",
      url: "proses_nasabah.php",
      dataType: "JSON",
      data: {proses:'update_data_nasabah',data:data},
      success: function(res){
        if(res){
          Swal.fire(
              'Informasi',
              'Data berhasil diubah',
              'success'
            )
          setTimeout(function(){window.location = "index.php?menu=nasabah"},1200);
        }else{
          Swal.fire(
              'Informasi',
              'Data gagal diubah',
              'error'
            )
        }
      }
    })
  }
}
})

function Hapus(data){
Swal.fire({
    title: "Warning",
    text: "Anda yakin untuk menghapus "+data.nama+" ?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#001473',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya',
    cancelButtonText: 'Batal'
}).then(function(result){
  jQuery.ajax({
      type: "POST",
      url: "proses_nasabah.php",
      dataType: "JSON",
      data: {proses:'hapus_data_nasabah',data:data},
      success: function(res){
        if(res){
          Swal.fire(
              'Informasi',
              'Data berhasil dihapus',
              'success'
            )
          setTimeout(function(){window.location = "index.php?menu=nasabah"},1200);
        }else{
          Swal.fire(
              'Informasi',
              'Data gagal dihapus',
              'error'
            )
        }
      }
    })
})
}

function hapustable(){
Swal.fire({
    title: "Warning",
    text: "Anda yakin untuk menghapus semua data?",
    type: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#001473',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Ya',
    cancelButtonText: 'Batal'
}).then(function(result){
    if(result.value){
  jQuery.ajax({
    type: "POST",
    url: "proses_nasabah.php",
    dataType: "JSON",
    data: {proses:'hapus_all_data_nasabah'},
    beforeSend: function() {
        // Swal.showLoading();
        Swal.fire({
          title: 'Sedang menghapus semua data',
          timerProgressBar: true,
          onBeforeOpen: () => {
            Swal.showLoading()
          }})
    },
    success: function(res){
      if (res == 'oke') {
        Swal.fire(
          'Informasi',
          'Data berhasil dihapus',
          'success'
        )
        $('#table').bootstrapTable('removeAll');
      }
    }
  });
}
});
}

function hargaFormatter(value){
  return formatRupiah(value,'');
}

function tahunFormatter(val){
  return val + ' Tahun';
}

function formatRupiah(angka, prefix){
var number_string = angka.replace(/[^,\d]/g, '').toString(),
split           = number_string.split(','),
sisa            = split[0].length % 3,
rupiah          = split[0].substr(0, sisa),
ribuan          = split[0].substr(sisa).match(/\d{3}/gi);

if(ribuan){
  separator = sisa ? '.' : '';
  rupiah += separator + ribuan.join('.');
}

rupiah = split[1] != undefined ? rupiah + ',' + split[1] : rupiah;
return prefix == undefined ? rupiah : (rupiah ? 'Rp. ' + rupiah : '');
}

jQuery.fn.ForceNumericOnly = function(){
    return this.each(function()
    {
        $(this).keydown(function(e)
        {
        var key = e.charCode || e.keyCode || 0;
        // allow backspace, tab, delete, enter, arrows, numbers and keypad numbers ONLY
        // home, end, period, and numpad decimal
        return (
            key == 8 || 
            key == 9 ||
            key == 13 ||
            key == 46 ||
            key == 110 ||
            key == 190 ||
            (key >= 35 && key <= 40) ||
            (key >= 48 && key <= 57) ||
            (key >= 96 && key <= 105));
        });
    });
};

$('#penghasilan').ForceNumericOnly();
$('#plafond').ForceNumericOnly();
$('#saldo').ForceNumericOnly();

var rupiah = document.getElementById("penghasilan");
rupiah.addEventListener('keyup',function(e){
    rupiah.value = formatRupiah(this.value);
});

var rupiah2 = document.getElementById("plafond");
rupiah2.addEventListener('keyup',function(e){
    rupiah2.value = formatRupiah(this.value);
});

var rupiah3 = document.getElementById("saldo");
rupiah3.addEventListener('keyup',function(e){
    rupiah3.value = formatRupiah(this.value);
});
</script>
