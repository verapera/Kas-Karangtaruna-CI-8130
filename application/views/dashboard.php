<?php echo $this->session->flashdata('alert',true);
  $pemasukan = $this->Transaksi_model->pemasukan();
  $pengeluaran = $this->Transaksi_model->pengeluaran();
  $saldo_akhir = $pemasukan - $pengeluaran;

?>
<?php
    $pemasukan = $this->Transaksi_model->pemasukan();
    $pengeluaran = $this->Transaksi_model->pengeluaran();
    $saldo_akhir = $pemasukan - $pengeluaran;
    // hari ini
    $pemasukan_hari_ini = $this->Transaksi_model->pemasukan_hari_ini();
    if($pemasukan_hari_ini == ''){
      $pemasukan_hari_ini = "Belum ada pemasukan";
    }else{
      $pemasukan_hari_ini = rupiah($this->Transaksi_model->pemasukan_hari_ini());
    }

    $pengeluaran_hari_ini = $this->Transaksi_model->pengeluaran_hari_ini();
    if($pengeluaran_hari_ini == ''){
      $pengeluaran_hari_ini = "Belum ada pengeluaran";
    }else{
      $pengeluaran_hari_ini = $this->Transaksi_model->pengeluaran_hari_ini();
    }
    // bulan ini
    $pemasukan_bulan_ini = $this->Transaksi_model->pemasukan_bulan_ini();
    if($pemasukan_bulan_ini == ''){
      $pemasukan_bulan_ini = "Belum ada pemasukan";
    }else{
      $pemasukan_bulan_ini = rupiah($this->Transaksi_model->pemasukan_bulan_ini());
    }

    $pengeluaran_bulan_ini = $this->Transaksi_model->pengeluaran_bulan_ini();
    if($pengeluaran_bulan_ini == ''){
      $pengeluaran_bulan_ini = "Belum ada pengeluaran";
    }else{
      $pengeluaran_bulan_ini = $this->Transaksi_model->pengeluaran_bulan_ini();
    }
?>
<!-- Button trigger modal -->
<button type="button" class="btn btn-danger mb-2" data-bs-toggle="modal" data-bs-target="#exampleModal">
<i class="bx bx-printer"></i>Laporan</button>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?=base_url('home/laporan')?>" method="get" target="_blank">
            <div class="modal-body">
                <!-- mengarahkan ke controller user dari function  -->
                <div class="card mb-4">
                    <h5 class="card-header">Form Laporan</h5>
                    <div class="card-body">    
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Awal</label>
                        <input type="date" class="form-control" name="tanggal1" id="tanggal" placeholder="Masukan tanggal Anda...">
                    </div>       
                    <div class="mb-3">
                        <label for="tanggal" class="form-label">Tanggal Akhir</label>
                        <input type="date" class="form-control" name="tanggal2" id="tanggal" placeholder="Masukan tanggal Anda...">
                    </div>       
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-danger">Simpan</button>
            </div>
            </form>
            </div>
        </div>
        </div>


<div class="row mt-3">
  <div class="col-lg-12 mb-4 order-0">
    <div class="card">
      <div class="d-flex align-items-end row">
        <div class="col-sm-7">
          <div class="card-body">
            <h5 class="card-title text-primary">Congratulations, <?=$this->session->userdata('nama')?>! 🎉</h5>
            <p class="mb-4">
             Sekarang anda telah bergabung di akun <span class="fw-bold"><?=$this->session->userdata('level')?></span> 
            </p>            
          </div>
        </div>
        <div class="col-sm-5 text-center text-sm-left">
          <div class="card-body pb-0 px-0 px-md-4">
            <img
              src="<?=base_url('assets/sneat')?>/assets/img/illustrations/man-with-laptop-light.png"
              height="140"
              alt="View Badge User"
              data-app-dark-img="illustrations/man-with-laptop-dark.png"
              data-app-light-img="illustrations/man-with-laptop-light.png"
            />
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- Pemasukan -->

<!-- Button trigger modal -->

<!-- <button data-toggle="modal" data-target="ModalPrint" class="btn btn-danger pull-right-mb-5"><i class="fa fa-print">gfbzdvx</i></button> -->

<h5 class="card-title text-center text-primary">- Pemasukan - </h5>
<div class="row">
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/sneat')?>/assets/img/icons/unicons/chart-success.png" alt="chart success" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block">Hari ini:</span>
          <h4 class="card-title mb-2"><?= $pemasukan_hari_ini ?></h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/sneat')?>/assets/img/icons/unicons/chart-success.png" alt="Credit Card" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block">Bulan ini:</span>
          <h4 class="card-title text-nowrap mb-1"><?= $pemasukan_bulan_ini ?></h4>
        </div>
      </div>
    </div>
    <div class="col-lg-4 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/sneat')?>/assets/img/icons/unicons/wallet-info.png" alt="Credit Card" class="rounded">
            </div>
          </div>
          <small class="text-primary fw-semibold"><i class="bx bx-up-arrow-alt"></i>Total Pemasukan:</small>
          <h4 class="card-title text-nowrap mb-1 mt-1"><?= rupiah($this->Transaksi_model->pemasukan())?></h4>
        </div>
      </div>
    </div>
  </div>
  <!-- pengeluaran -->
  <h5 class="card-title text-center text-primary">- Pengeluaran - </h5>
<div class="row">
    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/sneat')?>/assets/img/icons/unicons/chart.png" alt="chart success" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block">Hari ini:</span>
          <h5 class="card-title mb-2"><?= $pengeluaran_hari_ini ?></h5>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/sneat')?>/assets/img/icons/unicons/chart.png" alt="Credit Card" class="rounded">
            </div>
          </div>
          <span class="fw-semibold d-block">Bulan ini:</span>
          <h5 class="card-title text-nowrap mb-1"><?=$pengeluaran_bulan_ini ?></h5>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">
            <div class="avatar flex-shrink-0">
              <img src="<?=base_url('assets/sneat')?>/assets/img/icons/unicons/cc-warning.png" alt="Credit Card" class="rounded">
            </div>
          </div>
          <small class="text-danger fw-semibold"><i class="bx bx-down-arrow-alt"></i>Total Pengeluaran:</small>
          <h4 class="card-title text-nowrap mb-1 mt-1"><?= rupiah($this->Transaksi_model->pengeluaran())?></h4>
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-12 col-6 mb-4">
      <div class="card">
        <div class="card-body">
          <div class="card-title d-flex align-items-start justify-content-between">

            <span class="badge bg-label-primary p-2"><i class="bx bx-dollar text-primary"></i></span>
          </div>
          <small class="text-info fw-semibold"><i class="bx bx-up-arrow-alt"></i>Saldo Akhir:</small>
          <h4 class="card-title text-nowrap mb-1 mt-1"><?=rupiah($saldo_akhir);?></h4>
        </div>
      </div>
    </div>
  </div>

  




           
