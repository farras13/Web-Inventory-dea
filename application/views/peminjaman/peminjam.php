<!-- MAIN -->
<div class="main">
	<!-- MAIN CONTENT -->
	<div class="main-content">
		<div class="container-fluid">
			<div class="panel">
				<div class="panel-heading">
					<?php if ($this->session->flashdata('pesan') != null) : ?>
						<div class="alert alert-danger">
							<button type="button" class="close" data-dismiss="alert" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button><?= $this->session->flashdata('pesan'); ?>
						</div>
					<?php endif; ?>
					<?php if ($this->uri->segment(2) == "dikembalikan") : ?>
						<div class="col-md-12">
							<a href="<?= site_url('peminjaman/print') ?>" class="btn btn-primary" style="float: right;" target="_blank"><i class="fa fa-print"> Print </i> </a>
						</div>
					<?php endif; ?>
				</div>

				<div class="panel-body">
					<table class="table table-striped">
						<thead>
							<tr>
								<th>NO</th>
								<th>TGL PENGAJUAN</th>
								<th>NIP</th>
								<th>NAMA</th>
								<th>TGL PINJAM</th>
								<th>TGL KEMBALI</th>
								<th>KEPERLUAN</th>
								<th>BARANG</th>
								<th>STATUS</th>
								<th>ACTION</th>
							</tr>
						</thead>
						<tbody>
							<img src="" alt="">
							<?php
							$no = 0;
							foreach ($peminjam as $dt) {
								$no++;
								if ($dt->status == "mengajukan") {
									$sts = "Diambil";
								} else if ($dt->status == "Diambil") {
									$sts = "Dipakai";
								} else if ($dt->status == "Dipakai") {
									$sts = "Dikembalikan";
								} else if ($dt->status == "Dikembalikan") {
									$sts = "Done";
								} ?>
								<tr>
									<td><?= $no ?></td>
									<td><?= $dt->tgl_pengajuan ?></td>
									<td><?= $dt->nip ?></td>
									<td><?= $dt->nama_peminjam ?></td>
									<td><?= $dt->tgl_pinjam ?></td>
									<td><?= $dt->tgl_kembali ?></td>
									<td><?= $dt->keperluan ?></td>
									<td><?= $dt->nama_barang ?></td>
									<td><?= $dt->status ?></td>
									<?php if ($dt->status != "Ditolak") { ?>
										<td>
											<a href="<?= base_url('Peminjaman/status_upd/') . $sts . '/' . $dt->id_peminjam ?>" class="btn btn-success"> Diterima </a>
											<?php if ($this->uri->segment(2) == "pengajuan") : ?>
												<a href="<?= base_url('Peminjaman/status_upd/Ditolak1/') . $dt->id_peminjam ?>" class="btn btn-danger"> Ditolak </a>
											<?php else : ?>
												<a href="<?= base_url('Peminjaman/status_upd/Ditolak/') . $dt->id_peminjam ?>" class="btn btn-danger"> Ditolak </a>
											<?php endif ?>
										</td>
									<?php } ?>
								</tr>
							<?php }	?>
						</tbody>
					</table>
				</div>
			</div>
			</table>
		</div>
	</div>
</div>
