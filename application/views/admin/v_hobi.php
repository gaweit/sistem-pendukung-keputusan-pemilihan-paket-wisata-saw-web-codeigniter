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
    <div class="table-responsive text-nowrap">
      <table class="table table-bordered table-dark" id="example1">
      <thead>
        <tr>
          <th>No</th>
          <th>Hobi</th>
          <th>Bobot</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($tampil as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= $p->hobi ?> </td>
				<td> <?= $p->bobot_hobi ?> </td>
        <td>
          <div class="dropdown">
             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
               <i class="bx bx-dots-vertical-rounded"></i>
             </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editdata<?= $p->id_hobi ?>">
                  <i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" onclick="deleteConfirm('<?php echo site_url('admin/Bobot_Hobi/delete/'.$p->id_hobi) ?>')" href="#!">
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
    <form action="<?= site_url('admin/Bobot_Hobi') ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="hobi" class="form-label">Hobi</label>
            <input type="text" name="hobi" class="form-control <?= form_error('hobi') ? 'is-invalid':'' ?>" placeholder="Hobi" />
            <div class="invalid-feedback">
				      <?= form_error('hobi') ?>
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
<div class="modal fade" id="editdata<?= $p->id_hobi ?>" tabindex="-1" aria-hidden="true">
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
    <form action="<?= site_url('admin/Bobot_Hobi/edit') ?>" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
        <input type="hidden" name="id_hobi" value="<?= $p->id_hobi?>" />
        <div class="row">
          <div class="col mb-3">
            <label for="hobi" class="form-label">Usia</label>
            <input type="text" name="hobi" class="form-control <?= form_error('hobi') ? 'is-invalid':'' ?>" placeholder="hobi" value="<?= $p->hobi?>"/>
            <div class="invalid-feedback">
				      <?= form_error('hobi') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" step="any" name="bobot" class="form-control <?= form_error('bobot') ? 'is-invalid':'' ?>" placeholder="Bobot" value="<?= $p->bobot_hobi?>"/>
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