<?php

class BarangMasuk_model{
	private $table = 'barang_masuk';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}

	public function getAllBarangMasuk(){
		$this->db->query('SELECT * FROM '.$this->table);
		return $this->db->resultSet();
	}

	 public function getAllBarangMasukWithBarang() {
         $query = "SELECT bm.id_barang_masuk, a.username as admin_username, bm.barang_id, b.nama_barang, bm.jumlah, bm.waktu
                  FROM barang_masuk bm
                  JOIN admin a ON bm.admin_id = a.id
                  JOIN barang b ON bm.barang_id = b.id";

        $this->db->query($query);
        return $this->db->resultSet();
    }
	
	public function addBarang($data){

		$date = date('Y-m-d H:i:s');
		$query = "INSERT INTO barang_masuk VALUES('',:admin_id ,:barang_id,:jumlah,:waktu)";
		$this->db->query($query);
		$this->db->bind(':admin_id', $data['admin_id']);
		$this->db->bind(':barang_id', $data['barang_id']);
		$this->db->bind(':jumlah', $data['jumlah']);
		$this->db->bind(':waktu', $date);
		$this->db->execute();
		return $this->db->rowCount();
	}
	
}