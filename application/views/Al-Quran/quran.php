 <?php $this->load->view('templates/header.php'); ?>
<!-- Begin Page Content -->
<div class="container-fluid gradient2 main-content mt-5 pt-5">

<div class="container f-rubik fs-6 ">
  <span class="d-flex justify-content-end ">
    <?= anchor('quran', '<div class="btn btn-sm btn-primary px-3 py-2"><i class="fa-solid fa-chevron-left"> </i>    Kembali </div>'); ?>
  </span>
  <h1 class ><?= $title; ?> </h1>
  <?php foreach ($surah as $s) : ?>
    <p  class="f-roboto" ><sup><?= $s['arti_surah']; ?></sup></p>
    <p class=""><?= $s['jumlah_ayat']; ?> Ayat</p>
  <?php endforeach; ?>
  <hr>
  <div class="text-center fs-6 pb-1 mt-5">
    <?php foreach($bismillah as $b) : ?>
          <h3 class="fs-2 fw-bold "><?= $b['ayat']; ?></h3>
          <p class="fs-5"><?= $b['arti_ayat']; ?></p>
   <?php endforeach; ?>
  </div>
 </div> 
</div>
<div class="container-fluid gradient3 pt-5">
  <div class="content">
    <div class="container">
      <?php 
        $no = 1;
        foreach ($quran as $q) : ?>
       <div class="pb-5">   
          <div class="<?php echo ($q['id'] % 2 == 0) ? 'even' : 'odd'; ?> mt-5 shadow">
            <div class="card-body px-4 py-4">
              <h5 class="card-title fs-3  d-flex justify-content-end fs-3 fw-bold"><?= $q['ayat']; ?></h5>
              <p class="d-flex mt-3 fw-bold justify-content-end f-roboto"><?= $q['latin']?></p>
               <P href="#" class="pt-4 f-6 fw-bold f-rubik"><?= $q['arti_ayat']; ?></P>

              <div class="fiture d-flex justify-content-end ">
                 <i class="fa-solid fa-book-open" title="tafsir"></i>
              </div>
            </div>
          </div>
        <?php endforeach; $no++ ?>
        </div>
    </div>
  </div>
</div>

       
 <?php $this->load->view('templates/footer.php'); ?>