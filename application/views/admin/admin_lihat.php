<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="robots" content="noindex, nofollow">
  <meta name="googlebot" content="noindex, nofollow">
  <title>Data QR Code <?= $hasil->id; ?></title>
  <link rel="stylesheet" type="text/css" href="<?= base_url() . 'assets/css/uikit.min.css' ?>">
  <style>
    html,
    body,
    div,
    canvas {
      margin: 0;
      padding: 0;
    }

    #capture {
      width: 305px;
    }

    .text-grey-50 {
      color: #fafafa !important;
    }

    a.text-grey-50:hover,
    a.text-grey-50:focus {
      color: #f5f5f5;
    }

    .text-grey-900 {
      color: #212121 !important;
    }

    a.text-grey-900:hover,
    a.text-grey-900:focus {
      color: #080808;
    }
  </style>
</head>

<body>

  <div class="uk-container uk-container-expand">
    <div uk-grid>
      <div id="capture" class="uk-background-primary uk-light uk-padding uk-padding-small uk-panel">
        <h4 class="uk-text-center uk-text-uppercase"><?= $setting->nama_web; ?><br><?= $setting->nama_pengantin; ?></h4>
        <dl class="uk-description-list">
          <dt class="text-grey-50">QR Code Anda</dt>
          <dd class="uk-text-center"><img src="<?= base_url() . $hasil->qr_code; ?>?<?= random_string('alnum', 4); ?>" width="250px"><?= $hasil->id; ?></dd>
          <dt class="text-grey-50">Informasi:</dt>
          <dd class="text-grey-50 uk-text-small">Mohon agar menunjukan QR-Code di atas untuk mengisi <strong>Buku Tamu Digital</strong> kepada petugas penerima tamu pada saat memasuki gedung sekaligus sebagai penukaran souvenir.</dd>
          <dt class="text-grey-50">Nama Anda:</dt>
          <dd class="text-grey-50"><?= $hasil->nama; ?></dd>

        </dl>

      </div>

    </div>
    <br />
    <button id="download" class="uk-button uk-button-secondary">Download sebagai PNG</button>

  </div>


  <script type="text/javascript" src="<?= base_url() . 'assets/js/jquery-2.1.4.min.js' ?>"></script>
  <script type="text/javascript" src="<?= base_url() . 'assets/js/uikit.min.js' ?>"></script>

  <script type="text/javascript" src="<?= base_url() . 'assets/js/uikit-icons.min.js' ?>"></script>
  <script type="text/javascript" src="<?= base_url() . 'assets/js/html2canvas.min.js' ?>"></script>

  <script>
    document.getElementById("download").addEventListener("click", function() {

      html2canvas($('#capture').get(0)).then(function(canvas) {

        //console.log(canvas);
        saveAs(canvas.toDataURL(), 'QR-<?= $hasil->nama; ?>.png');
      });
    });


    function saveAs(uri, filename) {

      var link = document.createElement('a');

      if (typeof link.download === 'string') {

        link.href = uri;
        link.download = filename;

        document.body.appendChild(link);

        link.click();

        document.body.removeChild(link);

      } else {

        window.open(uri);

      }
    }
  </script>

</body>

</html>