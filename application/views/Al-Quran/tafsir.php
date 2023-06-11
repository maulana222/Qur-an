
<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="tafsiran-style container-fluid gradient3 pt-4 mt-5 ">
  <div class="d-flex container row pb-5 mx-auto">
    <h1 class="flex-grow-1 fs-1 f-roboto">isi tafsiran :</h1>
    <p class="f-lato style-text"><?= $tafsir ?></p>   
  </div>
</div>
<?php $this->load->view('templates/footer.php'); ?>
