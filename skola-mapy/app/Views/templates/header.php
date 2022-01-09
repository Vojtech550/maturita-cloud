<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="<?= base_url('public/assets/jQuery/jquery-3.6.0.min.js'); ?>" type="text/javascript"></script>
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>
   <!-- Make sure you put this AFTER Leaflet's CSS -->
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   <!-- <script src="https://code.jquery.com/jquery-3.6.0.slim.js" type="text/javascript"></script>  -->
   <link rel="stylesheet" type="text/css" href="<?= base_url('public/assets/DataTables/css/jquery.dataTables.min.css'); ?>"/>
   <script type="text/javascript" src="<?= base_url('public/assets/DataTables/js/jquery.dataTables.min.js'); ?>"></script>
  <title><?= esc($title) ?></title>
</head>

<body class="body">
  <style>
  #pg-container {
    min-height: 100vh;
    position: relative;
  }
  #content-wrap {
    padding-bottom: 2.5rem;
  }

  #footer {
    position: absolute;
    bottom: 0;
    width: 100%;
    height: 2.5rem;
  }
  </style>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="<?= base_url()?>">Škola mapy</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url()?>">Databáze škol</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?=base_url('maps')?>">mapy</a>
        </li>
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?=base_url('admitted_add')?>">Přijatí studenti</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("auth/login")?>">Login</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo base_url("auth/logout")?>">Logout</a>
        </li>
      </ul>
    </div>
</nav>
<div id="pg-container">
<div id="content-wrap">
<div class="container">
