<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<div class="col-md-8">
						<form action="<?= base_url('Barang/index/') ?>" style="float: left;" method="get">
							<input type="submit" name="search_submit">
							<input type="text" name="keyword" placeholder="search">
						</form>
					</div>
					<div class="col-md-4">
						<a href="#tambah" style="float: right;" class="btn btn-primary" data-toggle="modal"><span class="glyphicon glyphicon-plus"></span>Tambah</a><br>
					</div>
				</div>

				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>NO</th>
								<th>NAMA BARANG</th>
								<th>KATEGORI</th>
								<th>INSTANSI</th>
								<th>FOTO</th>
								<th>DESKRIPSI</th>
								<th>STATUS</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<img src="" alt="">
							<?php
							$no = 0;
							foreach ($data_barang as $dt) {
								$no++;
								echo '<tr>
										<td>' . $no . '</td>
										<td>' . $dt->nama_barang . '</td>
										<td>' . $dt->kategori . '</td>
										<td>' . $dt->nama_instansi . '</td>										
										<td> <img style="width: 100px; height:100px;" src="' . base_url('assets/uploads/') . $dt->foto . '" alt="' . $dt->nama_barang . '"></td>
										<td> ' . $dt->keterangan . '</td>
										<td> ' . $dt->status . '</td>
										<td>
										<a href="" class="btn btn-warning" data-toggle="modal" data-target="#update_pegawai' . $dt->id_barang . '"  data-popup="tooltip" data-placement="top" >Update</a> 
										<a href="' . base_url('Barang/hapus_barang/' . $dt->id_barang) . '" class="btn btn-danger" data-toggle="modal" onclick="return confirm(\'anda yakin?\')">Delete</a></td>
									  </tr>';
							}
							?>
						</tbody>
					</table>
				</div>
			</div>
			</table>
			<?php if ($this->session->flashdata('pesan') != null) : ?>
				<div class="alert alert-danger">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button><?= $this->session->flashdata('pesan'); ?>
				</div>
			<?php endif ?>
			<!-- Modal -->
			<div class="modal fade" id="tambah">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
							<h4 class="modal-title" id="myModalLabel">Tambah Barang</h4>
						</div>
						<form action="<?= base_url('Barang/simpan_barang') ?>" method="post" enctype="multipart/form-data">
							<div class="modal-body">
								<label for="nama_barang">Nama Barang</label>
								<input type="text" id="nama_barang" name="nama_barang" class="form-control" required><br>

								<label for="id_instansi">Instansi</label>
								<select name="id_instansi" id="id_instansi" class="form-control" required>
									<?php foreach ($in as $i) : ?>
										<option value="<?= $i->id_instansi ?>"><?= $i->nama_instansi ?></option>
									<?php endforeach; ?>
								</select><br>

								<label for="idKategori">Kategori Barang</label>
								<select name="idKategori" id="idKategori" class="form-control" required>
									<?php foreach ($k as $i) : ?>
										<option value="<?= $i->idKategori ?>"><?= $i->kategori ?></option>
									<?php endforeach; ?>
								</select><br>

								<label for="foto">Foto Barang</label>
								<input type="file" id="foto" name="foto" class="form-control" required><br>

								<label for="status">Status Barang</label>
								<select name="status" id="status" class="form-control" required>
									<option value="Tersedia">Tersedia</option>
									<option value="Dipinjam">Dipinjam</option>
								</select><br>

								<label for="deskripsi">Deskripsi Barang</label>
								<textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"></textarea>
							</div>
							<div class="modal-footer">
								<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
								<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
							</div>
						</form>
					</div>
				</div>
			</div>

			<?php $no = 0;
			foreach ($data_barang as $row) : $no++; ?>
				<div class="row">
					<div id="update_pegawai<?= $row->id_barang; ?>" class="modal fade">
						<div class="modal-dialog">
							<div class="modal-content">
								<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
									<h4 class="modal-title" id="myModalLabel">Update pegawai</h4>
								</div>
								<form action="<?= base_url('Barang/update_barang/') . $row->id_barang ?>" method="post" enctype="multipart/form-data">
									<div class="modal-body">
										<label for="nama_barang">Nama Barang</label>
										<input type="text" id="nama_barang" name="nama_barang" class="form-control" value="<?= $row->nama_barang ?>" required><br>

										<label for="id_instansi">Instansi</label>
										<select name="id_instansi" id="id_instansi" class="form-control" required>
											<?php foreach ($in as $i) : ?>
												<option <?php if ($row->id_instansi == $i->id_instansi) {
															echo "selected";
														} ?> value="<?= $i->id_instansi ?>"><?= $i->nama_instansi ?></option>
											<?php endforeach; ?>
										</select><br>

										<label for="idKategori">Kategori Barang</label>
										<select name="idKategori" id="idKategori" class="form-control" required>
											<?php foreach ($k as $i) : ?>
												<option <?php if ($row->idKategori == $i->idKategori) {
															echo "selected";
														} ?> value="<?= $i->idKategori ?>"><?= $i->kategori ?></option>
											<?php endforeach; ?>
										</select><br>

										<label for="foto">Foto Barang</label>
										<input type="file" id="foto" name="foto" class="form-control"><br>

										<!-- <label for="status">Status Barang</label>
										<select name="status" id="status" class="form-control" required>
											<option <?php if ($row->status == "Tersedia") {
														echo "selected";
													} ?> value="Tersedia">Tersedia</option>
											<option <?php if ($row->status == "Dipinjam") {
														echo "selected";
													} ?> value="Dipinjam">Dipinjam</option>
										</select><br> -->

										<label for="deskripsi">Deskripsi Barang</label>
										<textarea name="deskripsi" class="form-control" id="deskripsi" cols="30" rows="10"><?= $row->keterangan ?></textarea>

									</div>
									<div class="modal-footer">
										<input type="submit" name="simpan" value="Simpan" class="btn btn-success">
										<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			<?php endforeach; ?>
		</div>
	</div>
</div>
