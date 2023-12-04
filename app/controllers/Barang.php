<?php

class Barang extends Controller{
	public function create(){
		if($this->model('Barang_model')->addBarang($_POST) > 0){
			Flasher::setFlash('berhasil', 'ditambahkan', 'success');
			header('Location: '.BASEURL.'/admin/index');
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: '.BASEURL.'/admin/index');
			exit;
		}
	}

}