    <?php echo $this->session->flashdata('alert',true);?>
    <a href="<?= base_url('user/tambah')?>">
        <button type="button" class="btn btn-outline-primary mb-4">
        <span class="tf-icons bx bx-task"></span>&nbsp; Tambah user
        </button>
    </a>
    <div class="card">
        <h5 class="card-header">Data User</h5>
        <div class="card-body">
          <div class="table-responsive text-nowrap">
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th >No</th>
                  <th class="text-center">Username</th>
                  <th class="text-center">Nama</th>
                  <th class="text-center">Level</th>
                  <th class="text-center">Aksi</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=1; foreach($hasil as $a) { ?>
                <tr>
                  <td>
                    <i class="fab fa-angular fa-lg text-danger me-3"></i><strong><?=$no;?></strong>
                  </td>
                  <td><?=$a['username'];?></td>
                  <td><?=$a['nama'];?></td>
                  <td class="text-center"><span class="badge bg-label-primary me-1"><?=$a['level'];?></span></td>
                  <td  class="text-center">
                    <div class="dropdown">
                      <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                        <i class="bx bx-dots-vertical-rounded"></i>
                      </button>
                      <div class="dropdown-menu">
                        <a  class="dropdown-item" href="<?= base_url('user/edit/'.$a['id_user']);?>"><i class="bx bx-edit-alt me-1"></i> Edit</a>
                        <a onClick="return confirm('Apakah anda yakin ingin menghapus data ini?')" class="dropdown-item" href="<?= base_url('user/hapus/'.$a['id_user']);?>"><i class="bx bx-trash me-1"></i> Delete</a>
                      </div>
                    </div>
                  </td>
                </tr>
                <?php $no++; } ?>
                
                
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
           
