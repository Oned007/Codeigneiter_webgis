<?php
$id_provinsi="";
$nama_provinsi="";
if($parameter=='ubah' && $id!=''){
    $this->db->where('id_provinsi',$id);
    $row=$this->Model->get()->row_array();
    extract($row);
}

// value ketika validasi
if($this->session->flashdata('error_value')){
    extract($this->session->flashdata('error_value'));
}

?>
<?=content_open('Form Kecamatan')?>
    <?php
        // menampilkan error validasi
        if($this->session->flashdata('error_validation')){
            foreach ($this->session->flashdata('error_validation') as $key => $value) {
                echo '<div class="alert alert-danger">'.$value.'</div>';
            }
        }
    ?>
    <form method="post" action="<?=site_url($url.'/simpan')?>" enctype="multipart/form-data">
        <?=input_hidden('parameter',$parameter)?>
    	<?=input_hidden('id_provinsi',$id_provinsi)?>

    	<div class="form-group">
    		<label>Nama provinsi</label>
    		<div class="row">
	    		<div class="col-md-6">
	    			<?=input_text('nama_provinsi',$nama_provinsi)?>
	    		</div>
    		</div>
    	</div>
    	<div class="form-group">
    		<button type="submit" name="simpan" value="true" class="btn btn-info"><i class="fa fa-save"></i> Simpan</button>
			<a href="<?=site_url($url)?>" class="btn btn-danger" ><i class="fa fa-reply"></i> Kembali</a>
    	</div>
    </form>
<?=content_close()?>