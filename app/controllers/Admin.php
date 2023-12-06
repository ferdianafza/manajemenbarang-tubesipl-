<?php

class Admin extends Controller{
	
	// view form create account
	public function new(){
		$data['judul'] = 'Buat Akun Admin';
		$this->view('templates/header', $data);
		$this->view('admin/new');
		$this->view('templates/footer');
	}

	// create account
	public function create(){
		if($this->model('Admin_model')->createAdmin($_POST) > 0){
			Flasher::setFlash('berhasil', 'ditambahkan', 'success');
			header('Location: '.BASEURL.'/admin/new');
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: '.BASEURL.'/admin/new');
			exit;
		}
	}

	// view form login
	public function login(){
		$data['judul'] = 'Login Admin';
		$this->view('templates/header', $data);
		$this->view('admin/login');
		$this->view('templates/footer');
	}

	// validate login
	public function session(){
	    $userData = $this->model('Admin_model')->createSession($_POST);

	    if ($userData) {
	        session_start();
	        $_SESSION["login"] = true;
	        $_SESSION["username"] = $userData["username"];
	        $_SESSION["email"] = $userData["email"];
	        $_SESSION["id"] = $userData["id"];
	        Flasher::setFlash('berhasil', 'login', 'success');
	        header('Location: '.BASEURL.'/admin/index');
	        exit;
	    } else {
	        Flasher::setFlash('gagal', 'login', 'danger');
	        header('Location: '.BASEURL.'/admin/login');
	        exit;
	    }
	}

	// view form login
	public function index() {
        $adminModel = $this->model('Admin_model');
        $data = $adminModel->checkLoginStatus();
        $data['judul'] = 'Halaman Admin';
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $data['barang_masuk'] = $this->model('BarangMasuk_model')->getAllBarangMasukWithBarang();
        $data['barang_keluar'] = $this->model('BarangKeluar_model')->getAllBarangKeluarWithBarang();
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }


    public function destroySession() {
        $adminModel = $this->model('Admin_model');
        $adminModel->destroySession();
    }



	
}