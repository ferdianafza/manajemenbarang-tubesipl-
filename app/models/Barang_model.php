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

	public function updateAddStok($data) {
        $currentStock = $this->getCurrentStock($data['barang_id']);
        $newStock = $currentStock + $data['jumlah'];

        $query = "UPDATE barang SET 
                    stok = :stok
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':stok', $newStock);
        $this->db->bind(':id', $data['barang_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function updateMinusStokAfterCreateSuratJalan($kodeSuratJalan, $barangIds, $jumlahs){
	    foreach ($barangIds as $index => $barangId) {
	        $query = "UPDATE barang SET stok = stok - :jumlah WHERE id = :barang_id";
	        $this->db->query($query);
	        $this->db->bind(':jumlah', $jumlahs[$index]);
	        $this->db->bind(':barang_id', $barangId);
	        $this->db->execute();
	    }
	    return count($barangIds);
	}

    public function updateMinusStok($data) {
        $currentStock = $this->getCurrentStock($data['barang_id']);
        $newStock = $currentStock - $data['jumlah'];

        $query = "UPDATE barang SET 
                    stok = :stok
                    WHERE id = :id";

        $this->db->query($query);
        $this->db->bind(':stok', $newStock);
        $this->db->bind(':id', $data['barang_id']);
        $this->db->execute();

        return $this->db->rowCount();
    }

	public function getCurrentStock($barang_id) {
        $query = "SELECT stok FROM barang WHERE id = :id";
        $this->db->query($query);
        $this->db->bind(':id', $barang_id);
        $result = $this->db->single();

        return $result['stok'];
    }

    public function searchData($searchQuery) {
	    $query = "SELECT * FROM {$this->table} WHERE nama_barang LIKE :search_query";
	    $this->db->query($query);
	    $this->db->bind(':search_query', "%$searchQuery%");
	    return $this->db->resultSet();
	}

	public function getCountBarang() {
    	$query = "SELECT COUNT(*) as ready_count FROM {$this->table} WHERE stok > 0";
	    $this->db->query($query);
	    $result = $this->db->single();
	    return $result['ready_count'];
	}
	public function getCountBarangEmpty() {
    	$query = "SELECT COUNT(*) as countEmptyBarang FROM {$this->table} WHERE stok = 0";
	    $this->db->query($query);
	    $result = $this->db->single();
	    return $result['countEmptyBarang'];
	}
}