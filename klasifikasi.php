<div class="container-fluid p-0">
 <section class="resume-section p-3 p-lg-5 d-flex justify-content-center" id="data_nasabah">
  <div class="w-100">
    <h2 class="mb-0">Klasifikasi</h2>
    <div class="subheading mb-1">Form klasifikasi C4.5</div>
    
    <button class="btn btn-info" data-toggle="modal" data-target="#myTambah"><i class="fa fa-plus"></i> Tambah</button>
    <button id="btnUbah" class="btn btn-info" data-toggle="modal" data-target="#myEdit" onclick="ubah();" disabled><i class="fa fa-pencil-square-o"></i> Ubah</button>
    <button id="btnHapus" class="btn btn-danger" onclick="Hapus_klasifikasi();" disabled><i class="fa fa-trash-o"></i> Hapus</button>
    <p>
	<?php 
		include 'koneksi.php';

		$data = $koneksi->query('SELECT * FROM tbl_klasifikasi ORDER BY attribut');
	?>
    <table id="table" class="table table-sm" data-toggle="table" data-click-to-select="true" data-height="435">
        <thead>
          <tr>
          	<th data-field="state" data-checkbox="true"></th>
          	<th data-field="id" data-visible="false">Id</th>
            <th data-field="attribut">Attribut</th>
            <th data-field="operator" data-visible="false">Operator</th>
            <th data-field="value" data-visible="false">Value</th>
            <th data-field="klasifikasi">Klasifikasi</th>
          </tr>
        </thead>
        <tbody>
          <?php 
            foreach ($data as $key => $value) {
            echo "<tr> 
            		<td></td> 
            		<td>".$value['id']."</td>
                    <td>".$value['attribut']."</td>
                    <td>".$value['operator']."</td>
                    <td>".$value['value']."</td>
                    <td>".$value['klasifikasi']."</td>
                  </tr>";
            }
          ?>
        </tbody>
    </table>

<!-- Modal Tambah -->
<div id="myTambah" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal blue">
                <h4 class="modal-title">Form Tambah</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close blue" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group-inner">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Attribut</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-select-list">
                                        <select class="form-control custom-select-value" id="tmbattribut" name="tmbattribut" required>
                                            <option value="">- Pilih Attribut -</option>
                                            <option value="Umur">Umur</option>
                                            <option value="Pekerjaan">Pekerjaan</option>
                                            <option value="Penghasilan">Penghasilan</option>
                                            <option value="Plafond">Plafond</option>
                                            <option value="Saldo">Saldo</option>
                                            <option value="Tujuan">Tujuan</option>
                                            <option value="Jaminan">Jaminan</option>
                                            <option value="Jangka Waktu">Jangka Waktu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="operator">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Operator</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-select-list">
                                        <select class="form-control custom-select-value" id="tmboperator" name="tmboperator" required>
                                            <option value="">- Pilih Operator -</option>
                                            <option value="=">=</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                            <option value="Between">BETWEEN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="klasifikasi">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Value</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="tmbvalue" name="tmbvalue" placeholder="Masukkan Nilai" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="klasifikasi2">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Value</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="tmbmin" name="tmbmin" placeholder="Nilai Minimal" />
                                    <input type="text" class="form-control" id="tmbmax" name="tmbmax" placeholder="Nilai Maksimal" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="hasil">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Klasifikasi</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="tmbklasifikasi" name="tmbklasifikasi" placeholder="Masukkan Klasifikasi" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-info" id="btn_tambah" onclick="Simpan_klasifikasi();">Simpan</a>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div id="myEdit" class="modal modal-edu-general default-popup-PrimaryModal fade" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header header-color-modal blue">
                <h4 class="modal-title">Form Edit</h4>
                <div class="modal-close-area modal-close-df">
                    <a class="close blue" data-dismiss="modal" href="#"><i class="fa fa-close"></i></a>
                </div>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                        <div class="form-group-inner">
                            <div class="row">
                            	<input type="hidden" id="edtid">
                                <div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Attribut</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-select-list">
                                        <select class="form-control custom-select-value" id="edtattribut" name="edtattribut" required>
                                            <option value="Umur">Umur</option>
                                            <option value="Pekerjaan">Pekerjaan</option>
                                            <option value="Penghasilan">Penghasilan</option>
                                            <option value="Plafond">Plafond</option>
                                            <option value="Saldo">Saldo</option>
                                            <option value="Tujuan">Tujuan</option>
                                            <option value="Jaminan">Jaminan</option>
                                            <option value="Jangka Waktu">Jangka Waktu</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="uptoperator">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Operator</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <div class="form-select-list">
                                        <select class="form-control custom-select-value" id="edtoperator" name="edtoperator" required>
                                            <option value="=">=</option>
                                            <option value=">">></option>
                                            <option value=">=">>=</option>
                                            <option value="<"><</option>
                                            <option value="<="><=</option>
                                            <option value="Between">BETWEEN</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="uptvalue">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Value</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="edtvalue" name="edtvalue" placeholder="Masukkan Nilai" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="uptvalue2">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Value</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="edtmin" name="edtmin" placeholder="Nilai Minimal" />
                                    <input type="text" class="form-control" id="edtmax" name="edtmax" placeholder="Nilai Maksimal" />
                                </div>
                            </div>
                        </div>
                        <div class="form-group-inner" id="uptklasifikasi">
                            <div class="row">
                            	<div class="col-lg-4 col-md-4 col-sm-4 col-xs-12">
                                    <label>Klasifikasi</label>
                                </div>
                                <div class="col-lg-12 col-md-8 col-sm-8 col-xs-12">
                                    <input type="text" class="form-control" id="edtklasifikasi" name="edtklasifikasi" placeholder="Masukkan Klasifikasi" />
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <a href="#" class="btn btn-info" id="btn_update" onclick="Update_klasifikasi();">Update</a>
            </div>
        </div>
    </div>
