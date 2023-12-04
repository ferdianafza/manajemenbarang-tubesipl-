<?php

class Barang_model{
	private $table = 'barang';
	private $db;

	public function __construct(){
		$this->db = new Database;
	}
	

	public function getAllBarang(){
		$this->db->query('SELECT * FROM '.$this->table);
		return $this->db->resultSet();
	}

	public function getBarangById($id){
		$query = "SELECT * FROM barang WHERE id = :id";
		$this->db->query($query);
		$this->db->bind(':id', $id);
		return $this->db->single();
	}

	public function addBarang($data){
		$query = "INSERT INTO barang VALUES('',:nama_barang,:stok)";
		$this->db->query($query);
		$this->db->bind(':nama_barang', $data['nama_barang']);
		$this->db->bind(':stok', $data['stok']);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function deleteBarang($id){
		$query = "DELETE FROM barang WHERE id=:id";
		$this->db->query($query);
		$this->db->bind(':id',$id);
		$this->db->execute();
		return $this->db->rowCount();
	}

	public function updateBarang($data){
		$query = "UPDATE barang SET 
					nama_barang = :nama_barang,
					stok = :stok,
					WHERE id = :id";

		$this->db->query($query);
		$this->db->bind(':nama_barang', $data['nama_barang']);
		$this->db->bind(':stok', $data['stok']);
		$this->db->bind(':id', $data['id']);
		$this->db->execute();
		return $this->db->rowCount();
	}