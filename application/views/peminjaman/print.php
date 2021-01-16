<style>
	table {
		border-collapse: collapse;
		width: 100%;
	}

	th,
	td {
		text-align: left;
		padding: 8px;
	}

	tr:nth-child(even) {
		background-color: #f2f2f2;
	}
</style>
<center>
	<h1>Hai, DEAK HANUM</h1>
</center>
<div style="overflow-x:auto;">
	<table>
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
		</tr>
		<?php $no = 1;
		foreach ($pp as $d) : ?>
			<tr>
				<td><?= $no ?></td>
				<td><?= $d->tgl_pengajuan ?></td>
				<td><?= $d->nip ?></td>
				<td><?= $d->nama_peminjam ?></td>
				<td><?= $d->tgl_pinjam ?></td>
				<td><?= $d->tgl_kembali ?></td>
				<td><?= $d->keperluan ?></td>
				<td><?= $d->nama_barang ?></td>
				<td><?= $d->status ?></td>
			</tr>
		<?php $no++;
		endforeach ?>
	</table>
</div>
<footer class="blockquote-footer text-right">IsmetMA</footer>
