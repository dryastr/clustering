<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex align-items-center">
				<h4 class="card-title text-center flex-grow-1"><strong>Management Barang</strong></h4>
				<div class="ml-auto">
					<?php if ($this->session->userdata('level') === 'Manager') : ?>
						<a href="<?= base_url() ?>data-barang/create" class="btn btn-success btn-sm btn-add-barang" style="background-color: #FFD700; color: black;">Tambah Barang</a>
						<a href="<?= base_url() ?>data-barang/cetak-pdf" class="btn btn-primary btn-sm ml-2">Cetak PDF</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Nama Barang</th>
							<th>keterangan</th>
							<th>Stok</th>
							<?php if ($this->session->userdata('level') === 'Manager') : ?>
								<th width="20%">Aksi</th>
							<?php endif; ?>
						</thead>
						<tbody>
							<?php foreach ($barang as $i => $b) : ?>
								<tr>
									<td><?= $i + 1 ?></td>
									<td><span><?= $b->kode_barang ?></span></td>
									<td><span><?= $b->nama_barang ?></span></td>
									<td><span><?= $b->keterangan ?></span></td>
									<td>
										<?php
										$stok_masuk = $this->BarangMasuk_model->get_stok_masuk_by_barang_id($b->id);
										$total_stok = $b->stok + $stok_masuk;
										echo $total_stok;
										?>
									</td>
									<td>
										<?php if ($this->session->userdata('level') === 'Manager') : ?>
											<a href="<?= base_url('data-barang/edit/' . $b->id) ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
											<a href="<?= base_url('data-barang/delete/' . $b->id) ?>" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
										<?php endif; ?>
									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>