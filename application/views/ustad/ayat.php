<?php $this->load->view('templates/header')?>
<?php $this->load->view('templates/sidebar_for_ustad')?>

<!-- Begin Page Content -->
<div class="container-fluid gradient2 main-content  mt-5 pt-5 cjr color-dark">

<div class="container f-rubik fs-6 ">
    <span class="d-flex justify-content-end ">
       <?= anchor('Ustad/surah', '<div class="btn btn-sm bg-primary px-3 py-2 text-dark"><i class="fa-solid fa-chevron-left"> </i>    Kembali </div>'); ?>
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
<div class="container-fluid gradient3 pb-5 color-dark">
  <div class="content">
    <div class="container color-dark">
      <?php foreach ($quran as $q) : ?>
       <div class="f-popins">  
          <div class="<?php echo ($q['id_quran'] % 2 == 0) ? 'even' : 'odd'; ?> mt-5 shadow">
           <?= $q['nomor_ayat']?>
            <div class="card-body px-5 py-4" id="<?php $q['nomor_ayat']?>">
              <h5 class="card-title fs-2 justify-content-end d-flex text-end fw-bold text-rtl"><?=$q['ayat']; ?></h5>
              <p class="d-flex mt-3 fw-bold  f-roboto"><?= $q['latin']?></p>
               <P href="#" class="pt-4 f-6 fw-bold f-rubik"><?= $q['arti_ayat']; ?></P>

              <div class="fiture d-flex justify-content-end ">
                 <a href="<?= site_url('Admin/tafsir/'). $q['id_quran']; ?>" >
                   <i class="fa-solid fa-book-open color-dark"></i>
                 </a>
              </div>
            </div>
          </div>
        <?php endforeach; ?>
        </div>
    </div>
  </div>
</div>


<?php $this->load->view('templates/footer_admin');?>