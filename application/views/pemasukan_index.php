<?php echo $this->session->flashdata('alert',true);
  function rupiah($angka){
    $hasil = "Rp " . number_format($angka,0,',','.' );
    return $hasil;
}
?>
      <!-- modal -->
      <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Tambah Pemasukan
        </button>

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url('pemasukan/simpan')?>" method="POST">
            <div class="modal-body">
                <!-- mengarahkan ke controller user dari function  -->
                <div class="card mb-4">
                    <h5 class="card-header">Form Tambah Pemasukan</h5>
                    <div class="card-body">
                    <div class="mb-3">
                        <label for="keterangan" class="form-label">Keterangan</label>
                        <input type="text" class="form-control" name="keterangan" id="keterangan" placeholder="Masukan keterangan...">
                    </div>       
                    <div class="mb-3">
                        <label for="nominal" class="form-label">Nominal</label>
                        <input type="number" class="form-control" name="nominal" id="nominal" placeholder="Masukan nominal...">
                    </div>       
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" placeholder="Masukan tanggal Anda...">
                    </div>       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Simpan</button>
            </div>
            </form>
            </div>
        </div>
        </div>
    <div class="card">
        <h5 class="card-header">Data Pemasukan</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th >No</th>
                  <th class="text-center">Tanggal</th>
                  <th class="text-center">Keterangan</th>
                  <?php if($this->session->userdata('level')=='Admin') { ?>
                     <th class="text-center">Username</th>
                  <?php } ?>
                  <th class="text-center">Nominal</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($pemasukan as $a) { ?>
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?=$no;?></strong>
                  </td>
                  <td><?=$a['tanggal'];?></td>
                  <td><?=$a['keterangan'];?></td>
                  <?php if($this->session->userdata('level')=='Admin') { ?>
                     <td><?=$a['username'];?></td>
                  <?php } ?>
                  <td><?=rupiah($a['nominal']);?></td>
                  <td  class="text-center">
                    <a onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" href="<?= base_url('pemasukan/hapus/'.$a['id_transaksi'])?>"><i class="bx bx-trash me-1"></i> </a>
                  </td>
                </tr>
                <?php $no++; } ?>
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
           
