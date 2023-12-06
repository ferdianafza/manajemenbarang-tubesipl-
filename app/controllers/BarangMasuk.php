<?php

class BarangMasuk extends Controller{
	public function create(){
		if($this->model('BarangMasuk_model')->addBarang($_POST) > 0){
			if($this->model('Barang_model')->updateAddStok($_POST) > 0) {
				Flasher::setFlash('berhasil', 'ditambahkan', 'success');
				header('Location: '.BASEURL.'/admin/index');
				exit;
			}
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: '.BASEURL.'/admin/index');
			exit;
		}
	}

}