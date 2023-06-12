<v-snackbar v-model="snackbar" :timeout="timeout" style="bottom:40px;">
  <span v-if="snackbar">{{snackbarMessage}}</span>
  <template v-slot:action="{ attrs }">
    <v-btn text v-bind="attrs" @click="snackbar = false">
      ok
    </v-btn>
  </template>
</v-snackbar>
</v-app>
</div>
<script src="<?= base_url() . 'assets/js/vue.min.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/js/vuetify.min.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/js/axios.min.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/js/html5-qrcode.min.js'; ?>" type="text/javascript"></script>
<script src="<?= base_url() . 'assets/js/styles.js'; ?>" type="text/javascript"></script>

<script>
  var computedVue = {

  }
  var createdVue = function() {
    axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';
  }
  var mountedVue = function() {

  }
  var watchVue = {
    pencarian: function() {
      if (this.scan == true) {
        this.cariOrang();
      } 
    },
  }
  var dataVue = {
    loading: false,
    valid: true,
    snackbar: false,
    timeout: 2000,
    snackbarMessage: '',
    show: false,
    dialogCamera: false,
    pencarian: null,
    scan: false,
    dataOrang: [],
    nama: "",
    foto: null,
    ucapan: "",
    rules: {
      email: v => !!(v || '').match(/@/) || 'Email tidak valid',
      length: len => v => (v || '').length <= len || `Invalid length ${len}`,
      password: v => !!(v || '').match(/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*(_|[^\w])).+$/) ||
        'Strong Password',
      min: v => v.length >= 8 || 'Minimal karakter',
      required: v => !!v || 'Required',
      number: v => Number.isInteger(Number(v)) || "Number",
      zero: v => v > 0 || "Zero"
    },
  }
  var methodsVue = {
    dialogCameraOpen: function() {
      this.dialogCamera = true;
      this.$refs.inputRef.reset();
    },
    dialogCameraClose: function() {
      this.dialogCamera = false;
    },
    onScanCamera(decodedText, decodedResult) {
      this.pencarian = `${decodedText}`;
      this.scan = true;
      this.dialogCameraClose();
    },
    // Search Orang
    cariOrang: function() {
      if (this.pencarian != null) {
        this.getDataOrang();
        this.$refs.inputRef.reset();
        this.scan = false;
      }
    },
    // Get Data Orang
    getDataOrang: function() {
      this.loading = true;
      axios.get(`<?= base_url(); ?>api/search?keyword=${this.pencarian}`)
        .then(res => {
          // handle success
          this.loading = false;
          var data = res.data;
          if (data.status == true) {
            this.snackbar = true;
            this.snackbarMessage = data.message;
            this.$refs.inputRef.reset()
            this.dataOrang = data.data;
            this.nama = this.dataOrang.nama;
            this.foto = this.dataOrang.foto;
            this.ucapan = this.dataOrang.ucapan;
          } else {
            this.snackbar = true;
            this.snackbarMessage = data.message;
            this.$refs.inputRef.reset()
            html5QrCode.stop();
            this.dataOrang = [];
          }
        })
        .catch(err => {
          // handle error
          console.log(err);
        });
    },
  }
  Vue.component('qrcode-scanner', {
    template: `<div id="reader"></div>`,
    mounted() {
      const html5QrCode = new Html5Qrcode("reader");
      const config = {
        fps: 60,
        aspectRatio: 1.0,
        qrbox: {
          width: 200,
          height: 200
        },
        experimentalFeatures: {
          useBarCodeDetectorIfSupported: true
        }
      };
      html5QrCode.start({
        facingMode: "environment"
      }, config, this.onScanSuccess).catch(err => {
        alert(`Error scanning. Reason: ${err}`);
        console.log(`Error scanning. Reason: ${err}`)
      });
    },
    methods: {
      onScanSuccess(decodedText, decodedResult) {
        this.$emit('result', decodedText, decodedResult);
        html5QrCode.stop();
        this.$refs.inputRef.reset();
      },
    }
  });
</script>
<script>
  new Vue({
    el: '#app',
    vuetify: new Vuetify(),
    computed: computedVue,
    data: dataVue,
    mounted: mountedVue,
    created: createdVue,
    watch: watchVue,
    methods: methodsVue
  })
</script>

</body>

</html>