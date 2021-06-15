<script src="<?php echo base_url('assets/js/jquery-1.12.4.js'); ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.min.js'); ?>"></script>

<?php foreach ($crud['js_files'] as $file): ?>
<script src="<?= $file; ?>"></script>
<?php endforeach; ?>

<script>
	$(document).ready(function() {
	})
</script>