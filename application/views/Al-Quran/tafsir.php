
<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="tafsiran-style container-fluid gradient3 pt-5 mt-5 ">
  <div class="d-flex container row  mx-auto">
    <h1 class="flex-grow-1 fs-1 f-roboto">isi tafsiran :</h1>
    <p class="f-lato style-text"><?= isset($tafsir) ? $tafsir : '' ?></p>   
  </div>
</div>
<?php $this->load->view('templates/footer.php'); ?>
