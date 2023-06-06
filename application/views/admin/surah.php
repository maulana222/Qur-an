<?php $this->load->view('templates/header')?>
<?php $this->load->view('templates/sidebar')?>

<div class="container-fuid pt-5 gradient3  py-4 ">
     <div class="container">
      
         <div class="row mt-1" id="daftar-surah">
          <?php foreach($surah as $srt) : ?>
           
            <div class="col-lg-4 col-sm-6 mb-3" >
                <a href="<?= site_url('Admin/showayat/'). $srt['id_surah']; ?>" class="text-decoration-none text-dark">
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
  </div>
   <?php echo $this->pagination->create_links(); ?>

<?php $this->load->view('templates/footer_admin');?>