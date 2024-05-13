<?php $this->load->view('templates/header')?>
<?php $this->load->view('templates/sidebar')?>
<style>
  .dropbtn {
  background-color: rgb(46, 101, 184);;
  color: white;
  padding: 7px 15px;
  border-radius: 5px;
  font-size: 16px;
  border: none;

}

.dropdown {
  position: relative;
  display: inline-block;
}
.dropdown-content a {
  text-decoration:none;
  color: white;
}
.dropdown-content {
  display: none;
  position: absolute;
   background-color: rgb(100, 96, 96);
  min-width: 140px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

.dropdown-content div {
  color: black;
  padding: 8px 16px;
  text-decoration: none;
  display: block;
}


.dropdown:hover .dropdown-content {display: block;}


</style>
<div class="px-3 py-1 ">
  <div class="header d-flex justify-content-between mx-4">
    <h3>Mydata</h3>
    <div class="">
      <a class ="btn btn-primary mb-2" style="font-weight: bold;" data-bs-toggle="modal" data-bs-target="#tambahkat">Tambah kategori +</a>
        <div class="dropdown">
          <button class="dropbtn">Daftar Kategory  <i class="fa-solid fa-sort-down"></i></button>
          <div class="dropdown-content">
              <?php foreach ($categoris as $categori) { ?>
              <div href=""  style="background-color: white !important;" value="<?php echo $categori['id_kategory']; ?>"><?php echo $categori['name_category']; ?>
                   <a href="<?= site_url('Admin/deleteCategory/'.$categori['id_kategory']); ?>" class="text-danger">delate</a>
              </div>
              <?php } ?>
          </div>
        </div>
    </div>
  </div>
  <table class="table table-bordered border-dark table-striped w-100 text-center">
    <tr>  
      <th>No</th>
      <th>judul</th>
      <th>Kategori</th>
      <th>surah</th>
      <th>ayat</th>
      <th>gambar</th>
      <th>isi</th>
      <th>aksi</th>
    </tr>

    <?php
	$i = 1;
	foreach ($records as $record) {
		// Generate a unique ID for each row
		$rowId = 'row_' . $i;
	?>

<tr class="fs-7">
  <td><?= $i ?></td>
  <td><?= $record['judul_materi'] ?></td>
  <td><?= $record['name_category'] ?></td>
  <td><?= $record['surah'] ?></td>
  <td><?= $record['nomor_ayat'] ?></td>
  <td><img src="<?= base_url('assets/upload/') . $record['image'] ?>" style="" width="150px"></td>
  <td width="400" id="<?= $rowId ?>"><?= $record['content'] ?></td>
  <td>
    <a href="<?= site_url('Admin/update/' . $record['id_materi']); ?>">Edit</a> ||
    <a href="<?= site_url('Admin/delete/' . $record['id_materi']); ?>" data-bs-toggle="modal" data-bs-target="#exampleModal">Delete</a>
  </td>
</tr>

<?php
  $i++;
}
?>

<script>
// Loop through each row and truncate the text if necessary
<?php for ($j = 1; $j <= $i; $j++) { ?>
  var rowId = 'row_<?= $j ?>';
  var teks = document.getElementById(rowId).innerText;
  var jumlahKarakter = teks.length;

  if (jumlahKarakter > 80) {
    
    var potonganTeks = teks.slice(0, 80) + "...";
    document.getElementById(rowId).innerText = potonganTeks;
  }
<?php } ?>
</script>
  </table>
  <a  class ="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahdata">Add New</a>
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
          <a href="<?= site_url('Admin/delate/'.$record['id_materi']) .'/materi_islam'; ?>" class="text-light">Delete</a>
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
              <div class="col-6 mt-5">
                  <select class="w-100 px-2 py-1" id="kategori" name="kategori" onchange="displaySelectedSurah()">
                      <option value="" disabled selected>kategori Materi</option>
                      <?php foreach ($categoris as $categori) { ?>
                          <option value="<?php echo $categori['id_kategory']; ?>"><?php echo $categori['name_category']; ?></option>
                      <?php } ?>
                  </select>
              </div>
              <div class="col-3 mt-5">
                  <select class="w-100 px-2 py-1" id="surahList" name="surahList" onchange="displaySelectedSurah()">
                      <option value="" disabled selected>Pilih Surah</option>
                      <?php foreach ($surahNames as $surahName) { ?>
                          <option value="<?php echo $surahName['id_surah']; ?>"><?php echo $surahName['surah']; ?></option>
                      <?php } ?>
                  </select>
              </div>
              <div class="col-3">
                <label for="inputAddress2" class="form-label">ayat</label>
                <input type="text" name="ayat" class="form-control" id="inputAddress2" >
              </div>
              <div class="col-md-6">
                <label for="inputCity" class="form-label">Upload gambar</label>
                <input type="file" name="gambar" class="form-control" id="inputCity">
              </div>
              <div class="col-md-12">
                  <label for="materi" class="form-label">isi materi</label>
                  <textarea class="form-control" id="materi" name="materi" rows="10"></textarea>
              </div>
               <input type="hidden" name="user" value="master" class="form-control" id="materi">
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
 <div class="modal fade" id="tambahkat" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Tambah kategori</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
               <form class="row g-3" method="post" action="<?= site_url('Admin/create')?>" enctype="multipart/form-data">

              <input type="text" name="table" value="kategori">
              <label for="kategori" class="form-label">kategori</label>
              <input type="text" name="kategori" class="form-control" id="kategori">
      </div>
      <div class="modal-footer">
               <button type="submit" class="btn btn-primary">create</button>
         </form>
      </div>
    </div>
  </div>
</div>
 <script>
// Loop through each row and truncate the text if necessary
<?php for ($j = 1; $j <= $i; $j++) { ?>
  var rowId = 'row_<?= $j ?>';
  var teks = document.getElementById(rowId).innerText;
  var jumlahKarakter = teks.length;

  if (jumlahKarakter > 80) {
    var potonganTeks = teks.slice(0, 80) + "...";
    document.getElementById(rowId).innerText = potonganTeks;
  }
<?php } ?>
</script>
<?php $this->load->view('templates/footer_admin');?>
