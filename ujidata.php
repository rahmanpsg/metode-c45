<script src="vendor/jquery/jquery.js"></script>
<?php 
  if (isset($_GET['pesan'])) {
      if ($_GET['pesan'] == 'gagal') {
      echo "<div class='alert alert-danger alert-dismissable'>
            
            <h4><i class='icon fa fa-ban'></i> Error! </h4>
            Anda belum melakukan proses mining di Menu Nasabah
        </div>";
    }

  }
?>
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="ujidata">
  <div class="w-100">
    <h2 class="mb-0">Uji Data</h2>
<!--     <div class="subheading mb-1">Import Data Nasabah</div>
    <form method="post" enctype="multipart/form-data" action="proses_ujidata.php">
      <div class="input-group mb-3">
        <input type="file" class="form-control col-4 font-weight" name="inputFile" accept="application/vnd.ms-excel" data-title="Drag and drop a file" required>
        <div class="input-group-prepend">
            <button class="btn btn-info" name="proses" value="ujidata_upload" type="submit"><i class="fa fa-upload"></i> Proses</button>
          </div>
      </div>
    </form>
<hr> -->
    <div class="subheading mb-1">Masukkan Data Nasabah</div>
    <div class="resume-item d-flex flex-column flex-md-row justify-content-between mb-5">
      <div class="resume-content">
      <form>
      <div class="input-group mb-3">          
        <input type="text" class="form-control" placeholder="Nama" name="nama" id="nama" required>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Tanggal Lahir </span>
          </div>
          <input type="date" class="form-control" name="tgl_lahir" required>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Pekerjaan</label>
        </div>
        <select class="custom-select" name="pekerjaan">
          <option selected value="">Pilih...</option>
          <option value="PNS">PNS</option>
          <option value="KARYAWAN SWASTA">KARYAWAN SWASTA</option>
        </select>
      </div>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Penghasilan </span>
          </div>
          <input type="text" class="form-control" placeholder="Rp." id="penghasilan" name="penghasilan" required>
      </div>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Plafond </span>
          </div>
          <input type="text" class="form-control" placeholder="Rp." id="plafond" name="plafond" required>
      </div>

      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text">Saldo </span>
          </div>
          <input type="text" class="form-control" placeholder="Rp." id="saldo" name="saldo" required>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Tujuan</label>
        </div>
        <select class="custom-select" name="tujuan">
          <option selected value="">Pilih...</option>
          <option value="PRODUKTIF">PRODUKTIF</option>
          <option value="KONSUMTIF">KONSUMTIF</option>
        </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Nilai Jaminan</label>
        </div>
        <select class="custom-select" name="jaminan">
          <option selected value="">Pilih...</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text">Waktu Peminjaman </span>
          </div>
          <input type="date" class="form-control" placeholder="Jangka Waktu" name="jangka_waktu1">
          <div class="input-group-prepend">
            <span class="input-group-text">Batas Peminjaman </span>
          </div>
          <input type="date" class="form-control" placeholder="Jangka Waktu" name="jangka_waktu2">
      </div>
      </form>
      <button class="btn btn-info" onclick="proses()"><i class="fa fa-send"></i> Proses</button>

      </div>
    </div>
  </div>
</section>
<hr class="m-0">
    <?php 
  include 'koneksi.php';
  if (isset($_GET['pesan'])) {
    if ($_GET['pesan'] == 'berhasil') {
      $data = $koneksi->query("SELECT * FROM tbl_ujidata ORDER BY entropy DESC");
    ?>
<script type="text/javascript">
  $(document).ready(function(){
    $('#scroll').hide();
    $('#scroll').click();
  })
</script>
<a id="scroll" class="nav-link js-scroll-trigger" href="#hasil_ujidata">scroll</a>
<section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="hasil_ujidata">
  <div class="w-100">
    <div class='alert alert-info alert-dismissable'>
      <button type='button' class='close' data-dismiss='alert' aria-hidden='true'>&times;</button>
      <h4><i class='icon fa fa-check'></i> Success. </h4>
      Data berhasil diproses
    </div>
    <button class="btn btn-danger" onclick="hapustable()"><i class="fa fa-trash-o"></i> Hapus Semua Data</button>

    <div class="subheading mb-1">Data LANCAR</div>
      <table id="table_lancar" class="table table-sm" data-toggle="table">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th data-formatter="tahunFormatter">Umur</th>
            <th>Pekerjaan</th>
            <th data-formatter="hargaFormatter">Penghasilan</th>
            <th data-formatter="hargaFormatter">Plafond</th>
            <th data-formatter="hargaFormatter">Saldo</th>
            <th>Tujuan</th>
            <th>Jaminan</th>
            <th data-formatter="tahunFormatter">Jangka Waktu</th>
            <th data-visible="false">Entropy</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no = 1;
            foreach ($data as $key => $value) {
              $val = json_decode($value['attribut']);
              if ($value['kelas'] == 'LANCAR') {
                echo "<tr>
                        <td>".$no++."</td>
                        <td>".$value['nama']."</td>
                        <td>".$val[0]."</td>
                        <td>".$val[1]."</td>
                        <td>".$val[2]."</td>
                        <td>".$val[3]."</td>
                        <td>".$val[4]."</td>
                        <td>".$val[5]."</td>
                        <td>".$val[6]."</td>
                        <td>".$val[7]."</td>
                        <td>".$value['entropy']."</td>
                      </tr>";
              }
            }
          ?>
        </tbody>
      </table>

    <div class="subheading mb-1">Data MACET</div>
      <table id="table_macet" class="table table-sm" data-toggle="table">
          <thead>
          <tr>
            <th>No</th>
            <th>Nama</th>
            <th data-formatter="tahunFormatter">Umur</th>
            <th>Pekerjaan</th>
            <th data-formatter="hargaFormatter">Penghasilan</th>
            <th data-formatter="hargaFormatter">Plafond</th>
            <th data-formatter="hargaFormatter">Saldo</th>
            <th>Tujuan</th>
            <th>Jaminan</th>
            <th data-formatter="tahunFormatter">Jangka Waktu</th>
            <th data-visible="false">Entropy</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            $no = 1;
            foreach ($data as $key => $value) {
              $val = json_decode($value['attribut']);
              if ($value['kelas'] == 'MACET') {
                echo "<tr>
                        <td>".$no++."</td>
                        <td>".$value['nama']."</td>
                        <td>".$val[0]."</td>
                        <td>".$val[1]."</td>
                        <td>".$val[2]."</td>
                        <td>".$val[3]."</td>
                        <td>".$val[4]."</td>
                        <td>".$val[5]."</td>
                        <td>".$val[6]."</td>
                        <td>".$val[7]."</td>
                        <td>".$value['entropy']."</td>
                      </tr>";
              }
            }
          ?>
        </tbody>
      </table>

    <?php
      }
    }
