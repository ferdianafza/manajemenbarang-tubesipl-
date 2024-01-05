<?php

class Barangsuratjalan_model{
    private $table = 'barangsuratjalan';
    private $db;

    public function __construct(){
        $this->db = new Database;
    }

    public function addBarangSuratjalan($kode_surat_jalan, $barangIds, $jumlahs){
        // Loop melalui setiap barang yang dipilih
        for ($i = 0; $i < count($barangIds); $i++) {
            $query = "INSERT INTO barangsuratjalan VALUES(:kode_surat_jalan, :barang_id, :jumlah)";
            $this->db->query($query);
            $this->db->bind(':kode_surat_jalan', $kode_surat_jalan);
            $this->db->bind(':barang_id', $barangIds[$i]);
            $this->db->bind(':jumlah', $jumlahs[$i]);
            $this->db->execute();
        }

        return count($barangIds); // Mengembalikan jumlah barang yang berhasil ditambahkan
    }
}