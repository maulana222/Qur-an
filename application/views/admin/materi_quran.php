<?php $this->load->view('templates/header')?>
<?php $this->load->view('templates/sidebar')?>
<div class="px-3 py-1">
   <h1 id="test">Data </h1>

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

    <?php $i = 1 ;
        foreach ($records as $record) { ?>
      <tr class="pf">

        <td><?= $i ?></td>
        <td><?= $record['judul_materi'] ?></td>
        <td><?= $record['surah'] ?></td>
        <td><?= $record['nomor_ayat'] ?></td>
        <td><img src="<?= base_url('assets/upload/').$record['gambar']?>" style="" width="150px" ></td>
        <td id="dataMateri"><?= $record['isi_materi'] ?></td>
        <td>
          <a href="<?= site_url('Admin/update/'.$record['id_materi']); ?>">Edit</a> ||
          <a href="<?= site_url('Admin/delete/'.$record['id_materi']); ?>">Delete</a>
        </td>
      </tr>
    <?php } $i++;?>
  </table>
  <a  class ="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata" href="<?= site_url('Admin/create'); ?>">Add New</a>
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
                  <input type="text" name="ayat" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
              </div>
              <div class="col-md-6">
                  <label for="inputCity" class="form-label">gambar</label>
                  <input type="file" name="gambar" class="form-control" id="inputCity">
              </div>
              <div class="col-md-12">
                  <label for="exampleFormControlTextarea1" class="form-label">isi materi</label>
                  <textarea class="form-control" id="exampleFormControlTextarea1" name="materi" rows="3"></textarea>
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
 
 <script>
  var modalId = document.getElementById('modalId');
 
  modalId.addEventListener('show.bs.modal', function (event) {
      // Button that triggered the modal
      let button = event.relatedTarget;
      // Extract info from data-bs-* attributes
      let recipient = button.getAttribute('data-bs-whatever');
 
    // Use above variables to manipulate the DOM
  });
   function displaySelectedSurah() {
      var select = document.getElementById("surahList");
      var surahNumber = select.value;
      var surahName = select.options[select.selectedIndex].text;
      
      var surahInfo = document.getElementById("surahInfo");
      surahInfo.innerHTML = "Surah yang dipilih: " + surahName + " (Nomor " + surahNumber + ")";
    }
 </script>
 
<?php $this->load->view('templates/footer_admin');?>
