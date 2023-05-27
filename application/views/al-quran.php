 <?php $this->load->view('templates/header.php'); ?> 
 <?php $this->load->view('templates/navbar.php'); ?> 
 <?php $this->load->view('templates/main.php'); ?>
<div class="container-fuid gradient3 py-5">
     <div class="container">
      

         <div class="row mt-1" id="daftar-surah">
          <?php foreach($surah as $srt) : ?>
           
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
  </div>
<footer class="container-fluid gradient4 pt-4 mx-auto shadow-top pb-3" >
    <ul class="medsos w-25">
      <li><a title="facebook" href="https://web.facebook.com/maulanaergialip.falah" ><i class="fa-brands fa-facebook fa-lg"></i></a></li>
      <li><a title="instagram" href="https://www.instagram.com/maulanaergi_22/?hl=id"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
      <li><a title="twiter" href="https://twitter.com/ergi435"><i class="fa-brands fa-twitter fa-lg"></i></a></li>
      <li><a title="whatsapp" href="https://wa.me/082123165614"><i class="fa-brands fa-whatsapp fa-lg"></i></a></li>
    </ul>
   <p class="text-center">  Copyright © <?= date('Y')?></p>
  </footer>
          <?php $this->load->view('templates/footer.php'); ?>