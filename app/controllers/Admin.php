<?php

class Admin extends Controller{
	
	// view form create account
	public function new(){
		$data['judul'] = 'Buat Akun Admin';
		$this->view('logintemplates/header', $data);
		$this->view('admin/new');
		$this->view('logintemplates/footer');
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
		$this->view('logintemplates/header', $data);
		$this->view('admin/login');
		$this->view('logintemplates/footer');
	}

	// validate login
	public function session(){
	    $userData = $this->model('Admin_model')->createSession($_POST);

	    if ($userData) {
	        session_start();
	        $_SESSION["loginadmin"] = true;
	        $_SESSION["usernameadmin"] = $userData["username"];
	        $_SESSION["emailadmin"] = $userData["email"];
	        $_SESSION["idadmin"] = $userData["id"];
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
        $data['getCountBarangEmpty'] = $this->model('Barang_model')->getCountBarangEmpty();
        $data['getCountBarang'] = $this->model('Barang_model')->getCountBarang();
        $data['getCountBarangMasuk'] = $this->model('BarangMasuk_model')->getCountBarangMasuk();
        $data['getCountBarangKeluar'] = $this->model('BarangKeluar_model')->getCountBarangKeluar();
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $data['barang_masuk'] = $this->model('BarangMasuk_model')->getAllBarangMasukWithBarang();
        $data['barang_keluar'] = $this->model('BarangKeluar_model')->getAllBarangKeluarWithBarang();
        $this->view('templates/header', $data);
        $this->view('admin/index', $data);
        $this->view('templates/footer');
    }


    public function destroySession() {
	    session_start();
	    $_SESSION = [];
	    session_unset();
	    session_destroy();

	    unset($_SESSION["loginadmin"]);
	    unset($_SESSION["usernameadmin"]);
	    unset($_SESSION["emailadmin"]);
	    unset($_SESSION["idadmin"]);

	    header('Location: '.BASEURL.'/admin/login');
	    exit;
	}



	
}