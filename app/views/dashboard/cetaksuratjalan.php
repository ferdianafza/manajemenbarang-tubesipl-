<br/>
<br/>
<hr>
<?php
setlocale(LC_TIME, 'id_ID');
echo '<p>Tanggal: ' . strftime('%A, %d %B %Y', strtotime($data['suratjalan'][0]['waktu'])) . '</p>';
?>
<p>Nomor Surat jalan: <?= $data['suratjalan'][0]['kode_surat_jalan']; ?></p>
<p>Perihal: Surat jalan</p>
<p><b>Kepada Yth.</b></p>
<p><?= $data['suratjalan'][0]['penerima']; ?></p>
<p><?= $data['suratjalan'][0]['tujuan']; ?></p>
<p>Dengan Hormat,</p>
<p>Bersama Surat ini, kami mengirimkan barang-barang sebagai berikut:</p>
<table class="table table-striped table-hover table-bordered">
    <thead>
        <tr>
            <th scope="col">Kode Barang</th>
            <th scope="col">Barang</th>
            <th scope="col">Jumlah</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($data['suratjalan'] as $barang) : ?>
            <tr>
                <td><?= $barang['barang_id']; ?></td>
                <td><?= $barang['barang']; ?></td>
                <td><?= $barang['jumlah']; ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<p>Kami memastikan bahwa barang yang tertulis di atas dikirimkan dalam kondisi baik dan berharap sampai ditangan anda juga dalam kondisi baik, terimkasih sebelumnya</p>
<p>Hormat Kami</p>
<br/>
<br/>
<p><?= $data['suratjalan'][0]['staff_username']; ?></p>

<script>
    window.print();
</script>
