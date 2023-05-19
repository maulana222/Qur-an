<?php $this->load->view('templates/header.php') ?>
<?php $this->load->view('templates/main.php') ?>

<?php  if(!empty($result)) :?> 
    

              <?php foreach($result as $srt) : ?>
            <div class="container-fluid gradient3 pt-1 pb-5">
              <div class="container mt-4 ">
               <span class="d-flex justify-content-end ">
    <?= anchor('quran', '<div class="btn btn-sm btn-primary px-3 py-2"><i class="fa-solid fa-chevron-left"> </i>    Kembali </div>'); ?>
  </span>
                <div class="col-sm-4 mb-3" >
                <a href="<?= base_url('Quran/Surah/'). $srt['id_surah']; ?>" class="text-decoration-none text-dark">
                  <div class="card mt-3">
                    <div class="card-body d-flex py-2 px-3 justify-content-start align-items-center">
                      <div class="surahNumber"><span class="number"><?= $srt['id_surah'] ?></span></div>
                        <div class="contentSurah fw-bold">
                          <h3 class="fs-5 mt-2"><?= $srt['surah']?></h3>
                          <p class="jenis_surah mb-1" ><?= $srt['arti_surah']?></p>
                      </div>
                    </div>
                  </div>
                </a>
            </div>
            </div>
          </div>
          <?php endforeach;?>
       
        <?php else : 
           echo "<script> alert('data tidak di temukan')</script>"
          ?>
                <h4>data tidak di temukan</h4>
        <?php endif; ?>
