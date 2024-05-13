<?php $this->load->view('templates/header.php'); ?>
<?php $this->load->view('templates/navbar.php'); ?>
<div class="container-fluid pt-5 gradient3">
    <div class="container pt-5 ">
        <?php
        $name = $this->input->get('imam');
        echo $this->pagination->create_links().'?imam='. $name; ?>
         <?php if (!empty($data)): ?>
            <?php foreach ($data as $hadith) : ?>
                <div class="card mt-3">
                    <div class="card-body">
                        <h4 class="card-title text-end fs-2 justify-content-end d-flex"><?= $hadith['arab']?></h4>
                        <p class="card-text">"<?= $hadith['id']?>"</p>
                    </div>
                </div>
            <?php endforeach ?>
        <?php endif ?>

    </div>
</div>