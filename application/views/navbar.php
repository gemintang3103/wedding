<v-app-bar app elevation="0" light color="transparent">
  <v-btn icon href="<?= base_url() ?>">
    <v-icon color="black--text" large>mdi-home</v-icon>
  </v-btn>
  <v-text-field v-model="pencarian" v-on:keydown.enter="cariOrang" label="Scan QR Code/Nama" prepend-inner-icon="mdi-magnify" :autofocus="true" height="45" solo dense :loading="loading" loader-height="3" hide-details append-icon="mdi-camera" @click:append="dialogCameraOpen" ref="inputRef"></v-text-field>
  <v-spacer></v-spacer>
  <v-btn icon href="<?= base_url().'login' ?>"><v-icon color="black--text" large>mdi-login</v-icon></v-btn>
</v-app-bar>