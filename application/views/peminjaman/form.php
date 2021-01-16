<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div style="margin-left: 15px; margin-bottom: 25px;">
				<h2>Form Pengajuan Barang</h2>
			</div>
			<form action="<?= base_url('Peminjaman/ins_pengajuan'); ?>" class="form-group" method="POST">
				<div class="form-row">
					<div hidden>
						<input type="text" id="idbrg" name="idbrg" class="form-control" value="<?= $barang->id_barang; ?>" readonly>
					</div>
					<div class="col-md-6 mb-3" style="margin-bottom: 15px;">
						<label for="nip">NIP</label>
						<input type="text" id="nip" name="nip" class="form-control" placeholder="NIP" required>
					</div>
					<div class="col-md-6 mb-3" style="margin-bottom: 15px;">
						<label for="hp">NO HP</label>
						<input type="text" id="hp" name="hp" class="form-control" placeholder="No Whatsapp" required>
					</div>
					<div class="col-md-12 mb-3" style="margin-bottom: 15px;">
						<label for="nama">Nama Peminjam</label>
						<input type="text" id="nama" name="nama" class="form-control" placeholder="Nama" required>
					</div>
					<div class="col-md-12 mb-3" style="margin-bottom: 15px;">
						<label for="brg">Barang yang dipinjam</label>
						<input type="text" id="brg" name="brg" class="form-control" value="<?= $barang->nama_barang; ?>" readonly>
						
					</div>
					<div class="col-md-6 mb-3" style="margin-bottom: 15px;">
						<label for="tgl1">Tanggal Diambil</label>
						<input type="date" id="pinjam" name="pinjam" min="<?= date('Y-m-d', strtotime("+2 days")); ?>" class="form-control" required>
					</div>
					<div class="col-md-6 mb-3" style="margin-bottom: 15px;">
						<label for="tgl1">Tanggal Dikembalikan</label>
						<input type="date" id="bali" name="bali" min="<?= date('Y-m-d', strtotime("+3 days")); ?>" class="form-control" required>
					</div>
					<div class="col-md-12 mb-3" style="margin-bottom: 15px;">
						<label for="ket"> Keperluan </label>
						<textarea class="form-control" id="ket" name="ket" id="keterangan" cols="10" rows="6" required></textarea>
					</div>
					<button class="btn btn-primary" style="float: right; margin-left: 5px; margin-right: 15px;" type="submit"><b>Submit</b></button>
					<a class="btn btn-danger" style="float: right;" href="<?= base_url('Dashboard'); ?>"><b>Cancel</b></a>
				</div>
			</form>
		</div>
	</div>
</div>
<!-- END MAIN CONTENT -->
