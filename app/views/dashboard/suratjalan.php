
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

<script>
$(document).ready(function() {
    $('#barang_id').on('change', function() {
        var selectedBarangCount = $('#barang_id').val().length;
        $('#jumlah').empty(); // Hapus elemen input jumlah yang ada

        for (var i = 0; i < selectedBarangCount; i++) {
            $('#jumlah').append('<div class="form-group">' +
                '<label for="jumlah' + i + '" class="form-label">Jumlah Barang ' + (i + 1) + '</label>' +
                '<input type="number" class="form-control" id="jumlah' + i + '" name="jumlah[]" value="" required>' +
                '</div>');
        }
    });
});
</script>  
  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
    <nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl" id="navbarBlur" navbar-scroll="true">
      <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb">
          <h6 class="font-weight-bolder mb-0">Dashboard</h6>
        </nav>
        <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
          <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            <div class="input-group">
            </div>
          </div>
          <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
              <a href="javascript:;" class="nav-link text-body font-weight-bold px-0">
                <i class="fa fa-user me-sm-1"></i>
                <span class="d-sm-inline d-none"><?= $data['usernamestaff']; ?></span>
              </a>
            </li>
            <li class="nav-item pe-2 d-flex align-items-center">
              <a href="<?= BASEURL;?>/dashboard/destroySession" class="nav-link text-body p-0" >
                |logout
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <!-- End Navbar -->

    <!-- ISI KONTEN -->
    <div class="col-lg-14 mb-lg-0 mb-4">
      <div class="card">
        <div class="card-body p-3">
          <div class="row">
            <div class="">
              <div class="d-flex flex-column h-100">
                <button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModalSuratJalan">
                  Buat Data Surat Jalan Barang
                </button>
                <?php Flasher::flash();?>
                <div class="table-responsive">
                  <table class="table table-striped table-hover table-bordered" >
                    <tr>
                      <thead>
                        <th scope="col">Kode Surat Jalan</th>
                        <th scope="col">Penerima</th>
                        <th scope="col">Tujuan</th>
                        <th scope="col">Penanggung Jawab</th>
                        <th scope="col">Waktu</th>
                        <th scope="col">Aksi</th>
                      </thead>
                    </tr>
                    <?php foreach ($data['suratjalan'] as $suratjalan ) : ?>
                    <tr>
                      <td><?= $suratjalan['kode_surat_jalan']; ?></td>
                      <td><?= $suratjalan['penerima']; ?></td>
                      <td><?= $suratjalan['tujuan']; ?></td>
                      <td><?= $suratjalan['staff_username']; ?></td>
                      <td><?= $suratjalan['waktu']; ?></td>
                      <td>
                          <a href="<?= BASEURL;?>/suratjalan/cetaksuratjalan/<?= $suratjalan['kode_surat_jalan']; ?>" class="btn btn-info" >Cetak</a>
                      </td>
                    </tr>
                    <?php endforeach; ?>
                  </table>
                </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- AKHIR ISI KONTEN -->

  <!-- MODAL FORM SURAT JALAN -->
  <div class="modal fade" id="formModalSuratJalan" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Buat Surat Jalan </h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <!-- MULTIPLE -->
          <form action="<?= BASEURL; ?>/suratjalan/create" method="post">
    <!-- Bagian formulir sebelumnya tetap tidak berubah -->
     <div class="form-group">
        <label for="nama" class="form-label">Penerima</label>
        <input type="text" class="form-control" id="penerima" name="penerima" required="">
      </div>

      <div class="form-group">
        <label for="nama" class="form-label">Tujuan</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan" required="">
      </div>

      <div class="form-group">
        <label for="nrp" class="form-label">Penanggung Jawab</label>
        <input type="number" class="form-control" id="staff_id" name="staff_id" value="<?= $data['idstaff']; ?>" readonly="" hidden>
      </div>
    <div class="form-group">
        <label for="barang_id">Pilih Barang</label>
        <select class="form-control" id="barang_id" name="barang_id[]" multiple="multiple">
            <option value=""></option>
            <?php foreach ($data['barang'] as $barang) : ?>
                <option value="<?php echo $barang['id']; ?>"><?php echo $barang['nama_barang']; ?></option>
            <?php endforeach; ?>
        </select>
    </div>

    <div id="jumlah"></div> <!-- Tempat menambahkan elemen input jumlah secara dinamis -->

    <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buat Data</button>
    </div>
</form>

        <!-- MULTIPLE -->
       <!--  <form action="<?= BASEURL;?>/suratjalan/create" method="post">
          <input type="hidden" name="id" id="id">
      <div class="form-group">
        <label for="nama" class="form-label">Penerima</label>
        <input type="text" class="form-control" id="penerima" name="penerima" required="">
      </div>

      <div class="form-group">
        <label for="nama" class="form-label">Tujuan</label>
        <input type="text" class="form-control" id="tujuan" name="tujuan" required="">
      </div>

      <div class="form-group">
        <label for="nrp" class="form-label">Penanggung Jawab</label>
        <input type="number" class="form-control" id="staff_id" name="staff_id" value="<?= $data['id']; ?>" readonly="" hidden>
      </div>
      
      <label for="barang_id">Pilih Barang</label>
      <select class="form-control" id="barang_id" name="barang_id">
          <option value=""></option>
          <?php foreach ($data['barang'] as $barang) : ?>
              <option value="<?php echo $barang['id']; ?>"><?php echo $barang['nama_barang']; ?></option>
          <?php endforeach; ?>
      </select>

      <div class="form-group">
        <label for="nrp" class="form-label">Jumlah</label>
        <input type="number" class="form-control" id="jumlah" name="jumlah" value="" required="">
      </div>


      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buat Data</button>
      </form> -->
      </div>
    </div>
  </div>
</div>

