<!doctype html>
<html lang="en">

<head>
  <title>Title</title>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   
  <!-- Bootstrap CSS v5.2.1 -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
   <link href="<?php echo base_url()?>assets/css/style.css" rel="stylesheet">
</head>

<body class="body">
   <header>
    <!-- ini navbar  -->
    <nav class="f-poppins navbar navbar-expand-lg navbar-light  fixed-top shadow-sm  mycolor2">
      <div class="container">
        <a href="<?=base_url('quran/')?>">
         <img src="<?php echo base_url()?>assets/img/LOGOQuran.PNG" alt="" width="60">
        </a>
         <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#collapsibleNavId" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
           <span class="navbar-toggler-icon"></span>
         </button>
        <div class="collapse navbar-collapse" id="collapsibleNavId">
          <ul class="navbar-nav me-auto mt-2 mt-lg-0">
            <li class="nav-item mx-1">
              <a class="nav-link " href="<?= base_url('materi_islami')?>">Materi islami</a>
            </li>
            <li class="nav-item mx-1  ">
              <a href="<?= base_url('about')?>" class="nav-link">About</a>
            </li>
          </ul>
        </div>
          
      </div>
    </nav>
  </header>
  