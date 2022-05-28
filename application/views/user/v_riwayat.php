<div class="content-wrapper">
	<!-- Content Header (Page header) -->
	<section class="content-header">
		<div class="container-fluid">
			<div class="row mb-2">
				<div class="col-sm-6">
					<h1><?= $title; ?></h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
						<li class="breadcrumb-item"><a href="<?= base_url('user/C_beranda') ?>">Beranda</a></li>
						<li class="breadcrumb-item active"><?= $title; ?></li>
					</ol>
				</div>
			</div>
		</div><!-- /.container-fluid -->
		<div class="flash-data" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>

	</section>
	<section class="content">
		<div class="row">
			<div class="col-12">
				<div class="card">
					<div class="card-header bg-dark">
							<h3 class="card-title text-bold float-left">Tabel <?= $title; ?></h3>
					</div>
					<div class="card-body table-responsive p-0">
						<table class="table table-hover">
							<thead>
								<tr class="text-center">
									<th>No</th>
									<th>Suhu</th>
									<th>Salinitas</th>
									<th>Ph</th>
									<th>Fuzzy Set</th>
									<th>Hasil</th>
									<th>Grade</th>
									<th>Tanggal</th>
								</tr>
							</thead>
							<tbody>
								<?php $no = 1;
									foreach ($riwayat as $r):
										$id = $r->id_sensor
								?>
								<tr>
									<td class="text-center"><?= $no; ?></td>
									<td class="text-center"><?= $r->suhu; ?></td>
									<td class="text-center"><?= $r->salinitas; ?></td>
									<td class="text-center"><?= $r->ph; ?></td>
									<?php if ($r->fuzzy_set == "BAIK") {
										$fuzzy = 'success';
									} elseif ($r->fuzzy_set == "BURUK") {
										$fuzzy = 'danger';
									}?>
									<td class="text-center"><span class="badge badge-<?= $fuzzy?>"><?= $r->fuzzy_set; ?></span></td>

									<!-- <td class="text-center"><?= $r->fuzzy_set; ?></td> -->
									<td class="text-center"><?= $r->hasil; ?></td>
									<?php if ($r->grade == "GRADE-A") {
										$text = 'success';
									} elseif ($r->grade == "GRADE-B") {
										$text = 'warning';
									}else {
										$text = 'danger';
									}?>
									<td class="text-center"><span class="badge badge-<?= $text?>"><?= $r->grade; ?></span></td>
									<td class="text-center"><?= $r->tanggal; ?></td>
								</tr>
								<?php $no++; ?>
								<?php endforeach; ?>
							</tbody>
							<tfoot>
								<tr class="text-center">
								<th>No</th>
									<th>Suhu</th>
									<th>Salinitas</th>
									<th>Ph</th>
									<th>Fuzzy Set</th>
									<th>Hasil</th>
									<th>Grade</th>
									<th>Tanggal</th>
								</tr>
							</tfoot>
						</table>
					</div>
				</div>
			</div>
		</div>
	</section>
</div>
<!-- modal hapus -->
<?php foreach ($riwayat as $r):
	$id 	= $r->id_sensor;
	$grade 	= $r->grade;
	?>
<form action="<?php echo base_url() . 'user/C_riwayat/hapus' ?>" method="post">
	<div class="modal fade" id="modalHapus<?= $id; ?>" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header bg-danger">
					<h4 class="modal-title">Hapus</h4>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body justify-content-center">
					<div>
						<h5>Apakah Anda yakin untuk menghapus data dengan grade <b><?= $grade ?></b> ini?</h5>
					</div>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-outline-default" data-dismiss="modal">Tutup</button>
					<input type="hidden" name="delete_id" value="<?= $id; ?>" required>
					<button type="submit" class="btn btn-danger">Hapus</button>
				</div>
			</div>
		</div>
	</div>
</form>
<?php endforeach; ?>
<!-- modal hapus end -->
