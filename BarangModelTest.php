<?php

use PHPUnit\Framework\TestCase;

require_once 'app/models/Barang_model.php';
require_once 'app/models/BarangMasuk_model.php';
require_once 'app/models/BarangKeluar_model.php';
require_once 'app/models/Suratjalan_model.php';
require_once 'app/models/Barangsuratjalan_model.php';
require_once 'app/core/Database.php';


class BarangModelTest extends TestCase {
    public function testCreateBarang() {
        $barangModel = new Barang_model();
        $data = ['nama_barang' => 'testbarulagi3', 'stok' => 5];
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

    public function testAddBarangKeluar(){
        $barangKeluar = new BarangKeluar_model();
        $barangModel = new Barang_model();
        $data = ['admin_id' => 9, 'barang_id' => 37, 'jumlah' => 3];
        $result = $barangKeluar->minusBarang($data);
        if ($result > 0) {
            $dataBarang = [
                'barang_id' => $data['barang_id'],
                'jumlah' => $data['jumlah']
            ];
            $updateResult = $barangModel->updateMinusStok($dataBarang);
            if ($updateResult > 0) {
                $this->assertTrue(true, 'Barang Keluar berhasil ditambahkan dan stok barang berhasil diperbarui.');
            } else {
                $this->fail('gagal update stok');
            }
        } else {
            $this->fail('Gagal Menambahkan Data Barang Keluar.');
        }
    }

    public function testCreateSuratJalan(){
        $barangModel = new Barang_model();
        $barangKeluar = new BarangKeluar_model();
        $barangIds = [37, 36];
        $jumlahs = [2,1];

        foreach ($barangIds as $index => $barangId) {
            $stok = $barangModel->getCurrentStock($barangId);
            $jumlah = $jumlahs[$index];
            if ($jumlah > $stok || $stok <= 0 || $jumlah <= 0) {
                $this->fail('Gagal Buat Surat Jalan, Jumlah tidak valid untuk barang yang dipilih');
            }
        }
        $dataBarangIdsAndJumlahs = [
            'barang_id' => $barangIds,
            'jumlah' => $jumlahs,
            'penerima' => 'PT ASAHI',
            'tujuan' => 'Bandung',
            'staff_id' => 5
        ];
        $suratJalan = new Suratjalan_model();
        $result = $suratJalan->createSuratJalan($dataBarangIdsAndJumlahs);
        if ($result > 0) {
            $kodeSuratJalan = $suratJalan->getLastKodeSuratJalan();
            if($barangModel->updateMinusStokAfterCreateSuratJalan($kodeSuratJalan['kode_surat_jalan'], $dataBarangIdsAndJumlahs['barang_id'], $dataBarangIdsAndJumlahs['jumlah']) > 0){
                if($barangKeluar->minusBarangAfterCreateSuratJalan($kodeSuratJalan['kode_surat_jalan'], $dataBarangIdsAndJumlahs['barang_id'], $dataBarangIdsAndJumlahs['jumlah']) > 0){
                    $kodeSuratJalan = $suratJalan->getLastKodeSuratJalan();
                    $barangsuratjalan = new Barangsuratjalan_model();
                    $barangsuratjalan->addBarangSuratjalan($kodeSuratJalan['kode_surat_jalan'], $dataBarangIdsAndJumlahs['barang_id'], $dataBarangIdsAndJumlahs['jumlah']);
                    $this->assertTrue(true, 'Berhasil Membuat Surat Jalan');
                }
            }
        } else {
            $this->fail('Gagal Membuat Surat Jalan.');
        }

    }
    
}

?>
