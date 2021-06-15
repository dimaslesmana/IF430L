<script src="<?php echo base_url('assets/js/jquery-1.12.4.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>
<!--

	Data Tables

-->
<script src="<?php echo base_url('assets/datatables/js/jquery.dataTables.min.js'); ?>"></script>
<script src="<?php echo base_url('assets/datatables/js/dataTables.bootstrap.min.js'); ?>"></script>


<script>
	$(document).ready(function() {
		$('#tblMovie').DataTable();

		$('#poster').on('change', function() {
			const file = $(this).get(0).files;
			const reader = new FileReader();
			reader.readAsDataURL(file[0]);
			reader.addEventListener('load', function(e) {
				const image = e.target.result;
				$('.img-preview').attr('src', image);
			});
		});
	})
</script>