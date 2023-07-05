<!-- Bootstrap Dark Table -->
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
	<?php endif; ?>
<div class="card">
  <div class="card-body">
    <h5 class="card-title text-primary">TABEL <?= $judul ?></h5>
    <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button>
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>Paket Wisata</th>
          <th>Harga Paket</th>
          <th>Fasilitas</th>
          <th>Lokasi</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($tampil as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= $p->nama_wisata ?> </td>
				<td> <?= "Rp " . number_format($p->harga_paket,2,',','.') ?> </td>
				<td> <?= $p->fasilitas ?> </td>
				<td> <?= $p->lokasi ?> </td>
        <td>
          <div class="dropdown">
            <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
              <i class="bx bx-dots-vertical-rounded"></i>
            </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editdata<?= $p->id_wisata ?>">
                  <i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" onclick="deleteConfirm('<?php echo site_url('admin/Wisata/delete/'.$p->id_wisata) ?>')" href="#!">
                  <i class="bx bx-trash me-1"></i> Delete</a>
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

<!-- Modal Tambah Data-->
<div class="modal fade" id="tambahdata" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><?= $sub ?></h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
    <form action="<?= site_url('admin/Wisata') ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nama_wisata" class="form-label">Paket Wisata</label>
            <input type="text" name="nama_wisata" class="form-control <?= form_error('nama_wisata') ? 'is-invalid':'' ?>" placeholder="Paket Wisata" />
            <div class="invalid-feedback">
				      <?= form_error('nama_wisata') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="harga_paket" class="form-label">Harga Paket</label>
            <input type="number" name="harga_paket" class="form-control <?= form_error('harga_paket') ? 'is-invalid':'' ?>" placeholder="Harga Paket" />
            <div class="invalid-feedback">
				      <?= form_error('harga_paket') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control <?= form_error('fasilitas') ? 'is-invalid':'' ?>" placeholder="Fasilitas" />
            <div class="invalid-feedback">
				      <?= form_error('fasilitas') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="id_usia" class="form-label">Jenis Usia</label>
            <select class="form-select <?= form_error('id_usia') ? 'is-invalid':'' ?>" name="id_usia" aria-label="Default select example">
            <option selected>Pilih...</option>
            <?php foreach ($usia as $u): ?>
              <option value="<?= $u->id_usia ?>"><?= $u->usia?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_usia') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="id_hobi" class="form-label">Hobi</label>
            <select class="form-select <?= form_error('id_hobi') ? 'is-invalid':'' ?>" name="id_hobi" aria-label="Default select example">
              <option selected>Pilih...</option>
              <?php foreach ($hobi as $h): ?>
              <option value="<?= $h->id_hobi ?>"><?= $h->hobi?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_hobi') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select class="form-select <?= form_error('id_lokasi') ? 'is-invalid':'' ?>" name="id_lokasi" aria-label="Default select example">
              <option selected>Pilih...</option>
              <?php foreach ($lokasi as $l): ?>
              <option value="<?= $l->id_lokasi ?>"><?= $l->lokasi?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_lokasi') ?>
			      </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>

<!-- Modal Edit Data-->
<?php foreach ($tampil as $p): ?>
<div class="modal fade" id="editdata<?= $p->id_wisata ?>" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel1"><?= $sub2 ?></h5>
        <button
          type="button"
          class="btn-close"
          data-bs-dismiss="modal"
          aria-label="Close"
        ></button>
      </div>
    <form action="<?= site_url('admin/Wisata/edit') ?>" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
        <input type="hidden" name="id_wisata" value="<?= $p->id_wisata?>" />
        <div class="row">
          <div class="col mb-3">
            <label for="nama_wisata" class="form-label">Paket Wisata</label>
            <input type="text" name="nama_wisata" class="form-control <?= form_error('nama_wisata') ? 'is-invalid':'' ?>" placeholder="Paket Wisata" value="<?= $p->nama_wisata ?>"/>
            <div class="invalid-feedback">
				      <?= form_error('nama_wisata') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="harga_paket" class="form-label">Harga Paket</label>
            <input type="number" name="harga_paket" class="form-control <?= form_error('harga_paket') ? 'is-invalid':'' ?>" placeholder="Harga Paket" value="<?= $p->harga_paket ?>"/>
            <div class="invalid-feedback">
				      <?= form_error('harga_paket') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="fasilitas" class="form-label">Fasilitas</label>
            <input type="text" name="fasilitas" class="form-control <?= form_error('fasilitas') ? 'is-invalid':'' ?>" placeholder="Fasilitas" value="<?= $p->fasilitas ?>"/>
            <div class="invalid-feedback">
				      <?= form_error('fasilitas') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="id_usia" class="form-label">Jenis Usia</label>
            <select class="form-select <?= form_error('id_usia') ? 'is-invalid':'' ?>" name="id_usia" aria-label="Default select example">
            <option selected>Pilih...</option>
            <?php foreach ($usia as $u): ?>
              <option value="<?= $u->id_usia ?>" <?php if ($p->id_usia == $u->id_usia){echo "selected";} ?>><?= $u->usia?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_usia') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="id_hobi" class="form-label">Hobi</label>
            <select class="form-select <?= form_error('id_hobi') ? 'is-invalid':'' ?>" name="id_hobi" aria-label="Default select example">
              <option selected>Pilih...</option>
              <?php foreach ($hobi as $h): ?>
              <option value="<?= $h->id_hobi ?>" <?php if ($p->id_hobi == $h->id_hobi){echo "selected";} ?>><?= $h->hobi?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_hobi') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="id_lokasi" class="form-label">Lokasi</label>
            <select class="form-select <?= form_error('id_lokasi') ? 'is-invalid':'' ?>" name="id_lokasi" aria-label="Default select example">
              <option selected>Pilih...</option>
              <?php foreach ($lokasi as $l): ?>
              <option value="<?= $l->id_lokasi ?>" <?php if ($p->id_lokasi == $l->id_lokasi){echo "selected";} ?>><?= $l->lokasi?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_lokasi') ?>
			      </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-outline-secondary" data-bs-dismiss="modal">
          Close
        </button>
        <button type="submit" class="btn btn-primary">Save changes</button>
      </div>
    </form>
    </div>
  </div>
</div>
<?php endforeach; ?>