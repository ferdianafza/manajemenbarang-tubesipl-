<?php

class Staff extends Controller{
	
	// view form create account
	public function new(){
		$data['judul'] = 'Buat Akun Staff';
		$this->view('logintemplates/header', $data);
		$this->view('staff/new');
		$this->view('logintemplates/footer');
	}

	// create account
	public function create(){
		if($this->model('Staff_model')->createStaff($_POST) > 0){
			Flasher::setFlash('berhasil', 'ditambahkan', 'success');
			header('Location: '.BASEURL.'/staff/new');
			exit;
		} else {
			Flasher::setFlash('gagal', 'ditambahkan', 'danger');
			header('Location: '.BASEURL.'/staff/new');
			exit;
		}
	}

	// view form login
	public function login(){
		$data['judul'] = 'Login Staff';
		$this->view('logintemplates/header', $data);
		$this->view('staff/login');
		$this->view('logintemplates/footer');
	}

	// validate login
	public function session(){
	    $userData = $this->model('Staff_model')->createSession($_POST);

	    if ($userData) {
	        session_start();
	        $_SESSION["loginstaff"] = true;
	        $_SESSION["usernamestaff"] = $userData["username"];
	        $_SESSION["emailstaff"] = $userData["email"];
	        $_SESSION["idstaff"] = $userData["id"];
	        Flasher::setFlash('berhasil', 'login', 'success');
	        header('Location: '.BASEURL.'/dashboard/index');
	        exit;
	    } else {
	        Flasher::setFlash('gagal', 'login', 'danger');
	        header('Location: '.BASEURL.'/staff/login');
	        exit;
	    }
	}



	
}