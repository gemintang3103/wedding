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
    <link href="<?= base_url('assets/vendor/bootstrap-5.3.0/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link href="<?= base_url() . 'assets/css/select2.min.css'; ?>" rel="stylesheet" />
	<link href="<?= base_url('assets/css/styles.css') ?>" rel="stylesheet"> 

	<style>
		.icon-scanner{
            font-size: 23px;
        }
        div:where(.swal2-container).swal2-center > .swal2-popup{
            border-radius: 30px !important;
        }
        div:where(.swal2-container) div:where(.swal2-actions){
            width: 100% !important;
        }
        div:where(.swal2-container) button:where(.swal2-styled).swal2-confirm{
            border-radius: 30px !important;
            width: 85% !important;
        }
        #html5-qrcode-button-camera-permission, #html5-qrcode-button-camera-stop{
            padding: 7px 15px;
            border-radius: 10px;
            border: 0px;
            background: #0062df;
            color: #fff;
        }
        #qr-reader{
            background: #fff;
            border-radius: 10px;
            border: 0px;
        }
        .select2{
            width: calc(100% - 320px) !important;
            
        }
        .select2-container .select2-selection--single{
            height: 45px !important;
        }
        .select2-container--default .select2-selection--single{
            border-radius: 10px 0px 0px 10px !important;
        }
        .select2-container--default .select2-selection--single .select2-selection__rendered{
            line-height: 40px !important;
            text-align: center;
        }
        .select2-container--default .select2-selection--single .select2-selection__arrow{
            height: 40px !important;
        }
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
	<div id="app" style="margin-top: -10px;">
        <!-- <div class="row">
            <div class="col-md-12">
                <a style="margin-right: 10px;" href="<?= base_url('login')?>" class="btn btn-outline-dark float-end"><i class="bi bi-arrow-right-square"></i></a>
            </div>
        </div> -->

        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="input-group mb-3">
                        <select class="js-example-basic-single" name="state" id="peserta-manual">
                            <option value="">Scan QR atau Pilih Tamu Undangan</option>
                            <?php foreach($peserta as $datapeserta){?>
                                <option value="<?= $datapeserta['id']?>"><?= strtoupper($datapeserta['nama'])?></option>
                            <?php }?>
                        </select>
                        <button style="width: 100px; border-radius: 0px 10px 10px 0px !important" class="input-group-text btn btn-success" id="btn-simpan">Catat</button>
                        <button style="font-size: 20px; width: 50px; border-radius: 10px !important; margin-left: 10px;" class="btn btn-outline-dark float-end" data-bs-toggle="modal" data-bs-target="#scanModal"><i class="bi bi-camera-fill"></i></button>
                        <a href="<?= base_url('login')?>" style="font-size: 20px; width: 50px; border-radius: 10px !important; margin-left: 110px;" class="btn btn-outline-dark float-end" ><i class="bi bi-arrow-right-square"></i></a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">            
            <h2 class="text-center"><span class=""><?php echo $judul ?></span> <span class=""><strong><?php echo $nama ?></strong></span></h2>
            <h4 class="text-center mb-4"><strong><?php echo $tempat ?></strong></h4>

            <div class="d-none" id="area-selamat-datang">
                <h3 id="selamat-datang" class="text-center"><strong>Selamat Datang</strong></h3>
                <h3 id="nama-tamu" class="text-center mb-4"><strong></strong></h3>
            </div>

            <div class="row">
                <div class="col-md-12">
                    
                    <div class="image-banner text-center">
                        <image style="border-radius: 30px;" class="img-fluid" src="<?= base_url(). $foto; ?>">
                    </div>
                </div>
            </div>
            <h4 id="ucapan-tamu" class="text-center mb-4"><strong><em></em></strong></h4>

            <!-- Modal -->
            <div class="modal fade" id="scanModal" tabindex="-1" aria-labelledby="scanModal" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Scan Barcode</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                        <div id="qr-reader" style="width:100%"></div>
                            <div id="qr-reader-results"></div>
                        </div>
                    </div>
                </div>
            </div>

            <p class="font-weight-medium font-italic text-center"><strong><?php echo $alamat ?></strong></p>
        </div>
    </div>
</body>

<script src="<?= base_url() . 'assets/js/styles.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url('assets/vendor/bootstrap-5.3.0/js/bootstrap.min.js') ?>" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/html5-qrcode"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
<script src="<?= base_url() . 'assets/js/select2.min.js'; ?>"></script>

