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
						<li class="breadcrumb-item"><a href="<?= base_url('admin/C_dashboard') ?>">Beranda</a></li>
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
						<a href="#" class="btn btn-danger text-bold float-right mr-4" data-target="#modalRefresh"
							data-toggle="modal">Hapus Semua
						</a>
					</div>
					<div class="card-body table-responsive">
						<table id="riwayat" class="table table-hover p-2">
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
									<td class="text-center"><?= $r->hasil; ?></td>
									<?php if ($r->grade == "Grade-A") {
										$text = 'success';
									} elseif ($r->grade == "Grade-B") {
										$text = 'warning';
									}else {
										$text = 'danger';
									}?>
									<td class="text-center"><span class="badge badge-<?= $text?>"><?= $r->grade; ?></span></td>
									<td class="text-center"><?= $r->tanggal; ?></td>
									
									</td>
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
<!-- modal hapus end -->

<!-- modal hapus -->
<div class="modal fade" id="modalRefresh" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<h4 class="modal-title">Hapus Semua</h4>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body justify-content-center">
				<div>
					<h5>Apakah Anda yakin untuk menghapus semua data hasil ini?</h5>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-outline-default" data-dismiss="modal">Batal</button>
				<a href="<?=base_url('admin/C_riwayat/clear')?>" class="btn btn-danger">Hapus</a>
			</div>
		</div>
	</div>
</div>
<!-- modal hapus end -->
