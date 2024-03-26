<?php

use PHPUnit\Framework\TestCase;

require_once 'app/models/Barang_model.php';
require_once 'app/models/BarangMasuk_model.php';
require_once 'app/core/Database.php';

class BarangModelTest extends TestCase {
    public function testCreateBarang() {
        $barangModel = new Barang_model();
        $data = ['nama_barang' => 'testbarulagi', 'stok' => 5];
        $existingData = $barangModel->searchData($data['nama_barang']);
        if(empty($existingData)) {
            $result = $barangModel->addBarang($data);
            $this->assertEquals(1, $result);
        } else {
            $this->fail('Data sudah ada');
        }
    }

    public function testAddBarangMasuk(){
        $barangMasukModel = new BarangMasuk_model();
        $barangModel = new Barang_model();
        $data = ['admin_id' => 9, 'barang_id' => 37, 'jumlah' => 3];
        $result = $barangMasukModel->addBarang($data);
        if ($result > 0) {
            $dataBarang = [
                'barang_id' => $data['barang_id'],
                'jumlah' => $data['jumlah']
            ];
            $updateResult = $barangModel->updateAddStok($dataBarang);
            if ($updateResult > 0) {
                $this->assertTrue(true, 'Barang masuk berhasil ditambahkan dan stok barang berhasil diperbarui.');
            } else {
                $this->fail('gagal update stok');
            }
        } else {
            $this->fail('Gagal Menambahkan Data Barang Masuk.');
        }
    }
    
}

?>
