<!-- Bootstrap Dark Table -->
<?php if ($this->session->flashdata('success')): ?>
  <div class="alert alert-danger alert-dismissible" role="alert">
    <?= $this->session->flashdata('success'); ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
  
	<?php endif; ?>
<!-- <?= var_dump($kriteria);?> -->
  <div class="row">
  <!-- Basic Layout -->
  <div class="col-xxl">
    <div class="card mb-4">
      <div class="card-header d-flex align-items-center justify-content-between">
      <h5 class="card-title text-primary">FORM <?= $judul ?></h5>
      </div>
      <div class="card-body">
        <form action="<?= site_url('admin/Metode_Saw/Metode') ?>" method="post" enctype="multipart/form-data">
          <div class="row mb-3">
            <label class="col-sm-2 col-form-label" for="harga_paket">Harga Paket</label>
            <div class="col-sm-10">
              <input type="text" name="harga_paket" class="form-control <?= form_error('harga_paket') ? 'is-invalid':'' ?>" id="harga_paket" placeholder="Harga Paket" />
              <div class="invalid-feedback">
				      <?= form_error('harga_paket') ?>
			      </div>
            </div>
          </div>
          <div class="row mb-3">
            <label for="id_usia" class="col-sm-2 col-form-label">Jenis Usia</label>
            <div class="col-sm-10">
            <select class="form-select <?= form_error('id_usia') ? 'is-invalid':'' ?>" name="id_usia" aria-label="Default select example">
            <option value="0" selected>Pilih...</option>
            <?php foreach ($usia as $u): ?>
              <option value="<?= $u->id_usia ?>"><?= $u->usia?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_usia') ?>
			      </div>
			      </div>
          </div>
          <div class="row mb-3">
            <label for="id_hobi" class="col-sm-2 col-form-label">Hobi</label>
            <div class="col-sm-10">
            <select class="form-select <?= form_error('id_hobi') ? 'is-invalid':'' ?>" name="id_hobi" aria-label="Default select example">
              <option value="0" selected>Pilih...</option>
              <?php foreach ($hobi as $h): ?>
              <option value="<?= $h->id_hobi ?>"><?= $h->hobi?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_hobi') ?>
			      </div>
          </div>
        </div>
          <div class="row mb-3">
            <label for="id_lokasi" class="col-sm-2 col-form-label">Lokasi</label>
            <div class="col-sm-10">
            <select class="form-select <?= form_error('id_lokasi') ? 'is-invalid':'' ?>" name="id_lokasi" aria-label="Default select example">
              <option value="0" selected>Pilih...</option>
              <?php foreach ($lokasi as $l): ?>
              <option value="<?= $l->id_lokasi ?>"><?= $l->lokasi?></option>
              <?php endforeach; ?>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('id_lokasi') ?>
			      </div>
          </div>
        </div>
          <div class="row justify-content-end">
            <div class="col-sm-10">
              <button type="submit" class="btn btn-primary">Send</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>