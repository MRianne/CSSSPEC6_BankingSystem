
<!-- jQuery -->
<script src="<?php echo base_url(); ?>resources/plugins/jquery/jquery-3.2.1.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?php echo base_url(); ?>resources/bootstrap/js/bootstrap.min.js"></script>
<!-- iCheck -->
<script src="<?php echo base_url(); ?>resources/plugins/iCheck/icheck.min.js"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url(); ?>resources/dist/js/adminlte.min.js"></script>
<!-- DataTables -->
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<script>
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
  $(document).ready( function () {
    $('#account_table').DataTable();
} );
</script>
</body>
</html>