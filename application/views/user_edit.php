<?php foreach($user as $a) { ?>
<div class="col-md-8">
        <form action="<?=base_url('user/update')?>" method="POST">
        <!-- mengarahkan ke controller user dari function  -->
          <div class="card mb-4">
            <h5 class="card-header">Form Edit User</h5>
            <div class="card-body">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" value="<?=$a['nama'];?>" >
              </div>       
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" value="<?=$a['username']?>" readonly >
              </div>            
              <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" id="level" aria-label="Default select example">
                  <option selected="">Pilih Level</option>
                  <option value="User" <?php if($a['level']=='User'){echo "selected";}?>>User</option>
                  <option value="Admin" <?php if($a['level']=='Admin'){echo "selected";}?>>Admin</option>
                </select>
              </div>
              <div>
              <input type="hidden" name="id_user" value="<?=$a['id_user']?>">
              <button type="submit" class="btn btn-primary mb-4">+ Simpan</button>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>
<?php } ?>   
