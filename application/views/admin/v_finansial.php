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
    <button type="button" class="btn btn-outline-primary mb-2" data-bs-toggle="modal" data-bs-target="#tambahdata"><i class='bx bx-plus-medical'></i> Tambah Data</button>
    <div class="text-nowrap">
      <table class="table table-dark" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>Harga Minimum</th>
          <th>Harga Maximum</th>
          <th>Bobot Harga</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($tampil as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= "Rp " . number_format($p->fin_min,2,',','.') ?> </td>
				<td> <?= "Rp " . number_format($p->fin_max,2,',','.') ?> </td>
				<td> <?= $p->bobot_fin ?> </td>
        <td>
          <div class="dropdown">
             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
               <i class="bx bx-dots-vertical-rounded"></i>
             </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editdata<?= $p->id_fin ?>">
                  <i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" onclick="deleteConfirm('<?php echo site_url('admin/Bobot_Finansial/delete/'.$p->id_fin) ?>')" href="#!">
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
    <form action="<?= site_url('admin/Bobot_Finansial') ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="fin_min" class="form-label">Harga Minimum</label>
            <input type="text" name="fin_min" class="form-control <?= form_error('fin_min') ? 'is-invalid':'' ?>" placeholder="Harga Min" />
            <div class="invalid-feedback">
				      <?= form_error('fin_min') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="fin_max" class="form-label">Harga Maximum</label>
            <input type="text" name="fin_max" class="form-control <?= form_error('fin_max') ? 'is-invalid':'' ?>" placeholder="Harga Max" />
            <div class="invalid-feedback">
				      <?= form_error('fin_max') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" step="any" name="bobot" class="form-control <?= form_error('bobot') ? 'is-invalid':'' ?>" placeholder="Bobot" />
            <div class="invalid-feedback">
				      <?= form_error('bobot') ?>
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
<div class="modal fade" id="editdata<?= $p->id_fin ?>" tabindex="-1" aria-hidden="true">
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
    <form action="<?= site_url('admin/Bobot_Finansial/edit') ?>" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
        <input type="hidden" name="id_fin" value="<?= $p->id_fin?>" />
        <div class="row">
          <div class="col mb-3">
            <label for="fin_min" class="form-label">Harga Mininmum</label>
            <input type="text" name="fin_min" class="form-control <?= form_error('fin_min') ? 'is-invalid':'' ?>" placeholder="Harga Min" value="<?= $p->fin_min?>"/>
            <div class="invalid-feedback">
				      <?= form_error('fin_min') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="fin_max" class="form-label">Harga Maximum</label>
            <input type="text" name="fin_max" class="form-control <?= form_error('fin_max') ? 'is-invalid':'' ?>" placeholder="Harga Max" value="<?= $p->fin_max?>"/>
            <div class="invalid-feedback">
				      <?= form_error('fin_max') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" step="any" name="bobot" class="form-control <?= form_error('bobot') ? 'is-invalid':'' ?>" placeholder="Bobot" value="<?= $p->bobot_fin?>"/>
            <div class="invalid-feedback">
				      <?= form_error('bobot') ?>
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