<?php

class Dashboard_model {
    public function checkLoginStatus() {
        if (!isset($_SESSION["loginstaff"]) || $_SESSION["loginstaff"] == false) {
            header('Location: '.BASEURL.'/staff/login');
            exit;
        } else {
            $data['usernamestaff'] = $_SESSION["usernamestaff"];
            $data['emailstaff'] = $_SESSION["emailstaff"];
            $data['idstaff'] = $_SESSION["idstaff"];
            $data['judul'] = 'Dashboard';

            return $data;
        }
    }
}

