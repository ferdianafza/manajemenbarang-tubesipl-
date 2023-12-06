<div class="container mt-3">
	<div class="row">
		<div class="col-lg-6">
			<?php Flasher::flash();?>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-6">
			<button type="button" class="btn btn-primary tambahData" data-bs-toggle="modal" data-bs-target="#formModal">
  				Buat Data Barang
			</button>
			<br/>
			<h3>Data Barang</h3>
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

<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="judulModal">Tambah Data Barang</h1>
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
        <button type="submit" class="btn btn-primary">Tambah Data</button>
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
        	<input type="hidden" name="admin_id" id="admin_id" value="<?= $data['id'];?>" >
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
        	<input type="hidden" name="admin_id" id="admin_id" value="<?= $data['id'];?>" >
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