<!DOCTYPE html>
<html lang="">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, minimal-ui">
	<meta name="robots" content="index, follow">
	<meta name="googlebot" content="index, follow">
	<link rel="shortcut icon" href="<?= base_url('images/favicon.png'); ?>" type="image/x-icon"><!-- X -->
	<!-- Primary Meta Tags -->
	<title>Buku Tamu Pernikahan Online</title>
	<meta name="title" content="Aplikasi Buku Tamu Pernikahan Online - Online Wedding Guest Book, itshop.id">
	<meta name="description" content="Jual Aplikasi Buku Tamu Digital Bisa QR Code, Kirim Link dan WA Khusus untuk Pernikahan - Online Wedding Guest Book, IT Shop Purwokerto - itshop.id">
	<!-- Open Graph / Facebook -->
	<meta property="og:type" content="website">
	<meta property="og:url" content="<?= base_url(); ?>">
	<meta property="og:title" content="Aplikasi Buku Tamu Pernikahan Online - Online Wedding Guest Book, itshop.id">
	<meta property="og:description" content="Jual Aplikasi Buku Tamu Digital Bisa QR Code, Kirim Link dan WA Khusus untuk Pernikahan - Online Wedding Guest Book, IT Shop Purwokerto - itshop.id">
	<meta property="og:image" content="">
	<!-- Twitter -->
	<meta property="twitter:card" content="summary_large_image">
	<meta property="twitter:url" content="<?= base_url(); ?>">
	<meta property="twitter:title" content="Aplikasi Buku Tamu Pernikahan Online - Online Wedding Guest Book, itshop.id">
	<meta property="twitter:description" content="Jual Aplikasi Buku Tamu Digital Bisa QR Code, Kirim Link dan WA Khusus untuk Pernikahan - Online Wedding Guest Book, IT Shop Purwokerto - itshop.id">
	<meta property="twitter:image" content="">
	
	<link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet"> 
	<link href="<?= base_url('assets/css/materialdesignicons.min.css') ?>" rel="stylesheet"> 
	<link href="<?= base_url('assets/css/vuetify.min.css') ?>" rel="stylesheet"> 
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet"> 
	<style>
		
	</style>
</head>

<body style="background-image: url('<?= base_url().$background; ?>') !important;background-attachment: fixed;background-position: center;background-repeat: no-repeat;-webkit-background-size: cover;-moz-background-size: cover;-o-background-size: cover;background-size: cover;">
	<!-- ========================= preloader start ========================= -->
	<div class="preloader">
		<div class="loader">
			<div class="loader-logo"><img src="<?= base_url().'images/logo.png'; ?>" alt="Preloader" width="64"></div>
			<div class="spinner">
				<div class="spinner-container">
					<div class="spinner-rotator">
						<div class="spinner-left">
							<div class="spinner-circle"></div>
						</div>
						<div class="spinner-right">
							<div class="spinner-circle"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- preloader end -->
	<div id="app">
		<v-app>
			<?php $this->load->view('navbar'); ?>