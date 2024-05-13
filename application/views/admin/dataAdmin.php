<?php $this->load->view('templates/header')?>
<?php $this->load->view('templates/sidebar')?>
<div class="px-3 py-1">
   <h1 id="test">Data admin</h1>
  <table class="table table-bordered border-dark table-striped w-100 text-center">
    <tr>  
      <th>No</th>
      <th>Nama</th>
      <th>Email</th>
      <th>Password</th>
      <th>status</th>
      <th>aksi</th>
    </tr>
    <?php $i = 1;
        foreach ($admin as $admins) { ?>
      <tr class="pf fs-7">
        <td><?= $i ?></td>
        <td><?= $admins['username'] ?></td>
        <td><?= $admins['email'] ?></td>
        <td><?= $admins['password'] ?></td>
        <td><?= $admins['role']?></td>
        <td>
          <a href="<?= site_url('Admin/update/'.$admins['user_id']); ?>">Edit</a> ||
          <a href=""data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
        </td>
      </tr>
    <?php  $i++; }?>
  </table>
  <a  class ="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata" href="<?= site_url('Admin/create'); ?>">Add New</a>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">hapus</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
       apakah kamu yakin ingin menghapus Pengguna ini 
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">
          <a href="<?= site_url('Admin/delate/'.$admins['user_id']).'/admin'; ?>" class="text-light">Delete</a>
        </button>
      </div>
    </div>
  </div>
</div>

 <!-- form  untuk tambah data -->
 <div class="modal fade" id="tambahdata" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">form  tambahdata</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form class="row g-3" method="post" action="create/" enctype="multipart/form-data">
                <input type="hidden" name="table" value="admin">
              <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">nama</label>
                  <input type="text" name="username" class="form-control" id="inputEmail4">
              </div>
              <div class="col-6">
                  <label for="inputEmail4" class="form-label">email</label>
                  <input type="text" name="email" class="form-control" id="inputEmail4">
              </div>
              </div>
              <div class="col-6">
                  <label for="inputAddress2" class="form-label">password</label>
                  <input type="password" name="password" class="form-control" id="inputAddress2" >
                </div>
                <div class="col-md-12">
                    <label for="exampleFormControlTextarea1" class="form-label">status</label>
                    <input type="text" name="status" class="form-control" id="inputAddress2" >
               </div>
              <div class="col-12">
                  <button type="submit" class="btn btn-primary">create</button>
              </div>
          </form>
<!-- end form tambah data -->
        </div>
      </div>
    </div>
  </div>
 </div>
 
 
<?php $this->load->view('templates/footer_admin');?>
