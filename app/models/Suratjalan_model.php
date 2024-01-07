<?php

class Suratjalan_model{
    private $table = 'suratjalan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function getSuratJalanByKodeSuratJalan($kode_surat_jalan){
	    $query = "SELECT sj.kode_surat_jalan, sj.penerima, sj.tujuan, s.username as staff_username, b.nama_barang as barang, bsj.jumlah, sj.waktu, bsj.barang_id
	              FROM suratjalan sj
	              JOIN staff s ON sj.staff_id = s.id
	              JOIN barangsuratjalan bsj ON sj.kode_surat_jalan = bsj.kode_surat_jalan
	              JOIN barang b ON bsj.barang_id = b.id
	              WHERE sj.kode_surat_jalan = :kode_surat_jalan";

	    $this->db->query($query);
	    $this->db->bind(':kode_surat_jalan', $kode_surat_jalan);
	    return $this->db->resultSet();
	}

    public function getAllSuratJalan(){
		$this->db->query('SELECT * FROM '.$this->table);
		return $this->db->resultSet();
	}

	public function getAllSuratJalanWithStaffAndBarangName() {
	    $query = "SELECT sj.kode_surat_jalan,sj.penerima, s.username as staff_username, sj.waktu, sj.tujuan
	              FROM suratjalan sj
	              JOIN staff s ON sj.staff_id = s.id ORDER BY sj.kode_surat_jalan DESC";

	    $this->db->query($query);
	    return $this->db->resultSet();
	}


    public function createSuratJalan($data){
		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO suratjalan VALUES('',:penerima, :tujuan ,:staff_id, :waktu)";
		$this->db->query($query);
		$this->db->bind(':penerima', $data['penerima']);
		$this->db->bind(':tujuan', $data['tujuan']);
		$this->db->bind(':staff_id', $data['staff_id']);
		// $this->db->bind(':barang_id', $data['barang_id']);
		// $this->db->bind(':jumlah', $data['jumlah']);
		$this->db->bind(':waktu', $date);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function getLastKodeSuratJalan(){
	    $query = "SELECT * FROM suratjalan ORDER BY kode_surat_jalan DESC LIMIT 1";
	    $this->db->query($query);
	    return $this->db->single();
	}

}