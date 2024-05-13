 <?php $this->load->view('templates/header.php'); ?>
 <?php $this->load->view('templates/navbar.php'); ?>
 
 <!-- Begin Page Content -->

<div class="container-fluid gradient2 main-content mt-5 py-5 position-relative color-dark">
  <div class="container f-rubik color-dark px-5">
    <div class="d-flex justify-content-between color-dark">
       <div class="d-flex align-items-center justify-content-end">
           <h2><?= $title; ?></h2>
          </div>
        
       <span class="d-block">
         <?= anchor('', '<div class="btn btn-sm bg-primary px-3 py-2 text-light"><i class="fa-solid fa-chevron-left"></i> Kembali</div>'); ?>
       </span>
    </div>
    <div class="fs-7 color-dark ">
        <?php foreach ($surah as $s) : ?>
            <p ><?= $s['arti_surah']; ?></p>
            <div class="f-roboto d-flex justify-content-between">
              <p><?= $s['jumlah_ayat']; ?> Ayat</p>
           <?php foreach ($audio as $audios) : ?>
                <div class="audio bg-light text-center rounded-circle" style="padding: 10px;width: 43px; cursor:pointer;">
                    <i class="fa-solid fa-play" id="playAudio<?= $audios['url']?>" onclick="playAudio('<?= $audios['url']?>')"></i>
                    <i class="fa-solid fa-pause" id="pauseAudio<?= $audios['url']?>" onclick="pauseAudio('<?= $audios['url']?>', this)" style="display: none;"></i>
                </div>
            <?php endforeach; ?>
            </div>
        <?php endforeach; ?>
    </div>
    <hr>
  </div> 
  <div class="text-center color-dark position-absolute start-50 translate-middle-x">
    <?php foreach($bismillah as $b) : ?>
        <h3 class="fs-2 fw-bold"><?= $b['ayat']; ?></h3>
        <p class="fs-5"><?= $b['arti_ayat']; ?></p>
        <?php endforeach; ?>
         <audio id="audioPlayer" controls style="display:none;">
                        <source id="audioSource" src="" type="audio/mpeg">
                    </audio>
      </div>
</div>

    <div class="gradient3 container-fluid py-3">
  <?php foreach ($quran as $q) : ?>
  <div class="pt-5 " id="<?= $q['nomor_ayat']?>">
    <div class="container pt-5 color-dark">
       <div class="f-popins position-relative" id="target">  
          <div class="<?php echo ($q['id'] % 2 == 0) ? 'even' : 'odd'; ?> shadow">
           <div class="number-ayat"><?= $q['nomor_ayat']?></div>
            <div class="card-body px-5 py-4" >
              <h5 class="card-title fs-2  justify-content-end d-flex text-end fw-bold " ><?=$q['ayat']; ?></h5>
              <p class="d-flex mt-3 fw-bold  f-roboto"><?= $q['latin']?></p>
               <P href="#" class="pt-4 f-6 fw-bold f-rubik"><?= $q['arti_ayat']; ?></P>

              <div class="fiture d-flex justify-content-end ">
                 <a href="<?= site_url('Quran/tafsir/'). $q['id']; ?>" >
                   <i class="fa-solid color-dark fa-book-open"></i>
                 </a>
              </div>
            </div>
          </div>
        </div>
  
    </div>
  </div>

  

  <?php endforeach; ?>
  </div>
<script>
                          // play audio
                        function playAudio(url) {
                                  let audioPlayer = document.getElementById('audioPlayer');
                        let audioSource = document.getElementById('audioSource');
                        let play = document.getElementById('playAudio<?= $audios['url']?>');
                        let pause = document.getElementById('pauseAudio<?= $audios['url']?>');


                            audioSource.src = url;
                            audioPlayer.load();
                            audioPlayer.play();
                            play.style.display = 'none';
                            pause.style.display = 'inline-block';
                        }
                        // buatpause audo
                        function pauseAudio(url, element) {

                        let audioPlayer = document.getElementById('audioPlayer');
                        let audioSource = document.getElementById('audioSource');
                        let play = document.getElementById('playAudio<?= $audios['url']?>');
                        let pause = document.getElementById('pauseAudio<?= $audios['url']?>');

                            audioPlayer.pause();
                            play.style.display = 'inline-block';
                            pause.style.display = 'none';
                        }
                    </script>
  <?php $this->load->view('templates/footer.php'); ?>
