    <div class="col-md-8">
        <form action="<?=base_url('user/simpan')?>" method="POST">
        <!-- mengarahkan ke controller user dari function  -->
          <div class="card mb-4">
            <h5 class="card-header">Form Tambah User</h5>
            <div class="card-body">
              <div class="mb-3">
                <label for="nama" class="form-label">Nama</label>
                <input type="text" class="form-control" name="nama" id="nama" placeholder="Masukan Nama Anda...">
              </div>       
              <div class="mb-3">
                <label for="username" class="form-label">Username</label>
                <input type="text" class="form-control" name="username" id="username" placeholder="Masukan Username Anda...">
              </div>       
              <div class="mb-3">
                <label for="password" class="form-label">Password</label>
                <input type="password" class="form-control" name="password" id="password" placeholder="Masukan Password Anda...">
              </div>       
              <div class="mb-3">
                <label for="level" class="form-label">Level</label>
                <select class="form-select" name="level" id="level" aria-label="Default select example">
                  <option selected="">Pilih Level</option>
                  <option value="User">User</option>
                  <option value="Admin">Admin</option>
                </select>
              </div>
              <div>
              <button type="submit" class="btn btn-primary mb-4">+ Simpan</button>
              </div>
            </div>
          </div>
          </form>
        </div>
    </div>
           
