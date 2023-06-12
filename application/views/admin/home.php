<?php $this->load->view('admin/header'); ?>

<body>
    <?php $this->load->view('admin/navbar'); ?>
    <div class="uk-container uk-container-large">
        <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-2@l">
            <div>
                <div class="uk-card uk-card-default">

                    <div class="uk-card-body">
                        <span class="statistics-text"><a href="<?= base_url() . 'admin/daftartamu' ?>" class="uk-link-reset" alt="">Data Tamu Undangan</a></span><br />
                        <span class="statistics-number">
                            <?= $jumlah; ?>

                        </span>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default">

                    <div class="uk-card-body">
                        <span class="statistics-text"><a href="<?= base_url() . 'admin/konfirmasi' ?>" class="uk-link-reset" alt="">Rekap Konfirmasi</a></span><br />
                        <span class="statistics-number">
                            <?php
                            $hadir = "";
                            $tidakbisa = "";
                            $masihpertimbangan = "";
                            foreach ($konfirmasi->result() as $row) { ?>
                                <?php

                                $hadir = $row->Hadir;
                                $tidakbisa = $row->Tidak_Bisa;
                                $masihpertimbangan = $row->Masih_Pertimbangan;
                                ?>
                                <span class="uk-label uk-label-primary">Hadir: <strong><?= $row->Hadir; ?></strong></span>
                                <span class="uk-label uk-label-danger">Tidak Bisa: <strong><?= $row->Tidak_Bisa; ?></strong></span>
                                <span class="uk-label uk-label-warning">Belum Tahu: <strong><?= $row->Masih_Pertimbangan; ?></strong></span>

                            <?php }
                            ?>

                        </span>
                    </div>
                </div>
            </div>
        </div>
        <div uk-grid class="uk-child-width-1-1@s uk-child-width-1-1@l">
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        Grafik Kehadiran
                    </div>
                    <div class="uk-card-body">
                        <canvas id="chart" width="400" height="100"></canvas>
                    </div>
                </div>
            </div>
            <div>
                <div class="uk-card uk-card-default">
                    <div class="uk-card-header">
                        Grafik Konfirmasi
                    </div>
                    <div class="uk-card-body">
                        <canvas id="chart1" width="400" height="100"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="<?= base_url() . 'assets/js/Chart.min.js' ?>"></script>
    <?php

    foreach ($kehadiran->result() as $row) { ?>
    <?php
        $present = $row->Hadir;
        $absent = $row->Absen;
    }
    ?>
    <script>
        var ctx = $("#chart");

        var data = {
            labels: ["Hadir", "Absen"],
            datasets: [{
                label: "Grafik Kehadiran",
                backgroundColor: ['rgba(56, 86, 255, 0.87)', 'rgb(255, 99, 132)'],
                data: [<?= $present; ?>, <?= $absent; ?>],
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true,
            },
        }

        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>
    <script>
        var ctx = $("#chart1");

        var data = {
            labels: ["Bisa Hadir", "Tidak Bisa", "Masih Pertimbangan"],
            datasets: [{
                label: "Grafik Konfirmasi",
                backgroundColor: ['rgba(56, 86, 255, 0.87)', 'rgb(255, 99, 132)', 'rgb(250, 160, 90)'],
                data: [<?= $hadir; ?>, <?= $tidakbisa; ?>, <?= $masihpertimbangan; ?>],
            }]
        };

        var options = {
            responsive: true,
            maintainAspectRatio: true,
            legend: {
                display: true,
            },
        }

        var myLineChart = new Chart(ctx, {
            type: 'pie',
            data: data,
            options: options
        });
    </script>

    <?php $this->load->view('admin/footer'); ?>