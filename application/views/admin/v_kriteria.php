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
          <th>Kriteria</th>
          <th>Type</th>
          <th>Bobot Kriteria</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody class="table-border-bottom-0">
      <?php $no=1; foreach ($tampil as $p): ?>
				<tr>
				<td> <?= $no++; ?> </td>
				<td> <?= $p->nama_kriteria ?> </td>
				<td> <span class="badge <?= ($p->kriteria_type == "COST") ? 'bg-label-primary' : 'bg-label-warning';?>  me-1"><?= $p->kriteria_type ?></span> </td>
				<td> <?= $p->bobot ?> </td>
        <td>
          <div class="dropdown">
             <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
               <i class="bx bx-dots-vertical-rounded"></i>
             </button>
              <div class="dropdown-menu">
                <a class="dropdown-item" data-bs-toggle="modal" data-bs-target="#editdata<?= $p->id_kriteria ?>">
                  <i class="bx bx-edit-alt me-1"></i> Edit</a>
                <a class="dropdown-item" onclick="deleteConfirm('<?php echo site_url('admin/Kriteria/delete/'.$p->id_kriteria) ?>')" href="#!">
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
    <form action="<?= site_url('admin/Kriteria') ?>" method="post" enctype="multipart/form-data" >
      <div class="modal-body">
        <div class="row">
          <div class="col mb-3">
            <label for="nama_kriteria" class="form-label">Kriteria</label>
            <input type="text" name="nama_kriteria" class="form-control <?= form_error('nama_kriteria') ? 'is-invalid':'' ?>" placeholder="Kriteria" />
            <div class="invalid-feedback">
				      <?= form_error('nama_kriteria') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="kriteria_type" class="form-label">Type Kriteria</label>
            <select class="form-select <?= form_error('kriteria_type') ? 'is-invalid':'' ?>" name="kriteria_type" aria-label="Default select example">
              <option selected>Pilih...</option>
              <option value="COST">COST</option>
              <option value="BENEFIT">BENEFIT</option>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('kriteria_type') ?>
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
<div class="modal fade" id="editdata<?= $p->id_kriteria ?>" tabindex="-1" aria-hidden="true">
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
    <form action="<?= site_url('admin/Kriteria/edit') ?>" method="post" enctype="multipart/form-data" >
    <div class="modal-body">
        <input type="hidden" name="id_kriteria" value="<?= $p->id_kriteria?>" />
        <div class="row">
          <div class="col mb-3">
            <label for="nama_kriteria" class="form-label">Kriteria</label>
            <input type="text" name="nama_kriteria" class="form-control <?= form_error('nama_kriteria') ? 'is-invalid':'' ?>" placeholder="Kriteria" value="<?= $p->nama_kriteria?>"/>
            <div class="invalid-feedback">
				      <?= form_error('nama_kriteria') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="mb-3">
            <label for="kriteria_type" class="form-label">Type Kriteria</label>
            <select class="form-select <?= form_error('kriteria_type') ? 'is-invalid':'' ?>" name="kriteria_type" aria-label="Default select example">
              <option selected>Pilih...</option>
              <option value="COST" <?php if ($p->kriteria_type == "COST"){echo "selected";} ?>>COST</option>
              <option value="BENEFIT" <?php if ($p->kriteria_type == "BENEFIT"){echo "selected";} ?>>BENEFIT</option>
            </select>
            <div class="invalid-feedback">
				      <?= form_error('kriteria_type') ?>
			      </div>
          </div>
        </div>
        <div class="row">
          <div class="col mb-3">
            <label for="bobot" class="form-label">Bobot</label>
            <input type="number" step="any" name="bobot" class="form-control <?= form_error('bobot') ? 'is-invalid':'' ?>" placeholder="Bobot" value="<?= $p->bobot?>"/>
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