<?php

class BarangKeluar extends Controller{
	public function create(){
		if($this->model('BarangKeluar_model')->minusBarang($_POST) > 0){
			if($this->model('Barang_model')->updateMinusStok($_POST) > 0) {
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