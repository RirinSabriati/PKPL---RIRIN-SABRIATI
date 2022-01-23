<script src="https://cdn.ckeditor.com/4.16.1/standard/ckeditor.js"></script>
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
          <?php

          if (isset($error_upload)) {
            echo '<div class="alert alert-danger alert-dismissible"> <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times; </button>
          <h5><i class="icon fas fa-info"></i>' . $error_upload . '</h5></div>';
          }

          ?>
          <div class="card card-primary">
            <div class="card-header">
              <h3 class="card-title"><?= $title ?></h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <?= form_open_multipart('pengumuman/add') ?>
            <div class="card-body">
              <div class="form-group">
                <label for="judul">Judul</label>
                <input type="text" class="form-control" id="judul" name="judul" placeholder="Judul">
              </div>
              <div class="form-group">
                <label for="isi">Isi</label>
                <!-- <textarea name="isi" id="isi" class="form-control" placeholder="Isi" cols="30" rows="10"></textarea> -->
                <textarea name="isi"></textarea>

              </div>


              <div class="form-group">
                <label for="foto">Pilih gambar</label>
                <div class="input-group">
                  <input type="file" class="form-control" id="foto" name="gambar">
                </div>
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

<script>
  CKEDITOR.replace('isi');
</script>