<script>
    const myModal = new bootstrap.Modal('#scanModal', {
        keyboard: false
    })
    $(document).ready(function() {
        $('.js-example-basic-single').select2();
    });
    function docReady(fn) {
        // see if DOM is already available
        if (document.readyState === "complete"
            || document.readyState === "interactive") {
            // call on next available tick
            setTimeout(fn, 1);
        } else {
            document.addEventListener("DOMContentLoaded", fn);
        }
    }

    $('#btn-simpan').on('click', function(){
        var peserta = $('#peserta-manual').val();
        if(peserta != ''){
            $.ajax({
                url: `<?= base_url(); ?>api/search?keyword=${peserta}`,
                type: 'GET',
                dataType: 'json', // added data type
                success: function(res) {
                    if(res.status){
                        Swal.fire({
                            title: `<strong>Selamat Datang ${res.data.nama.toUpperCase()}</strong>`,
                            icon: 'info',
                            html: "<em>Terima Kasih Atas Kehadiran dan Do'a Restunya</em>",
                            confirmButtonText: 'Ok',
                            focusConfirm: true,
                        });
                        $('#area-selamat-datang').removeClass('d-none');
                        $('#ucapan-tamu').removeClass('d-none');
                        $('#nama-tamu').html(res.data.nama.toUpperCase());
                        $('#ucapan-tamu').html(res.data.ucapan);
                        $('#scanModal').modal('hide');
                        // myModal.hide();
                    } else {
                        Swal.fire({
                            title: `<strong>Gagal</strong>`,
                            icon: 'error',
                            html:"<italic>Data Barcode Tidak Terdaftar Sebagai Peserta</italic>",
                            confirmButtonText:'Ok',
                            focusConfirm: true,
                        });
                        $('#area-selamat-datang').addClass('d-none');
                        $('#ucapan-tamu').addClass('d-none');
                        $('#nama-tamu').html('');
                        $('#ucapan-tamu').html('');
                        $('#scanModal').modal('hide');
                        // myModal.hide();
                    }
                }
            });
        } else {
            Swal.fire({
                title: `<strong>Oopss</strong>`,
                icon: 'info',
                html:"<italic>Silahkan Pilih Terlebih Dahulu Tamu Undangan Pada Kolom Disamping.</italic>",
                confirmButtonText:'Ok',
            });
            $('#area-selamat-datang').addClass('d-none');
            $('#ucapan-tamu').addClass('d-none');
            $('#nama-tamu').html('');
            $('#ucapan-tamu').html('');
            $('#scanModal').modal('hide');
            myModal.hide();
        }
        
    });

    docReady(function () {
        var resultContainer = document.getElementById('qr-reader-results');
        var lastResult, countResults = 0;
        function onScanSuccess(decodedText, decodedResult) {
            if (decodedText !== lastResult) {
                ++countResults;
                lastResult = decodedText;
                // Handle on success condition with the decoded message.
                console.log(`Scan result ${decodedText}`, decodedResult);

                $.ajax({
                    url: `<?= base_url(); ?>api/search?keyword=${decodedText}`,
                    type: 'GET',
                    dataType: 'json', // added data type
                    success: function(res) {
                        if(res.status){
                            Swal.fire({
                                title: `<strong>Selamat Datang ${res.data.nama.toUpperCase()}</strong>`,
                                icon: 'info',
                                html: "<em>Terima Kasih Atas Kehadiran dan Do'a Restunya</em>",
                                confirmButtonText: 'Ok',
                                focusConfirm: true,
                            });
                            $('#area-selamat-datang').removeClass('d-none');
                            $('#ucapan-tamu').removeClass('d-none');
                            $('#nama-tamu').html(res.data.nama.toUpperCase());
                            $('#ucapan-tamu').html(res.data.ucapan);
                            $('#scanModal').modal('hide');
                        } else {
                            Swal.fire({
                                title: `<strong>Gagal</strong>`,
                                icon: 'error',
                                html:"<italic>Data Barcode Tidak Terdaftar Sebagai Peserta</italic>",
                                confirmButtonText:'Ok',
                                focusConfirm: true,
                            });
                            $('#area-selamat-datang').addClass('d-none');
                            $('#ucapan-tamu').addClass('d-none');
                            $('#nama-tamu').html('');
                            $('#ucapan-tamu').html('');
                            $('#scanModal').modal('hide');
                            myModal.hide();
                        }
                    }
                });
            }
        }

        var html5QrcodeScanner = new Html5QrcodeScanner(
            "qr-reader", { fps: 10, qrbox: 250 });
        html5QrcodeScanner.render(onScanSuccess);
    });
</script>
