<!-- Bootstrap Dark Table -->
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-success alert-dismissible" role="alert">
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
	<?php endif; ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title text-primary">TABEL <?= $judul ?></h5>
    <!-- <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button> -->
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>Harga</th>
          <th>Usia</th>
          <th>Hobi</th>
          <th>Lokasi</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($tampil as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= ($p->harga != null) ? "Rp " . number_format($p->harga,2,',','.') : "-";?> </td>
				<td> <?= ($p->usia != null) ? $p->usia : "-";?> </td>
				<td> <?= ($p->hobi != null) ? $p->hobi : "-";?> </td>
				<td> <?= ($p->lokasi != null) ? $p->lokasi : "-";?> </td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" href="<?= ($this->session->userdata('status') === "ADMIN") ? site_url('admin/History/detailSaw/'.$p->id_data) : site_url('user/History/detailSaw/'.$p->id_data)?>">
                  <i class="bx bx-file me-1"></i> Detail</a>
              </div>
            </div>
          </td>
				</tr>
				<?php endforeach; ?>
      </tbody>
    </table>
  </div>
  </div>
</div>
<thead>