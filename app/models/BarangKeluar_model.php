<?php

class BarangKeluar_model{
	private $table = 'barang_keluar';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllBarangKeluar(){
		$this->db->query('SELECT * FROM '.$this->table);
		return $this->db->resultSet();
	}

	 public function getAllBarangKeluarWithBarang() {
         $query = "SELECT bk.id_barang_keluar, a.username as admin_username, bk.barang_id, b.nama_barang, bk.jumlah, bk.waktu
                  FROM barang_keluar bk
                  JOIN admin a ON bk.admin_id = a.id
                  JOIN barang b ON bk.barang_id = b.id";

        $this->db->query($query);
        return $this->db->resultSet();
    }
	
	public function minusBarang($data){

		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO barang_keluar VALUES('',:admin_id ,:barang_id,:jumlah,:waktu)";
		$this->db->query($query);
		$this->db->bind(':admin_id', $data['admin_id']);
		$this->db->bind(':barang_id', $data['barang_id']);
		$this->db->bind(':jumlah', $data['jumlah']);
		$this->db->bind(':waktu', $date);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function getCountBarangKeluar() {
    	$query = "SELECT COUNT(*) as countBarangKeluar FROM {$this->table} ";
	    $this->db->query($query);
	    $result = $this->db->single();
	    return $result['countBarangKeluar'];
	}

	
}