</div>

</div>
</section>
</div>
<script src="vendor/jquery/jquery.js"></script>
<script type="text/javascript">
$(document).ready(function(){
$('#operator').hide();
$('#klasifikasi').hide();
$('#klasifikasi2').hide();
$('#hasil').hide();

var $table = $('#table');
$table.on('check.bs.table uncheck.bs.table check-all.bs.table uncheck-all.bs.table', function () {
	$('#btnHapus').prop('disabled', !$table.bootstrapTable('getSelections').length);
});

$table.on('check.bs.table uncheck.bs.table', function () {
	if($table.bootstrapTable('getSelections').length == 1){
		$('#btnUbah').prop('disabled', !$table.bootstrapTable('getSelections').length);
	}else{
		$('#btnUbah').prop('disabled',true);
	}
	
});

});

$('#tmbattribut').on('change',function(){
if (this.value != '') {
	$('#operator').show();
	$("#tmboperator").val("").change();
	$('#klasifikasi').hide();
	$('#klasifikasi2').hide();
	$('#hasil').hide();
}else{
	$('#operator').hide();
	$('#klasifikasi').hide();
	$('#klasifikasi2').hide();
	$('#hasil').hide();
}
});

$('#tmboperator').on('change',function(){
if (this.value == 'Between') {
	$('#klasifikasi').hide();
	$('#klasifikasi2').show();
	$('#hasil').show();
}
else if (this.value != '') {
	$('#klasifikasi').show();
	$('#klasifikasi2').hide();
	$('#hasil').show();	
}else{
	$('#klasifikasi').hide();
	$('#klasifikasi2').hide();
	$('#hasil').hide();
}
});

function Simpan_klasifikasi(){
var Attribut = $('#tmbattribut').val();
var Operator = $("#tmboperator").val();
var Value = $('#tmbvalue').val();
var tmbmin = $('#tmbmin').val();
var tmbmax = $('#tmbmax').val();
var Klasifikasi = $('#tmbklasifikasi').val();

if (Attribut == '') {
	$('#tmbattribut').focus();
}else
if (Operator == '') {
	$("#tmboperator").focus();
}else
if (Operator == 'Between') {
	if (tmbmin == '') {
		$('#tmbmin').focus();
	}else
	if (tmbmax == '') {
		$('#tmbmax').focus();
	}else
	if (Klasifikasi == '') {
		$('#tmbklasifikasi').focus();
	}else{
		jQuery.ajax({
		    type: "POST",
		    url: "proses_klasifikasi.php",
		    dataType: "JSON",
		    data: {proses:'Tambah',attribut:Attribut,operator:Operator,min:tmbmin,max:tmbmax,klasifikasi:Klasifikasi},
		    success: function(res){
		      if (res == 'oke') {
		        Swal.fire(
		          'Informasi',
		          'Data berhasil disimpan',
		          'success'
		        )
		        setTimeout(function(){window.location = "index.php?menu=klasifikasi"},1200);
		      }
		    }
		  });
	}
}else
if (Operator != 'Between'){
	if (Value == '') {
		$('#tmbvalue').focus();
	}else 
	if (Klasifikasi == '') {
		$('#tmbklasifikasi').focus();
	}else{
		jQuery.ajax({
		    type: "POST",
		    url: "proses_klasifikasi.php",
		    dataType: "JSON",
		    data: {proses:'Tambah',attribut:Attribut,operator:Operator,value:Value,klasifikasi:Klasifikasi},
		    success: function(res){
		      if (res == 'oke') {
		        Swal.fire(
		          'Informasi',
		          'Data berhasil disimpan',
		          'success'
		        )
		        setTimeout(function(){window.location = "index.php?menu=klasifikasi"},1200);
		      }
		    }
		  });
	}
}
}

