<?php

class Staff_model{
    private $table = 'staff';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function createStaff($data){
        $username = strtolower(stripslashes($data['username']));
        $email = strtolower(stripslashes($data['email']));
        $password = $data['password'];
        $confirmPassword = $data['confirmPassword'];

        //cek apakah akun tersedia atau sudah ada
        $query = "SELECT email FROM staff WHERE email = :email";
        $this->db->query($query);
        $this->db->bind(':email', $email);
        $result = $this->db->execute();

        if ($result && mysqli_fetch_assoc($result)) {
            echo "<script>
                     alert('email sudah ada')
                     </script>";
            return false;
        }

        // cek jika password tidak sama dengan konfirmasi password
        if ($password !== $confirmPassword) {
            echo "<script>
                    alert('konfirmasi password tidak sesuai!')
                  </script>";
            return false;
        }

        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        //tambah ke database
        $query = "INSERT INTO staff VALUES('',:username,:email,:password)";
        $this->db->query($query);

        $this->db->bind(':username', $username); 
        $this->db->bind(':email', $email);
        $this->db->bind(':password', $password); 

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function checkLoginStatus() {
        if (!isset($_SESSION["logistaff"]) || $_SESSION["logistaff"] == false) {
            header('Location: '.BASEURL.'/staff/login');
            exit;
        } else {
            $data['username'] = $_SESSION["username"];
            $data['email'] = $_SESSION["email"];
            $data['id'] = $_SESSION["id"];
            $data['judul'] = 'Halaman Admin';

            return $data;
        }
    }

    public function createSession($data){
	    $email = $data["email"];
	    $password = $data["password"];

	    $query = "SELECT * FROM staff WHERE email = :email";
	    $this->db->query($query);
	    $this->db->bind(':email', $email);
	    $result = $this->db->execute();
	    // cek email
	    if ($this->db->rowCount() == 1 ) {
	        // cek password
	        $row = $this->db->single();
	        if (password_verify($password, $row["password"])) {
	            return $row;
	        } else {
	        	// return false karna password tidak sesuai
	            return false;
	        }
	    } else {
	    	// return false kana email tidak ditemukan
	        return false;
	    }

	    return false;
	}


	

}

