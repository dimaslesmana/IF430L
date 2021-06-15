<!DOCTYPE html>
<html>

<head>
	<title> Code Igniter MVC </title>
	<?php echo $style; ?>
</head>

<body>
	<?php echo $navbar; ?>
	<br />
	<br />
	<br />
	<div class="container-fluid">
		<div style="border-bottom: 1px solid black;">
			<p style="text-align: center;">
				<font size="7" color="black"> Edit Movie </font>
				<font size="5" color="rgb(127,127,127)"> WebDB Cinemaks </font>
			</p>
		</div>
	</div>
	<div class="container" style="margin-top: 35px;">
		<?php
		if (isset($movie)) {
			foreach ($movie as $m) {
				echo form_open_multipart('MoviePage/edit');
		?>
				<input type="hidden" name="default_poster" value="<?= $m['PosterLink']; ?>">
				<div class="form-group row">
					<label for="movie_id" class="col-sm-2 col-form-label">Movie ID :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="movie_id" id="movie_id" value="<?= $m['MovieID']; ?>" required readonly>
					</div>
				</div>
				<div class="form-group row<?= (form_error('title')) ? ' has-error' : ''; ?>">
					<label for="title" class="col-sm-2 col-form-label">Title :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="title" id="title" placeholder="Title" value="<?= $m['Title']; ?>" autofocus>
						<?= form_error('title'); ?>
					</div>
				</div>
				<div class="form-group row<?= (form_error('year')) ? ' has-error' : ''; ?>">
					<label for="year" class="col-sm-2 col-form-label">Year :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="year" id="year" placeholder="Year" value="<?= $m['Year']; ?>">
						<?= form_error('year'); ?>
					</div>
				</div>
				<div class="form-group row<?= (form_error('director')) ? ' has-error' : ''; ?>">
					<label for="director" class="col-sm-2 col-form-label">Director :</label>
					<div class="col-sm-10">
						<input type="text" class="form-control" name="director" id="director" placeholder="Director" value="<?= $m['Director']; ?>">
						<?= form_error('director'); ?>
					</div>
				</div>
				<div class="form-group row<?= (form_error('poster')) ? ' has-error' : ''; ?>">
					<label for="poster" class="col-sm-2 col-form-label">Poster :</label>
					<div class="col-sm-2">
						<img src="<?= base_url($m['PosterLink']); ?>" class="img-thumbnail img-preview">
					</div>
					<div class="col-sm-8 custom-file">
						<input type="file" class="custom-file-input" id="poster" name="poster">
						<?= form_error('poster'); ?>
						<?php if (isset($upload_error)) : ?>
							<?= $upload_error; ?>
						<?php endif; ?>
					</div>
				</div>
				<div>
					<button type="submit" name="submit" class="btn btn-primary">Edit Movie</button>
					<a href="<?= base_url(); ?>" class="btn btn-danger">Cancel</a>
				</div>
		<?php }
		} ?>
		<?php echo form_close(); ?>
	</div>
	<?php echo $footer; ?>
	<?php echo $script; ?>
</body>

</html>