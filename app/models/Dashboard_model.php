<?php

class Dashboard_model {
    public function checkLoginStatus() {
        if (!isset($_SESSION["login"]) || $_SESSION["login"] == false) {
            header('Location: '.BASEURL.'/staff/login');
            exit;
        } else {
            $data['username'] = $_SESSION["username"];
            $data['email'] = $_SESSION["email"];
            $data['id'] = $_SESSION["id"];
            $data['judul'] = 'Dashboard';

            return $data;
        }
    }
    public function destroySession() {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        header('Location: '.BASEURL.'/staff/login');
        exit;
    }
}

