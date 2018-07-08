
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
	var baseUrl = window.location.origin;
  $(function () {
    $('input').iCheck({
      checkboxClass: 'icheckbox_square-blue',
      radioClass   : 'iradio_square-blue',
      increaseArea : '20%' // optional
    })
  })
  $(function() {
        var table =  $('#tbl_transactions').DataTable({
            ajax: {
                url: baseUrl + '/BankingSystem/api/transactions',
            dataSrc: ''
            },
            select: true,
            columns: [
                {title: 'Transaction ID', data: 'transaction_id'},
                {title: 'Account Number', data: 'account_id'},
                {title: 'Description', data: 'description'},
                {title: 'DEBIT/CREDIT', data: 'type'},
                {title: 'Amount', data: 'amount'},
                {title: 'Ending Balance', data: 'balance'},
                {title: 'Date', data: 'date'}
            ]
        });
        $('#tbl_transactions tbody').on('click', 'tr', function() {
            if ( $(this).hasClass('selected') ) {
                $(this).removeClass('selected');
            } else {
                table.$('tr.selected').removeClass('selected');
                $(this).addClass('selected');
            }
        });
    });
</script>
</body>
</html>