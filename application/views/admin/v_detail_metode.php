<!-- Bootstrap Dark Table -->
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
	<?php endif; ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title text-primary">TABEL <?= $sub1 ?></h5>
    <!-- <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button> -->
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example">
      <thead>
        <tr>
          <th>No</th>
          <th>Harga Paket</th>
          <th>Usia</th>
          <th>Hobi</th>
          <th>Lokasi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($inputdata as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= ($p->harga != null) ? "Rp " . number_format($p->harga,2,',','.') : "-";?> </td>
				<td> <?= ($p->usia != null) ? $p->usia : "-";?> </td>
				<td> <?= ($p->hobi != null) ? $p->hobi : "-";?> </td>
				<td> <?= ($p->lokasi != null) ? $p->lokasi : "-";?> </td>
				</tr>
				<?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<hr class="my-5" />

<div class="card">
  <div class="card-body">
    <h5 class="card-title text-primary">TABEL <?= $sub2 ?></h5>
    <!-- <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button> -->
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example">
      <thead>
        <tr>
          <th>No</th>
          <th>Paket Wisata</th>
          <th>Normalisasi Harga</th>
          <th>Normalisasi Usia</th>
          <th>Normalisasi Hobi</th>
          <th>Normalisasi Lokasi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($normal as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= $p->nama_wisata ?> </td>
				<td> <?= $p->hitung_harga ?> </td>
				<td> <?= $p->hitung_usia ?> </td>
				<td> <?= $p->hitung_hobi ?> </td>
				<td> <?= $p->hitung_lokasi ?> </td>
				</tr>
				<?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<hr class="my-5" />

<div class="card">
  <div class="card-body">
    <h5 class="card-title text-primary">TABEL <?= $sub3 ?></h5>
    <!-- <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button> -->
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>Paket Wisata</th>
          <th>Hasil Perhitungan SAW</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($datasaw as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= $p->nama_wisata ?> </td>
				<td> <?= $p->hasil_saw ?> </td>
				</tr>
				<?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>

<hr class="my-5" />

<div class="card">
  <div class="card-body">
    <h5 class="card-title text-primary">TABEL <?= $sub4 ?></h5>
    <!-- <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button> -->
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>Paket Wisata</th>
          <th>Harga Paket</th>
          <th>Fasilitas</th>
          <th>Lokasi</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($datasaw as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= $p->nama_wisata ?> </td>
				<td> <?= "Rp " . number_format($p->harga_paket,2,',','.') ?> </td>
				<td> <?= $p->fasilitas ?> </td>
				<td> <?= $p->lokasi ?> </td>
				</tr>
				<?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>