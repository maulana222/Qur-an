<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="container-fluid pt-5 mt-5 pb-5 gradient3 color-dark">
    <div class="container pt-4 f-poppins d-flex">
        <?php foreach ($cards as $card) : ?>
        <div class="card mx-2 shadow-sm" style="width: 20rem;">
            <img src="<?= base_url('assets/upload/').$card['image']?>" style="object-fit: cover;height: 200px;" class="rounded-top card-img-top" alt="">
            <div class="card-body">
                <div class="d-flex justify-content-between">
                    <p class="fs-7" style="font-size: 12px;">by <?=$card['by']?></p>
                    <p class="fs-7 d-flex justify-content-end"><?= $card['date']?></p>
                </div>
                <h5 class="card-title py-3"><?= $card['judul_materi']?></h5>
                <a  href="<?= site_url('Pages/baca?tittle='). $card['judul_materi']?>" class="d-block btn btn-primary width-100 text-center">Baca</a>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php $this->load->view('templates/footer.php'); ?>