function Update_klasifikasi(){
	var Id = $('#edtid').val();
	var Operator = $("#edtoperator").val();
	var Value = $('#edtvalue').val();
	var edtmin = $('#edtmin').val();
	var edtmax = $('#edtmax').val();
	var Klasifikasi = $('#edtklasifikasi').val();

	if (Operator == 'Between') {
		if (edtmin == '') {
			$('#edtmin').focus();
		}else
		if (edtmax == '') {
			$('#edtmax').focus();
		}else
		if (Klasifikasi == '') {
			$('#edtklasifikasi').focus();			
		}else{
			jQuery.ajax({
			    type: "POST",
			    url: "proses_klasifikasi.php",
			    dataType: "JSON",
			    data: {proses:'Update',id:Id,operator:Operator,min:edtmin,max:edtmax,klasifikasi:Klasifikasi},
			    success: function(res){
			      if (res == 'oke') {
			        Swal.fire(
			          'Informasi',
			          'Data berhasil diperbaharui',
			          'success'
			        )
			        setTimeout(function(){window.location = "index.php?menu=klasifikasi"},1200);
			      }else{
			      	Swal.fire(
			          'Informasi',
			          'Data gagal diperbaharui',
			          'error'
			        )
			      }
			    }
			  });
		}
	}else
	if (Operator != 'Between') {
		if (Value == '') {
			$('#edtvalue').focus();
		}else
		if (Klasifikasi == '') {
			$('#edtklasifikasi').focus();			
		}else{
			jQuery.ajax({
			    type: "POST",
			    url: "proses_klasifikasi.php",
			    dataType: "JSON",
			    data: {proses:'Update',id:Id,operator:Operator,value:Value,klasifikasi:Klasifikasi},
			    success: function(res){
			      if (res == 'oke') {
			        Swal.fire(
			          'Informasi',
			          'Data berhasil diperbaharui',
			          'success'
			        )
			        setTimeout(function(){window.location = "index.php?menu=klasifikasi"},1200);
			      }else{
			      	Swal.fire(
			          'Informasi',
			          'Data gagal diperbaharui',
			          'error'
			        )
			      }
			    }
			  });
		}		
	}
}

function ubah(){
	var data = $('#table').bootstrapTable('getSelections')[0];
	$('#edtid').val(data['id']);
	$('#edtattribut').val(data['attribut']).change();
	$('#edtattribut').prop('disabled',true);

	$('#edtoperator').val(data['operator'].replace('&lt;','<').replace('&gt;', '>')).change();
	$('#edtoperator').prop('disabled',true);

	$('#edtklasifikasi').val(data['klasifikasi'].replace('&lt;','<').replace('&gt;', '>'));

	if (data['operator'] == 'Between') {
		$('#uptvalue').hide();
		$('#uptvalue2').show();

		var value = JSON.parse(data['value']);
		$('#edtmin').val(value[0]);
		$('#edtmax').val(value[1]);
	}else{
		$('#uptvalue').show();
		$('#uptvalue2').hide();

		$('#edtvalue').val(data['value']);
	}

}

function Hapus_klasifikasi(){
	var id = [];
	var data = $('#table').bootstrapTable('getSelections');

	for (var i = 0; i < data.length; i++) {
		id.push(data[i]['id']);
	}
	
	jQuery.ajax({
		type: "POST",
		url: "proses_klasifikasi.php",
	    dataType: "JSON",
	    data: {proses:'Hapus',id:id},
	    success:function(res){
	    	console.log(res);
	    	if (res == 'oke') {
		        Swal.fire(
		          'Informasi',
		          'Data berhasil dihapus',
		          'success'
		        )
		        setTimeout(function(){window.location = "index.php?menu=klasifikasi"},1200);
		      }else{
		      	Swal.fire(
		          'Informasi',
		          'Data gagal dihapus',
		          'error'
		        )
		      }
	    }
	});
}
</script>