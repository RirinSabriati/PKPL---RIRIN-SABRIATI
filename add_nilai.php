<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark"><?= $title ?></h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active"><?= $title ?></li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
      <div class="row">
        <div class="col-md-12">
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open('nilai/prosesadd') ?>
            <div class="card-body">
              <div class="form-group">
                <label for="judul">NIM</label>
                <select name="nim" class="form-control">
                  <option value="">--Pilih NIM--</option>
                  <?php foreach ($p as $key => $value) {  ?>
                    <option value="<?= $value->nim ?>"><?= $value->nim ?></option>
                  <?php } ?>
                </select>
              </div>
              <div class="form-group">
                <label>Nilai</label>
                <input type="number" class="form-control" name="nilai">
              </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
              <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            <?= form_close() ?>
          </div>
        </div>
      </div>
      <!-- /.row -->
      <!-- Main row -->
      <div class="row">

      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->