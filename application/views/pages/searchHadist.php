<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="container-fluid gradient3">
    <div class="container main search-container">
        <img class="object-fit-cover text-center" src="<?php echo base_url()?>assets/img/kaligrafi.png" alt="" width="330px">
        <form action="<?php echo site_url('Pages/searchHadist');?>" method="POST" class="w-75 mx-auto">
            <input class="mysearch rounded-pill" type="text" name="searchInput" placeholder="Cari hadis/tentang">
        </form>
        <div class="d-flex" style="margin: auto;width:90%;">
            <?php foreach ($result as $hadith) : ?>
                <div class="bg-light rounded-pill px-3 py-1 d-flex mx-1 my-2 imam">
                    <a class="text-primary" href="<?= site_url('hadist/dataHadist/'). $hadith['slug'] ?>"><?= $hadith['name']; ?></a>
                </div>
            <?php endforeach ?>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
