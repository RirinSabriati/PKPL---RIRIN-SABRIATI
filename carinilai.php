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
          <a href="<?= base_url('nilai/add') ?>" class="btn btn-primary">Tambah Nilai</a> 
           <a href="<?= base_url('nilai/cetak') ?>" class="btn btn-primary">Cetak Nilai</a> <br> <br>

          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Nilai TBQ Mahasiswa</h3>

              <div class="card-tools">
                <div class="input-group input-group-sm" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                  <div class="input-group-append">
                    <button type="submit" class="btn btn-default"><i class="fas fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.card-header -->
             <?php if (!empty($keyword)) { ?>
                <p style="color:orange"><b>Menampilkan data dengan kata kunci : "<?= $keyword; ?>"</b></p>
              <?php } ?>
            <div class="card-body table-responsive p-0">
              <table class="table table-hover text-nowrap">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>NIM</th>
                    <th>NILAI</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  <?php $i = 1;  ?>
                  <?php foreach ($n as $sm) { ?>
                    <tr>
                      <td><?= $i++; ?></td>
                      <td><?= $sm->nim; ?></td>
                      <td><?= $sm->nilai; ?></td>
                      <td width="200px">
                        <button class="btn btn-warning"><i class="fas fa-pencil-alt"></i></button>
                        <a href="<?= base_url('Nilai/hapusNilai/'.$sm->id_nilai) ?>"class="btn btn-danger"><i class="fa fa-trash"></i></a>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>

        </div>
      </div>
  </section>
  <!-- /.content -->
</div>
<!-- /.content-wrapper -->