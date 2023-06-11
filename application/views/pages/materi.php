<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="container-fluid pt-5 mt-5 pb-5 gradient3">
    <div class="container pt-4 f-poppins">
        <?php foreach ($article as $list) : ?>
            <div class="card mb-3 shadow-sm " style="max-width: 100%;">
            <div class="row g-2 d-flex align-item-center py-2 px-2">
                <div class="col-md-4">
                <img src="<?= base_url('assets/upload/').$list['gambar']?>" class="img-fluid rounded-start" alt="riba">
                </div>
                <div class="col-md-8">
                <div class="card-body position-relative">
                    <p class="date " style="color: grey;"><?= $list['tanggal'] ?></p>
                    <h5 class=""><?= $list['judul_materi']?></h5>
                    <p class="card-text materi text-justify" "><?= $list['isi_materi']?>terdapat pada surah <a href="<?= base_url('Quran/Surah/'. $list['id_surah']. '#'. $list['nomor_ayat']);?>"><?= $list['surah']?></a> ayat <?= $list['nomor_ayat'];?></p>
                </div>
                </div>
            </div>
        </div>
        <?php endforeach; ?>
    </div>
</div>
<?php $this->load->view('templates/footer.php'); ?>

