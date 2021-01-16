<!-- END MAIN -->
<div class="clearfix"></div>
<footer>
</footer>
</div>
<!-- END WRAPPER -->
<!-- Javascript -->

<script src="<?= base_url() ?>assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/jquery.easy-pie-chart/jquery.easypiechart.min.js"></script>
<script src="<?= base_url() ?>assets/vendor/chartist/js/chartist.min.js"></script>
<script src="<?= base_url() ?>assets/scripts/klorofil-common.js"></script>
<script>
	$(document).ready(function() {
		$('#tabel').DataTable({

			"processing": true, //Feature control the processing indicator.
			"serverSide": true, //Feature control DataTables' server-side processing mode.
			"order": [], //Initial no order.

			//Set column definition initialisation properties.
			"columnDefs": [{
				"targets": [-1, -2, 0], //last column
				"orderable": false, //set not orderable
			}, ],

		});
	});	
</script>
</body>

</html>
