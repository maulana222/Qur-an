<?php $this->load->view('templates/header.php') ?>
<?php $this->load->view('templates/navbar.php') ?>
<?php $this->load->view('templates/main.php') ?>

<?php  if(!empty($result)) :?> 
    
        <div class="container-fluid gradient3 pt-1 pb-5">
          <div class="row container mt-4 mx-auto">
             <?php foreach($result as $srt) : ?>
           
            <div class="col-lg-4 col-sm-6 mb-3" >
                <a href="<?= site_url('Quran/Surah/'). $srt['id_surah']; ?>" class="text-decoration-none text-dark">
                  <div class="card shadow f-poppins ">
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
            
          <?php endforeach;?>
       </div>
      </div>
        <?php else : 
           echo "<script> alert('data tidak di temukan')</script>"
          ?>
        <?php endif; ?>
