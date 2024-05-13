<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="container py-5 mt-5 ">
    <div class="main px-5 mb-5">
        <?php foreach ($result as $results) : ?>
            <h2 class="f-roboto" style="color: rgb(29, 29, 29);"><?= $results['judul_materi']?></h2>
            <div class="tittle d-flex justify-content-between ">
                <p><?=$results['by'] ?></p>
                <p> <?= $results['date']?></p>
            </div>
            <div class="content text-center ">
                <img class="w-100 rounded" src="<?= base_url('assets/upload/').$results['image']?>" alt="" >
                    <p class="style-text text-justify f-roboto p-5">
                        <?= $results['content']?>
                        materi ini terdapat pada Al-Qur'an surah <a href="<?= base_url('Quran/Surah/'). $results['id_surah']. '#' . $results['nomor_ayat']?>"> <?= $results['surah'].' ayat ' . $results['nomor_ayat'] ?></a> 
                    </p>
            </div>
       <?php endforeach; ?>
    </div>
</div>
