 <?php $this->load->view('templates/header.php'); ?> 
 <?php $this->load->view('templates/navbar.php'); ?> 
 <?php $this->load->view('templates/main.php'); ?>
<div class="container-fuid gradient3  py-5" >
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

  <script src="https://code.jquery.com/jquery-3.7.0.js" integrity="sha256-JlqSTELeR4TLqP0OG9dxM7yDPqX1ox/HfgiSLBj8+kM=" crossorigin="anonymous"></script>

  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"
    integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous">
  </script>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.min.js"
    integrity="sha384-7VPbUDkoPSGFnVtYi0QogXtr74QeVeeIs99Qfg5YCF+TidwNdjvaKZX19NZ/e6oz" crossorigin="anonymous">
  </script>
   <script src="https://kit.fontawesome.com/62d140411f.js" crossorigin="anonymous"></script>
  <script src="<?= base_url() ?>assets/js/myscript.js"></script>
</body>

</html>
       