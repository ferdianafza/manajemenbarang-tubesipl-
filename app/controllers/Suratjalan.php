<?php 
class Suratjalan extends Controller {
	public function create(){
        
        $barangIds = $_POST['barang_id'];
        $jumlahs = $_POST['jumlah'];

        
        foreach ($barangIds as $index => $barangId) {
            $stok = $this->model('Barang_model')->getCurrentStock($barangId);
            $jumlah = $jumlahs[$index];
            if ($jumlah > $stok || $stok <= 0 || $jumlah <= 0) {
                Flasher::setFlash('gagal', 'Buat Surat Jalan | Jumlah tidak valid untuk barang yang dipilih', 'danger');
                header('Location: '.BASEURL.'/dashboard/suratjalan');
                exit;
            }
        }

        
        if($this->model('Suratjalan_model')->createSuratJalan($_POST) > 0){
        	$kodeSuratJalan = $this->model('Suratjalan_model')->getLastKodeSuratJalan();
		    if($this->model('Barang_model')->updateMinusStokAfterCreateSuratJalan($kodeSuratJalan['kode_surat_jalan'], $_POST['barang_id'], $_POST['jumlah']) > 0){
		        if($this->model('BarangKeluar_model')->minusBarangAfterCreateSuratJalan($kodeSuratJalan['kode_surat_jalan'], $_POST['barang_id'], $_POST['jumlah']) > 0){
                    
                    $kodeSuratJalan = $this->model('Suratjalan_model')->getLastKodeSuratJalan();
                    $barangsuratjalanModel = $this->model('Barangsuratjalan_model');
                    $barangsuratjalanModel->addBarangSuratjalan($kodeSuratJalan['kode_surat_jalan'], $_POST['barang_id'], $_POST['jumlah']);

                    Flasher::setFlash('berhasil', 'buat suratjalan', 'success');
                    header('Location: '.BASEURL.'/dashboard/suratjalan');
                    exit;
                }
            }
        } else {
            Flasher::setFlash('gagal', 'buat suratjalan', 'danger');
            header('Location: '.BASEURL.'/dashboard/suratjalan');
            exit;
        }
    }

    


	// public function create(){
	// 	$stok = $this->model('Barang_model')->getCurrentStock($_POST['barang_id']);
	// 	if($stok > $_POST['jumlah'] && $stok > 0){
	// 	    if($this->model('Suratjalan_model')->createSuratJalan($_POST) > 0){
	// 	        if($this->model('Barang_model')->updateMinusStokAfterCreateSuratJalan($_POST) > 0){
	// 	            if($this->model('BarangKeluar_model')->minusBarangAfterCreateSuratJalan($_POST) > 0){
	// 	                Flasher::setFlash('berhasil', 'buat suratjalan', 'success');
	// 	                header('Location: '.BASEURL.'/dashboard/suratjalan');
	// 	                exit;
	// 	            }
	// 	        }
	// 	    } else {
	// 	        Flasher::setFlash('gagal', 'buat suratjalan', 'danger');
	// 	        header('Location: '.BASEURL.'/dashboard/suratjalan');
	// 	        exit;
	// 	    }
	// 	} else {
	// 		Flasher::setFlash('gagal', 'Buat Surat Jalan | Jumlah tidak boleh melebihi stok dan stok awal tidak boleh 0', 'danger');
	// 	        header('Location: '.BASEURL.'/dashboard/suratjalan');
	// 	        exit;
	// 	}
	// }

	public function cetaksuratjalan($kodesuratjalan){
		$data['judul'] = 'Surat Jalan';
		$data['suratjalan'] = $this->model('Suratjalan_model')->getSuratJalanByKodeSuratJalan($kodesuratjalan);
		$this->view('logintemplates/header',$data);
		$this->view('dashboard/cetaksuratjalan',$data);
		$this->view('logintemplates/footer');
	}
}