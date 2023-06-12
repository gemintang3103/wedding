<?php $this->load->view('header'); ?>
<v-container fluid>
    <v-main>
        <template>
            <div class="mt-n5">
                <h1 class="text-center"><span class=""><?php echo $judul ?></span> <span class=""><strong><?php echo $nama ?></strong></span></h1>
                <h2 class="text-center mb-3"><strong><?php echo $tempat ?></strong></h2>
            </div>
        </template>

        <template>
            <div v-if="!dataOrang.id">
                <v-img class="mx-auto" src="<?= base_url().$foto; ?>" max-width="800px"></v-img>
            </div>
            <div class="text-center" v-if="dataOrang.id">
                <h1>Selamat Datang</h1>
                <h1>{{dataOrang.nama}}</h1>
                <v-row>
                    <v-col cols="12" sm="6">
						<div v-if="foto">
							<v-img class="mx-auto" v-bind:src="'<?= base_url()?>' + '/' + foto" style="width: 600px;height: 400px;object-fit: cover;"></v-img>
                        </div>
                        <div v-else>
							<v-img class="mx-auto" src="<?= base_url('images/ava.jpg' ) ?>" style="width: 600px;height: 400px;object-fit: cover;"></v-img>
                        </div>
                    </v-col>
                    <v-col cols="12" sm="6">
                        <v-img class="mx-auto" src="<?= base_url(). $foto; ?>" style="width: 600px;height: 400px;object-fit: cover;"></v-img>
                    </v-col>
                </v-row>
                <h1 class="font-italic mt-2">"{{ucapan}}"</h1>
            </div>
        </template>

        <template>
            <div class="text-center mt-2">
                <h3 class="font-weight-medium font-italic"><?php echo $alamat ?></h3>
            </div>
        </template>

        <!-- Start Modal Camera -->
        <template>
            <v-row justify="center">
                <v-dialog v-model="dialogCamera" width="600" persistent scrollable>
                    <v-card>
                        <v-card-title>
                            Kamera
                            <v-spacer></v-spacer>
                            <v-btn icon @click="dialogCameraClose">
                                <v-icon>mdi-close</v-icon>
                            </v-btn>
                        </v-card-title>
                        <qrcode-scanner @result="onScanCamera" />
                        <!--<p class="error--text">{{ error }}</p>
                    <qrcode-stream :camera="camera" @decode="onDecode" @init="onInit"></qrcode-stream>-->
                    </v-card>
                </v-dialog>
            </v-row>
        </template>
        <!-- End Modal Camera -->
    </v-main>
</v-container>
<?php $this->load->view('footer'); ?>