<?php 
class Dashboard extends Controller {
    public function index() {
        $dashboardModel = $this->model('Dashboard_model');
        $data = $dashboardModel->checkLoginStatus();
        $data['getCountBarangEmpty'] = $this->model('Barang_model')->getCountBarangEmpty();
        $data['getCountBarang'] = $this->model('Barang_model')->getCountBarang();
        $data['getCountBarangMasuk'] = $this->model('BarangMasuk_model')->getCountBarangMasuk();
        $data['getCountBarangKeluar'] = $this->model('BarangKeluar_model')->getCountBarangKeluar();
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $data['barang_masuk'] = $this->model('BarangMasuk_model')->getAllBarangMasukWithBarang();
        $data['barang_keluar'] = $this->model('BarangKeluar_model')->getAllBarangKeluarWithBarang();
        if (isset($_POST['search_query'])) {
            $searchQuery = $_POST['search_query'];
            $data['barang'] = $this->model('Barang_model')->searchData($searchQuery);
        } else {
        }
        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function destroySession() {
        session_start();
        $_SESSION = [];
        session_unset();
        session_destroy();

        unset($_SESSION["loginstaff"]);
        unset($_SESSION["usernamestaff"]);
        unset($_SESSION["emailstaff"]);
        unset($_SESSION["idstaff"]);

        header('Location: '.BASEURL.'/staff/login');
        exit;
    }

    public function suratjalan(){
        $dashboardModel = $this->model('Dashboard_model');
        $data = $dashboardModel->checkLoginStatus();
        $data['judul'] = 'Surat Jalan';
        $data['barang'] = $this->model('Barang_model')->getAllBarang();
        $data['suratjalan'] = $this->model('Suratjalan_model')->getAllSuratJalanWithStaffAndBarangName();
        $this->view('templates/header', $data);
        $this->view('dashboard/suratjalan', $data);
        $this->view('templates/footer');
    }
}
