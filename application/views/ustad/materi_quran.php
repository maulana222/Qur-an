<?php $this->load->view('templates/header')?>
<?php $this->load->view('templates/sidebar_for_ustad')?>
<div class="px-3 py-1">
   <h1 id="test">Data <?= $this->session->userdata('username')?></h1>
  <table class="table table-bordered border-dark table-striped w-100 text-center">
    <tr>  
      <th>No</th>
      <th>judul</th>
      <th>surah</th>
      <th>ayat</th>
      <th>gambar</th>
      <th>isi</th>
      <th>aksi</th>
    </tr>

    <?php $i = 1;
        foreach ($records as $record) { ?>
      <tr class="pf fs-7">
        <td><?= $i ?></td>
        <td><?= $record['judul_materi'] ?></td>
        <td><?= $record['surah'] ?></td>
        <td><?= $record['nomor_ayat'] ?></td>
        <td><img src="<?= base_url('assets/upload/').$record['gambar']?>" style="" width="150px" ></td>
        <td id="dataMateri" width="400"><?= $record['isi_materi'] ?></td>
        <td>
          <a href="<?= site_url('Admin/update/'.$record['id_materi']); ?>">Edit</a> ||
          <a href="<?= site_url('Admin/delete/'.$record['id_materi']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
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
       apakah kamu yakin ingin menghapus materi quran ini
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">
          <a href="<?= site_url('Admin/delate/'.$record['id_materi']) .'/materi_quran'; ?>" class="text-light">Delete</a>
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
              <input type="hidden" name="table" value="materi_quran">
              <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Judul</label>
                  <input type="text" name="judul" class="form-control" id="inputEmail4">
              </div>
              <div class="col-6">
                  <select id="surahList" name="surahList" onchange="displaySelectedSurah()">
                      <option value="" disabled selected>Pilih Surah</option>
                      <?php foreach ($surahNames as $surahName) { ?>
                          <option value="<?php echo $surahName['id_surah']; ?>"><?php echo $surahName['surah']; ?></option>
                      <?php } ?>
                  </select>
              </div>
              <div class="col-6">
                  <label for="inputAddress2" class="form-label">ayat</label>
                  <input type="text" name="ayat" class="form-control" id="inputAddress2" >
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">gambar</label>
                <input type="file" name="gambar" class="form-control" id="inputCity">
              </div>
              <div class="col-12">
                  <label for="deks" class="form-label">deskripsi</label>
                  <input type="text" name="deskripsi" class="form-control" id="deks" >
              </div>
                <div class="col-md-12">
                    <label for="exampleFormControlTextarea1" class="form-label">isi materi</label>
                    <textarea class="form-control" id="exampleFormControlTextarea1" name="materi" rows="10"></textarea>
                </div>
                <input type="hidden" name="user" value="<?= $this->session->userdata('username')?>" class="form-control" id="inputCity">
              <div class="col-12">
                  <button  type="submit" class="btn btn-primary">create</button>
              </div>
          </form>
<!-- end form tambah data -->
        </div>
      </div>
    </div>
  </div>
 </div>
 
 
<?php $this->load->view('templates/footer_admin');?>
