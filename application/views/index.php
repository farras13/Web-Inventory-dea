<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<h2>Daftar Barang</h2><br>
			<?php foreach ($data_barang as $br) { ?>
				<tr>
					<div class="col-lg-4 col-md-6 mb-4">
						<img class="card-img-top" src="<?= base_url('assets/uploads/').$br->foto ?>" alt="Card image cap">
						<div class="card-body">
							<h5 class="card-title"><?php echo $br->nama_barang ?></h5>
							<p class="card-text"><?php echo $br->status ?></p>
							<a href="#" class="btn btn-primary">Go somewhere</a>
						</div>
					</div>
				</tr>
			<?php } ?>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
