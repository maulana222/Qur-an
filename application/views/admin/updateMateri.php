<?php $this->load->view('templates/header')?>

<!-- form edit data -->
<div class="modal-dialog modal-lg postion-absolute" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="modalTitleId">form edit data</h5>
            <span class="d-flex justify-content-end ">
               <?= anchor('Admin/materi_Alquran', '<div class="btn btn-sm bg-primary px-3 py-2 text-white"><i class="fa-solid fa-chevron-left"> </i>    Kembali </div>'); ?>
            </span>
          </div>
      <div class="modal-body">
        <div class="container-fluid">
            <form class="row g-3" method="post" action="<?= site_url('Admin/update/'.$record['id_materi'])?>" enctype="multipart/form-data">
              <div class="col-md-6">
                  <label for="inputEmail4" class="form-label">Judul</label>
                  <input type="text" value="<?= $record['judul_materi']; ?>" name="judul" class="form-control" id="inputEmail4">
              </div>
              <div class="col-6">
                  <select id="surahList" name="surahList" onchange="displaySelectedSurah()">
                    <option disabled>surah</option>
                    <?php foreach ($surahNames as $surahName) { ?>
                        <option value="<?= $surahName['id_surah']; ?>" <?php if ($surahName['id_surah'] == $record['id_surah']) echo 'selected'; ?>>
                            <?= $surahName['surah']; ?>
                        </option>
                    <?php } ?>
                </select>
              </div>
              <div class="col-6">
                  <label for="inputAddress2" class="form-label">ayat</label>
                  <input type="text" name="ayat" value="<?= $record['nomor_ayat']; ?>" class="form-control" id="inputAddress2" placeholder="masukan ayat">
              </div>
              <div class="col-md-6">
                <input type="file" name="gambar" class="form-control" value="this">
                <?php if (!empty($record['gambar'])) { ?>
                    <img src="<?= base_url('assets/upload/'.$record['gambar']); ?>" alt="Gambar saat ini" width="100%">
                <?php } ?>
              </div>
              <div class="col-md-12">
                  <label for="textisi" class="form-label">isi materi</label>
                  <textarea class="form-control" value="" id="textisi" name="materi" rows="3"><?= $record['isi_materi']; ?></textarea>
              </div>
              <div class="col-12">
                  <button type="submit" class="btn btn-primary">create</button>
              </div>
          </form>
<!-- end form edit data -->
        </div>
      </div>
    </div>
  </div>


<?php $this->load->view('templates/footer_admin');?>
