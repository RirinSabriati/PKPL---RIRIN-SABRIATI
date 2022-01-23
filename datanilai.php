<section id="maps">
    <div class="container pt-4">
      <div class="row">
        <div class="col">
          <h1 class="text-center team">Nilai</h1>
          <hr>
           <a href="<?= base_url('nilai/pdf') ?>" class="btn btn-warning"> <i class="fa fa-file-pdf-o"></i> Cetak Nilai</a>  <br> <br>
          <!-- table  -->
        <table class="table table-hover">       
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">NIM</th>
              <th scope="col">NILAI</th>
             
            
            </tr>
          </thead>
          <tbody>
            <?php $no=1; ?>
            <?php foreach ($wilayah as $data): ?>
            <tr>
              <th scope="row"><?= $no++ ?></th>
              <td><?= $data->nim; ?></td>
              <td><?= $data->nilai; ?></td>
              
            </tr>
            <?php endforeach;?>
          </tbody>
        </table>
        <!-- akhir table -->
  </div>
</div>
</div>
</section>