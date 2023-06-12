<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <link rel="shortcut icon" href="<?= base_url() . 'images/favicon.png'; ?>" type="image/x-icon"><!-- X -->
  <title>e-Ticket</title>
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/uikit.min.css' ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() . 'assets/css/dropify.min.css' ?>">

  <style>
    .text-grey-900 {
      color: #212121 !important;
    }

    a.text-grey-900:hover,
    a.text-grey-900:focus {
      color: #080808;
    }
  </style>
</head>
<?php foreach ($pengaturan->result() as $row) {
  $judul = $row->nama_web;
  $nama = $row->nama_pengantin;
  $tempat = $row->tempat_tanggal;
  $alamat = $row->alamat;
  $foto = $row->foto;
  $background = $row->img_background;
} ?>

<body style="background-image: url('<?= base_url() . $background; ?>') !important;background-attachment: fixed;background-position: center;background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;min-height:100vh;">