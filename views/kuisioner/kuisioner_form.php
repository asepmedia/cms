<form action="<?php echo $action?>" method="post" name="formAssignment">
<input type="hidden" name="<?php echo $this->security->get_csrf_token_name();?>" value="<?php echo $this->security->get_csrf_hash();?>">
<div class="container">
<?php
if($this->session->flashdata('message') != '') {
?>
<div class="alert alert-dismissible green lighten-5 green-text text-lighten-1">
<button type="button" class="close" data-dismiss="alert">x</button>
<?php echo $this->session->flashdata('message');?>
</div>
<?php
}
?>
<input type="hidden" name="idAssignment" id="idAssignment" value="5"/>
<div class="panel panel-warning">
<div class="panel-heading panel-head-text"><strong>Responden Data</strong></div>
<div class="panel-body">
<div class="col-md-6">
<!-- input name-->
<div class="row">
<div class="form-group" id="div_inputName">
<div class="row">
<label for="nama" class="col-md-2 control-label">Nama</label>
<span class="label label-danger form-alert" id="alert_inputName">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-10">
<input type="text" class="form-control input-sm" id="inputName" name="nama" placeholder="Nama" value="" required="required">
</div>
</div>
</div>
</div>
<!-- end input name -->
<!-- input age-->
<div class="row">
<div class="form-group" id="div_inputAge">
<div class="row">
<label for="umur" class="col-md-2 control-label">Umur</label>
<span class="label label-danger form-alert" id="alert_inputAge">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-3">
<input type="number" class="form-control input-sm" id="inputAge" name="umur" placeholder="Umur" value="" required="required">
</div>
</div>
</div>
</div>
<!-- end input age -->
<!-- input gender-->
<div class="row">
<div class="form-group" id="div_optionGender">
<div class="row">
<label for="inputGender" class="col-md-3 control-label">Jenis Kelamin</label>
<span class="label label-danger form-alert" id="alert_optionGender">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline">
<input type="radio" name="jenis_kelamin" id="optionGender0" value="1" > Laki-laki
</label>
<label class="radio-inline">
<input type="radio" name="jenis_kelamin" id="optionGender1" value="0" > Perempuan
</label>
</div>
</div>
</div>
</div>
<!-- end input gender -->
</div>
<div class="col-md-6">
<!-- input education-->
<div class="row">
<div class="form-group" id="div_optionEducation">
<div class="row">
<label for="inputEducation" class="col-md-4 control-label">Pendidikan Terakhir</label>
<span class="label label-danger form-alert" id="alert_optionEducation">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline col-md-3">
<input type="radio" name="pendidikan" id="optionEducation0" value="SD kebawah" > SD kebawah
</label>
<label class="radio-inline col-md-3">
<input type="radio" name="pendidikan" id="optionEducation2" value="SLTA" > SLTA
</label>
<label class="radio-inline col-md-3">
<input type="radio" name="pendidikan" id="optionEducation4" value="S1" > S1
</label>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline col-md-3">
<input type="radio" name="pendidikan" id="optionEducation1" value="LTP" > SLTP
</label>
<label class="radio-inline col-md-3">
<input type="radio" name="pendidikan" id="optionEducation3" value="D1 - D2 - D3" > D1 - D2 - D3
</label>
<label class="radio-inline col-md-3">
<input type="radio" name="pendidikan" id="optionEducation5" value="S2 Ke atas" > S2 Ke atas
</label>
</div>
</div>
</div>
</div>
<!-- end input education -->
<!-- input job-->
<div class="row">
<div class="form-group" id="div_optionJob">
<div class="row">
<label for="inputJob" class="col-md-4 control-label">Pekerjaan Utama</label>
<span class="label label-danger form-alert" id="alert_optionJob">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob0" value="PNS/TNI/POLRI" >
PNS/TNI/POLRI
</label>
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob5" value="Peternak/petani" >
Peternak/petani
</label>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob1" value="Pegawai Swasta" >
Pegawai Swasta
</label>
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob6" value="Pegawai Peternakan" >
Pegawai Peternakan
</label>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob2" value="Wiraswasta/Usahawan" >
Wiraswasta/Usahawan
</label>
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob7" value="Pemilik Peternakan" >
Pemilik Peternakan
</label>
</div>
</div>
<div class="row">
<div class="col-md-12">
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob3" value="Pelajar/Mahasiswa" >
Pelajar/Mahasiswa
</label>
<label class="radio-inline col-md-5">
<input type="radio" name="pekerjaan" id="optionJob4" value="Lainnya" >
Lainnya
</label>
</div>
</div>
</div>
</div>
</div>
<!-- end input job -->
</div>
<!-- end panel body -->
</div>
<div class="panel panel-warning">
<div class="panel-heading panel-head-text"><strong>Surveyor Data</strong></div>
<div class="panel-body">
<!-- input surveyor name-->
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_inputSurveyorName">
<div class="row">
<label for="nama_surveyor" class="col-md-3 control-label">Nama Surveyor</label>
<span class="label label-danger form-alert" id="alert_inputSurveyorName">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-12">
<input type="text" class="form-control input-sm" id="nama_surveyor" name="nama_surveyor" placeholder="Nama Surveyor" value="" required="required">
</div>
</div>
</div>
</div>
</div>
<!-- end input surveyor name -->
<!-- input surveyor nip-->
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_inputSurveyorNip">
<div class="row">
<label for="nip_surveyor" class="col-md-3 control-label">NIP / Data Surveyor</label>
<span class="label label-danger form-alert" id="alert_inputSurveyorNip">
<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
</span>
</div>
<div class="row">
<div class="col-md-12">
<input type="text" class="form-control input-sm" id="inputSurveyorNip" name="nip_surveyor" placeholder="NIP Surveyor" value="">
</div>
</div>
</div>
</div>
</div>
<!-- end input surveyor name -->
</div>
</div>
<div class="row">
<div class="col-md-12">
<div class="alert alert-danger answer-alert" id="div-answer-error" role="alert"><span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span> Harap lengkapi jawaban anda</div>
</div>
</div>
<div class='panel panel-warning'>
<div class='panel-heading panel-head-text'><strong>Pendapat Responden Tentang Pelayanan Publik</strong></div>
<div class='panel-body'>
<div class='row'><div class='col-md-6'>
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_answer_opt_19">
<div class="row" >
<label for="inputSurveyorName" class="col-md-12 control-label">Bagaimana pemahaman Saudara tentang Tekhnologi Inseminasi Buatan?</label>
</div><div class='row'><div class='col-md-12'>
<div class="radio">
<label>
<input type="radio" value="Tidak mudah" name="kuis1" >
Tidak mudah
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Kurang mudah" name="kuis1" >
Kurang mudah
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Mudah" name="kuis1" >
Mudah
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Sangat mudah" name="kuis1" >
Sangat mudah
</label>
</div><hr/></div></div></div></div></div>
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_answer_opt_20">
<div class="row" >
<label for="inputSurveyorName" class="col-md-12 control-label">Bagaimana pendapat Saudara tentang kesesuaian persyaratan pelayanan dengan jenis pelayanannya?</label>
</div><div class='row'><div class='col-md-12'>
<div class="radio">
<label>
<input type="radio" value="Tidak sesuai" name="kuis2" >
Tidak sesuai
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Kurang sesuai" name="kuis2" >
Kurang sesuai
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Sesuai" name="kuis2" >
Sesuai
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Sangat sesuai" name="kuis2" >
Sangat sesuai
</label>
</div><hr/></div></div></div></div></div>
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_answer_opt_21">
<div class="row" >
<label for="inputSurveyorName" class="col-md-12 control-label">Bagaimana pendapat Saudara tentang kejelasan dan kepastian petugas yang melayani?</label>
</div><div class='row'><div class='col-md-12'>
<div class="radio">
<label>
<input type="radio" value="Tidak jelas" name="kuis3" >
Tidak jelas
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Kurang jelas" name="kuis3" >
Kurang jelas
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Jelas" name="kuis3" >
Jelas
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Sangat jelas" name="kuis3" >
Sangat jelas
</label>
</div><hr/></div></div></div></div></div>
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_answer_opt_22">
<div class="row" >
<label for="inputSurveyorName" class="col-md-12 control-label">Bagaimana pendapat Saudara tentang kedisiplinan petugas dalam memberikan pelayanan?</label>
</div><div class='row'><div class='col-md-12'>
<div class="radio">
<label>
<input type="radio" value="Tidak disiplin" name="kuis4" >
Tidak disiplin
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Kurang disiplin" name="kuis4" >
Kurang disiplin
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Disiplin" name="kuis4" >
Disiplin
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Sangat disiplin" name="kuis4" >
Sangat disiplin
</label>
</div><hr/></div></div></div></div></div>
<div class="row">
<div class="col-md-12">
<div class="form-group" id="div_answer_opt_23">
<div class="row" >
<label for="inputSurveyorName" class="col-md-12 control-label">Bagaimana pendapat Saudara tentang tanggung jawab petugas dalam memberikan pelayanan?</label>
</div><div class='row'><div class='col-md-12'>
<div class="radio">
<label>
<input type="radio" value="Tidak bertanggung jawab" name="kuis5" >
Tidak bertanggung jawab
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Kurang bertanggung jawab" name="kuis5" >
Kurang bertanggung jawab
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Bertanggung jawab" name="kuis5" >
Bertanggung jawab
</label>
</div>
<div class="radio">
<label>
<input type="radio" value="Sangat bertanggung jawab" name="kuis5" >
Sangat bertanggung jawab
</label>
</div><hr/></div></div></div></div></div>
</div></div></div></div>
<div class="row">
<div class="col-md-12 text-right">
<button type="submit" class="btn btn-warning">Kirim</button>
</div>
</div>
<div class="row col-md-12 text-right"></div>
</div>
</form>
