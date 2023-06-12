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
    // pencarian: function() {
    //   if (this.pencarian != null) {
    //     this.cariOrang();
    //   } 
    // },
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
  function onScanSuccessScanBarcode(decodedText, decodedResult) {
      // this.$emit('result', decodedText, decodedResult);

      axios.get(`<?= base_url(); ?>api/search?keyword=${decodedText}`)
      .then(res => {
        // handle success
        this.loading = false;
        var data = res.data;
        if (data.status == true) {
          // Vue.set(vm.someObject, 'snackbar', true);
          vm.snackbar = true;
          // Vue.set(vm.someObject, 'snackbarMessage', data.message);
          vm.snackbarMessage = data.message;
          // this.$refs.inputRef.reset()
          // Vue.set(vm.someObject, 'dataOrang', data.message);
          vm.dataOrang = data.data;
          // Vue.set(vm.someObject, 'nama', data.data.nama);
          // vm.nama = this.dataOrang.nama;
          // Vue.set(vm.someObject, 'foto', data.data.foto);
          // vm.foto = this.dataOrang.foto;
          // Vue.set(vm.someObject, 'ucapan', data.data.ucapan);
          // vm.ucapan = this.dataOrang.ucapan;
          
          html5QrCode.stop();
          vm.dialogCamera = false;
        } else {
          vm.snackbar = true;
          //this.snackbar = true;
          vm.snackbarMessage = data.message;
          //this.snackbarMessage = data.message;
          // this.$refs.inputRef.reset()
          // html5QrCode.stop();
          vm.dataOrang = [];//this.dataOrang = [];
        }
      })
      .catch(err => {
        // handle error
        console.log(err);
      });
      
    }
  var methodsVue = {
    dialogCameraOpen: function() {
      this.dialogCamera = true;
      // if(html5QrCode){
      //   const config = {
      //     fps: 60,
      //     aspectRatio: 1.0,
      //     qrbox: {
      //       width: 200,
      //       height: 200
      //     },
      //     experimentalFeatures: {
      //       useBarCodeDetectorIfSupported: true
      //     }
      //   };
      //   html5QrCode.start(config, this.onScanSuccessScanBarcode());
      // }
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
        this.pencarian = null;
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
            this.pencarian = null;
            this.dataOrang = data.data;
            this.nama = this.dataOrang.nama;
            this.foto = this.dataOrang.foto;
            this.ucapan = this.dataOrang.ucapan;
          } else {
            this.snackbar = true;
            this.snackbarMessage = data.message;
            this.$refs.inputRef.reset()
            this.pencarian = null;
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
  // var html5QrCode;
  // Vue.component('qrcode-scanner', {
  //   template: `<div id="reader"></div>`,
  //   mounted() {
  //     html5QrCode = new Html5Qrcode("reader");
  //     const config = {
  //       fps: 60,
  //       aspectRatio: 1.0,
  //       qrbox: {
  //         width: 200,
  //         height: 200
  //       },
  //       experimentalFeatures: {
  //         useBarCodeDetectorIfSupported: true
  //       }
  //     };
  //     html5QrCode.start({
  //       facingMode: "environment"
  //     }, config, this.onScanSuccess).catch(err => {
  //       alert(`Error scanning. Reason: ${err}`);
  //       console.log(`Error scanning. Reason: ${err}`)
  //     });
  //   },
  //   methods: {
  //     onScanSuccess(decodedText, decodedResult) {
  //       // this.$emit('result', decodedText, decodedResult);

  //       axios.get(`<?= base_url(); ?>api/search?keyword=${decodedText}`)
  //       .then(res => {
  //         // handle success
  //         this.loading = false;
  //         var data = res.data;
  //         if (data.status == true) {
  //           // Vue.set(vm.someObject, 'snackbar', true);
  //           vm.snackbar = true;
  //           // Vue.set(vm.someObject, 'snackbarMessage', data.message);
  //           vm.snackbarMessage = data.message;
  //           // this.$refs.inputRef.reset()
  //           // Vue.set(vm.someObject, 'dataOrang', data.message);
  //           vm.dataOrang = data.data;
  //           // Vue.set(vm.someObject, 'nama', data.data.nama);
  //           // vm.nama = this.dataOrang.nama;
  //           // Vue.set(vm.someObject, 'foto', data.data.foto);
  //           // vm.foto = this.dataOrang.foto;
  //           // Vue.set(vm.someObject, 'ucapan', data.data.ucapan);
  //           // vm.ucapan = this.dataOrang.ucapan;
            
  //           html5QrCode.stop();
  //           vm.dialogCamera = false;
  //         } else {
  //           Vue.set(vm.someObject, 'snackbar', true);
  //           //this.snackbar = true;
  //           Vue.set(vm.someObject, 'snackbarMessage', data.message);
  //           //this.snackbarMessage = data.message;
  //           // this.$refs.inputRef.reset()
  //           // html5QrCode.stop();
  //           Vue.set(vm.someObject, 'dataOrang', []);//this.dataOrang = [];
  //         }
  //       })
  //       .catch(err => {
  //         // handle error
  //         console.log(err);
  //       });
        
  //     },
  //   }
  // });

  Vue.component('qrcode-scanner', {
  props: {
    qrbox: {
      type: Number,
      default: 250
    },
    fps: {
      type: Number,
      default: 10
    },
  },
  template: `<div id="reader"></div>`,
  mounted () {
    const config = {
      fps: this.fps,
      qrbox: this.qrbox,
    };
    const html5QrcodeScanner = new Html5QrcodeScanner('reader', config);
    html5QrcodeScanner.render(this.onScanSuccess);
  },
  methods: {
    onScanSuccess (decodedText, decodedResult) {
      this.$emit('result', decodedText, decodedResult);
      axios.get(`<?= base_url(); ?>api/search?keyword=${decodedText}`)
        .then(res => {
          // handle success
          this.loading = false;
          var data = res.data;
          if (data.status == true) {
            // Vue.set(vm.someObject, 'snackbar', true);
            vm.snackbar = true;
            // Vue.set(vm.someObject, 'snackbarMessage', data.message);
            vm.snackbarMessage = data.message;
            // this.$refs.inputRef.reset()
            // Vue.set(vm.someObject, 'dataOrang', data.message);
            vm.dataOrang = data.data;
            // Vue.set(vm.someObject, 'nama', data.data.nama);
            // vm.nama = this.dataOrang.nama;
            // Vue.set(vm.someObject, 'foto', data.data.foto);
            // vm.foto = this.dataOrang.foto;
            // Vue.set(vm.someObject, 'ucapan', data.data.ucapan);
            // vm.ucapan = this.dataOrang.ucapan;
            
            // html5QrCode.stop();
            // vm.dialogCamera = false;
          } else {
            Vue.set(vm.someObject, 'snackbar', true);
            //this.snackbar = true;
            Vue.set(vm.someObject, 'snackbarMessage', data.message);
            //this.snackbarMessage = data.message;
            // this.$refs.inputRef.reset()
            // html5QrCode.stop();
            Vue.set(vm.someObject, 'dataOrang', []);//this.dataOrang = [];
          }
        })
        .catch(err => {
          // handle error
          console.log(err);
        });
    }
  }
});
</script>
<script>
  var vm = new Vue({
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