?>
</section>
<hr class="m-0">

<script type="text/javascript">
$('#nama').change(function(){
    $(this).val($(this).val().toUpperCase());
});

function proses(){
  var nama,tgl_lahir,pekerjaan,penghasilan,plafond,saldo,tujuan,jaminan,peminjaman1,peminjaman2;
  nama = $('input[name=nama]').val();
  tgl_lahir = $('input[name=tgl_lahir]').val();
  pekerjaan = $('select[name=pekerjaan]').val();
  penghasilan = $('input[name=penghasilan]').val();
  plafond = $('input[name=plafond]').val();
  saldo = $('input[name=saldo]').val();
  tujuan = $('select[name=tujuan]').val();
  jaminan = $('select[name=jaminan]').val();
  peminjaman1 = $('input[name=jangka_waktu1]').val();
  peminjaman2 = $('input[name=jangka_waktu2]').val();

  if (nama == '') {
    $('input[name=nama]').focus();
  }else
  if (!Date.parse(tgl_lahir)){
    $('input[name=tgl_lahir]').focus();
  }else
  if (pekerjaan == '') {
    $('select[name=pekerjaan]').focus();
  }else
  if (penghasilan == '') {
    $('input[name=penghasilan]').focus();
  }else
  if (plafond == '') {
    $('input[name=plafond]').focus();
  }else
  if (saldo == '') {
    $('input[name=saldo]').focus();
  }else
  if (tujuan == '') {
    $('select[name=tujuan]').focus();
  }else
  if (jaminan == '') {
    $('select[name=jaminan]').focus();
  }else
  if (!Date.parse(peminjaman1)) {
    $('input[name=jangka_waktu1]').focus();
  }else
  if (!Date.parse(peminjaman2)) {
    $('input[name=jangka_waktu2]').focus();
  }
  else{
  var data = $('form').serializeArray();
  jQuery.ajax({
    type: "POST",
    url: "proses_ujidata.php",
    dataType: "JSON",
    data: {proses:'ujidata_upload',data:data},
    success: function(res){
      if (res == true) {
        window.location = "index.php?menu=ujidata&pesan=berhasil";
      }else if(res == "not found"){
        Swal.fire(
          'Warning',
          'Kelas tidak ditemukan dipohon keputusan',
          'warning'
        )
      }else if(res == "gagal"){
        Swal.fire(
          'Warning',
          'Anda belum melakukan proses mining di Menu Nasabah',
          'error'
        )
      }
      // if(res.cek == 'ok'){
      //   Swal.fire(
      //     'Prediksi : Lancar',
      //     'Nama : '+res.data[0]+
      //     '<br> Umur : '+res.data[1]+
      //     '<br> Pekerjaan : '+res.data[2]+
      //     '<br> Penghasilan : '+res.data[3]+
      //     '<br> Plafond : '+res.data[4]+
      //     '<br> Saldo : '+res.data[5]+
      //     '<br> Tujuan : '+res.data[6]+
      //     '<br> Nilai Jaminan : '+res.data[7]+
      //     '<br> Jangka Waktu : '+res.data[8],
      //     'success'
      //   )
      // }else if(res.cek == 'no'){
      //   Swal.fire(
      //   'Prediksi : Macet',
      //     'Nama : '+res.data[0]+
      //     '<br> Umur : '+res.data[1]+
      //     '<br> Pekerjaan : '+res.data[2]+
      //     '<br> Penghasilan : '+res.data[3]+
      //     '<br> Plafond : '+res.data[4]+
      //     '<br> Saldo : '+res.data[5]+
      //     '<br> Tujuan : '+res.data[6]+
      //     '<br> Nilai Jaminan : '+res.data[7]+
      //     '<br> Jangka Waktu : '+res.data[8],
      //     'warning'
      // )
      // }else if(res.cek == null){
      //   Swal.fire(
      //   'Prediksi tidak ditemukan dipohon keputusan',
      //     '',
      //     'error'
      // )
      // }else if(res.cek == 'gagal'){
      //   Swal.fire(
      //   res.data,
      //     '',
      //     'warning'
      // )
      // }
    }
  });
}
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
  jQuery.ajax({
      type: "POST",
      url: "proses_ujidata.php",
      dataType: "HTML",
      data: {proses:'hapus_data_uji'},
      success: function(res){
        if(res){
          Swal.fire(
              'Informasi',
              'Data berhasil dihapus',
              'success'
            )
          setTimeout(function(){window.location = "index.php?menu=ujidata"},1200);
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

function EntropySorter(a,b){
  if (a > b) return 1;
    if (a < b) return -1;
    return 0;
}
</script>