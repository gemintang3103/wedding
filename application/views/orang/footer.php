<script type="text/javascript" src="<?php echo base_url() . 'assets/js/jquery-2.1.4.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/uikit.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/uikit-icons.min.js' ?>"></script>
<script type="text/javascript" src="<?php echo base_url() . 'assets/js/dropify.min.js' ?>"></script>


<script type="text/javascript">
  $(document).ready(function() {
    $('.dropify').dropify({
      messages: {
        default: 'Drag atau drop untuk memilih gambar',
        replace: 'Ganti',
        remove: 'Hapus',
        error: 'error'
      }
    });
  });
</script>
</body>
</html>