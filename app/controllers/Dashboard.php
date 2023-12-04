<?php 
class Dashboard extends Controller {
    public function index() {
        $dashboardModel = $this->model('Dashboard_model');
        $data = $dashboardModel->checkLoginStatus();

        $this->view('templates/header', $data);
        $this->view('dashboard/index', $data);
        $this->view('templates/footer');
    }

    public function destroySession() {
        $dashboardModel = $this->model('Dashboard_model');
        $dashboardModel->destroySession();
    }
}
