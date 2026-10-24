<script>
            var resizefunc = [];
        </script>

        <!-- jQuery  -->
        <script src="assets/js/jquery.min.js"></script>
        <script src="assets/js/bootstrap.bundle.min.js"></script>
        <script src="assets/js/detect.js"></script>
        <script src="assets/js/fastclick.js"></script>
        <script src="assets/js/jquery.slimscroll.js"></script>
        <script src="assets/js/jquery.blockUI.js"></script>
        <script src="assets/js/waves.js"></script>
        <script src="assets/js/wow.min.js"></script>
        <script src="assets/js/jquery.nicescroll.js"></script>
        <script src="assets/js/jquery.scrollTo.min.js"></script>

        <!-- Datatables-->
        <!-- Required datatable js-->
        <script src="plugins/datatables/jquery.dataTables.min.js"></script>
        <script src="plugins/datatables/dataTables.bootstrap4.min.js"></script>
        <!-- Buttons examples -->
        <script src="plugins/datatables/dataTables.buttons.min.js"></script>
        <script src="plugins/datatables/buttons.bootstrap4.min.js"></script>
        
        <script src="plugins/datatables/jszip.min.js"></script>
        <script src="plugins/datatables/pdfmake.min.js"></script>
        <script src="plugins/datatables/vfs_fonts.js"></script>
        <script src="plugins/datatables/buttons.html5.min.js"></script>
        <script src="plugins/datatables/buttons.print.min.js"></script>
        <script src="plugins/datatables/dataTables.fixedHeader.min.js"></script>
        <script src="plugins/datatables/dataTables.keyTable.min.js"></script>
        <script src="plugins/datatables/dataTables.scroller.min.js"></script>

        <!-- Responsive examples -->
        <script src="plugins/datatables/dataTables.responsive.min.js"></script>
        <script src="plugins/datatables/responsive.bootstrap4.min.js"></script>

        <!-- Datatable init js -->
        <script src="assets/pages/datatables.init.js"></script>

        <script src="assets/js/jquery.app.js"></script>
        
        <script>
            
            function hide_element(x) {
        document.querySelector(x).style.display='none';
}

function show_element(x) {
        document.querySelector(x).style.display='block';
}

function triggerClick(x){
 document.querySelector(x).click();
}

function show_settings_modal(y,val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {setting_id: y, item: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

      function show_trans_modal(y,val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {user: y, trans_id: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

      function show_wallet_modal(val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {wallet_id: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

function show_del_modal(y,val,x,b,p) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {user: y, del_id: val, para: p},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}

function show_del_settings(y,val,x,b) {
        show_element('#loader');
	$.ajax({
	type: "POST",
	url: 'includes/ajax.php',
        data: {setting_del: y, del_set_id: val},
	success: function(data){
		$(x).html(data);
                hide_element('#loader');
                triggerClick(b);
	}
	});
}
    </script>

        <script>
            $(document).ready(function() {
                $('#datatable').dataTable();
                $('#datatable2').dataTable();
                $('#datatable3').dataTable();
                $('#datatable-keytable').DataTable( { keys: true } );
                $('#datatable-responsive').DataTable();
                $('#datatable-scroller').DataTable( { ajax: "plugins/datatables/json/scroller-demo.json", deferRender: true, scrollY: 380, scrollCollapse: true, scroller: true } );
                var table = $('#datatable-fixed-header').DataTable( { fixedHeader: true } );
            } );
            TableManageButtons.init();
        </script>