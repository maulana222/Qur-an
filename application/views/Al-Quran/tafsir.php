
<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
   <div class="container-fluid gradient3 pt-5 mt-5  pb-5">
    <div class="d-flex container row  mx-auto">
        <h1 class="flex-grow-1 fs-1 f-roboto">isi tafsiran :</h1>
        <p class="f-lato style-text"><?= isset($tafsir) ? $tafsir : '' ?></p>   
    </div>
   </div>
</body>
</html>
<footer class="container-fluid gradient4 pt-4 mx-auto shadow-top pb-3" >
    <ul class="medsos w-25">
      <li><a title="facebook" href="https://web.facebook.com/maulanaergialip.falah" ><i class="fa-brands fa-facebook fa-lg"></i></a></li>
      <li><a title="instagram" href="https://www.instagram.com/maulanaergi_22/?hl=id"><i class="fa-brands fa-instagram fa-lg"></i></a></li>
      <li><a title="twiter" href="https://twitter.com/ergi435"><i class="fa-brands fa-twitter fa-lg"></i></a></li>
      <li><a title="whatsapp" href="https://wa.me/082123165614"><i class="fa-brands fa-whatsapp fa-lg"></i></a></li>
    </ul>
   <p class="text-center">  Copyright © <?= date('Y')?></p>
  </footer>
 