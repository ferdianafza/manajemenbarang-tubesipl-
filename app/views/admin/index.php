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
                <span class="d-sm-inline d-none"><?= $data['usernameadmin']; ?></span>
              </a>
            </li>
            <li class="nav-item pe-2 d-flex align-items-center">
              <a href="<?= BASEURL;?>/admin/destroySession" class="nav-link text-body p-0" >
                |logout
              </a>
              <ul class="dropdown-menu  dropdown-menu-end  px-2 py-3 me-sm-n4" aria-labelledby="dropdownMenuButton">
              </ul>
            </li>
          </ul>
        </div>
      </div>
    </nav>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">TOTAL BARANG</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['getCountBarang'];?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-money-coins text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Barang Masuk</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['getCountBarangMasuk'];?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-world text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Barang Keluar</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['getCountBarangKeluar'];?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-paper-diploma text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="col-8">
                  <div class="numbers">
                    <p class="text-sm mb-0 text-capitalize font-weight-bold">Barang Kosong</p>
                    <h5 class="font-weight-bolder mb-0">
                      <?= $data['getCountBarangEmpty'];?>
                    </h5>
                  </div>
                </div>
                <div class="col-4 text-end">
                  <div class="icon icon-shape bg-gradient-primary shadow text-center border-radius-md">
                    <i class="ni ni-cart text-lg opacity-10" aria-hidden="true"></i>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
	  <div class="container mt-3">
	    <div class="row">
		  <div class="col-lg-6">
			<?php Flasher::flash();?>
		  </div>
		</div>
	   <div class="row">
		<div class="col-lg-14 mb-lg-0 mb-4">
          <div class="card">
            <div class="card-body p-3">
              <div class="row">
                <div class="">
                  <div class="d-flex flex-column h-100">
                    <h4>DATA BARANG</h4>
					<button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModal">
		  				Buat Data Barang
					</button>
					<table class="table table-striped table-hover table-bordered" >
						<tr>
							<thead>
								<th scope="col">Id</th>
								<th scope="col">Nama Barang</th>
								<th scope="col">Stok</th>
							</thead>
						</tr>
						<?php foreach ($data['barang'] as $barang ) : ?>
					  	<tr>
					  		<td><?= $barang['id']; ?></td>
					  		<td><?= $barang['nama_barang']; ?></td>
					  		<td><?= $barang['stok']; ?></td>
					  	</tr>
						<?php endforeach; ?>
					</table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
		<div class="col-lg-14 mt-4">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
              <span class="mask "></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
              	<h4>DATA BARANG MASUK</h4>
				<button type="button" class="btn btn-primary tambahDataBarangMasuk" data-bs-toggle="modal" data-bs-target="#formModalTambahBarangMasuk">
	  				Tambah Barang Masuk
				</button>
                <table class="table table-striped table-hover table-bordered">
				    <thead>
				        <tr>
				            <th scope="col">Id Barang Masuk</th>
				            <th scope="col">Penanggung Jawab</th>
				            <th scope="col">Barang</th>
				            <th scope="col">Jumlah</th>
				            <th scope="col">Waktu</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php foreach ($data['barang_masuk'] as $barangMasuk) : ?>
				            <tr>
				                <td><?= $barangMasuk['id_barang_masuk']; ?></td>
				                <td><?= $barangMasuk['admin_username']; ?></td>
				                <td><?= $barangMasuk['nama_barang']; ?></td>
				                <td><?= $barangMasuk['jumlah']; ?></td>
				                <td><?= $barangMasuk['waktu']; ?></td>
				            </tr>
				        <?php endforeach; ?>
				    </tbody>
				</table>
              </div>
            </div>
          </div>
        </div>
		<div class="col-lg-14 mt-4">
          <div class="card h-100 p-3">
            <div class="overflow-hidden position-relative border-radius-lg bg-cover h-100">
              <span class="mask "></span>
              <div class="card-body position-relative z-index-1 d-flex flex-column h-100 p-3">
              	<h4>DATA BARANG KELUAR</h4>
				<button type="button" class="btn btn-primary tambahDataBarangMasuk" data-bs-toggle="modal" data-bs-target="#formModalTambahBarangKeluar">
	  				Tambah Barang Keluar
				</button>
                <table class="table table-striped table-hover table-bordered">
				    <thead>
				        <tr>
				            <th scope="col">Id Barang Keluar</th>
				            <th scope="col">Penanggung Jawab</th>
				            <th scope="col">Barang</th>
				            <th scope="col">Jumlah</th>
				            <th scope="col">Waktu</th>
				        </tr>
				    </thead>
				    <tbody>
				        <?php foreach ($data['barang_keluar'] as $barangKeluar) : ?>
				            <tr>
				                <td><?= $barangKeluar['id_barang_keluar']; ?></td>
				                <td><?= $barangKeluar['admin_username']; ?></td>
				                <td><?= $barangKeluar['nama_barang']; ?></td>
				                <td><?= $barangKeluar['jumlah']; ?></td>
				                <td><?= $barangKeluar['waktu']; ?></td>
				            </tr>
				        <?php endforeach; ?>
				    </tbody>
				</table>
              </div>
            </div>
          </div>
        </div>

		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Buat Data Barang</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/barang/create" method="post">
        	<input type="hidden" name="id" id="id">
        	<div class="form-group">
			  <label for="nama" class="form-label">Nama Barang</label>
			  <input type="text" class="form-control" id="nama_barang" name="nama_barang" required="">
			</div>

			<div class="form-group">
			  <label for="nrp" class="form-label">Stok</label>
			  <input type="number" class="form-control" id="stok" name="stok" value="0" readonly="">
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Buat Data</button>
    	</form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="formModalTambahBarangMasuk" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Barang Masuk</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/barangMasuk/create" method="post">
        	<input type="hidden" name="admin_id" id="admin_id" value="<?= $data['idadmin'];?>" >
        	<div class="form-group">
				<label for="barang_id">Pilih Barang</label>
				<select class="form-control" id="barang_id" name="barang_id">
				    <option value=""></option>
				    <?php foreach ($data['barang'] as $barang) : ?>
				        <option value="<?php echo $barang['id']; ?>"><?php echo $barang['nama_barang']; ?></option>
				    <?php endforeach; ?>
				</select>

			</div>

			<div class="form-group">
			  <label for="nrp" class="form-label">Stok</label>
			  <input type="number" class="form-control" id="jumlah" name="jumlah" pattern="[0-9]*" required="">
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    	</form>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="formModalTambahBarangKeluar" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Barang Keluar</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="<?= BASEURL;?>/barangKeluar/create" method="post">
        	<input type="hidden" name="admin_id" id="admin_id" value="<?= $data['idadmin'];?>" >
        	<div class="form-group">
				<label for="barang_id">Pilih Barang</label>
				<select class="form-control" id="barang_id" name="barang_id">
				    <option value=""></option>
				    <?php foreach ($data['barang'] as $barang) : ?>
				        <option value="<?php echo $barang['id']; ?>"><?php echo $barang['nama_barang']; ?></option>
				    <?php endforeach; ?>
				</select>

			</div>

			<div class="form-group">
			  <label for="nrp" class="form-label">Stok</label>
			  <input type="number" class="form-control" id="jumlah" name="jumlah" pattern="[0-9]*" required="">
			</div>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Tambah Data</button>
    	</form>
      </div>
    </div>
  </div>
</div>
<a href="<?= BASEURL;?>/admin/destroySession">Log out</a>
</main>