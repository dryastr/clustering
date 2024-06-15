<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex align-items-center">
				<h4 class="card-title text-center flex-grow-1"><strong>Management Barang Masuk</strong></h4>
				<div class="ml-auto">
					<?php if ($this->session->userdata('level') === 'Manager') : ?>
						<a href="<?= base_url() ?>data-barang-masuk/create" class="btn btn-success btn-sm btn-add-barang" style="background-color: #FFD700; color: black;">Tambah Barang</a>
					<?php endif; ?>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<th>No</th>
							<th>Kode Barang</th>
							<th>Tanngal</th>
							<th>Stok</th>
							<?php if ($this->session->userdata('level') === 'Manager') : ?>
								<th width="20%">Aksi</th>
							<?php endif; ?>
						</thead>
						<tbody>
							<?php foreach ($databarangmasuk as $i => $b) : ?>
								<tr>
									<td><?= $i + 1 ?></td>
									<td>
										<?php
										// Ambil kode barang dari tabel barang berdasarkan barang_id
										$barang = $this->Barang_model->get_barang_by_id($b->barang_id);
										if ($barang) {
											echo $barang->kode_barang;
										} else {
											echo "Kode Barang Tidak Ditemukan";
										}
										?>
									</td>
									<td><span><?= $b->tanggal ?></span></td>
									<td><span><?= $b->jumlah ?></span></td>
									<td>
										<?php if ($this->session->userdata('level') === 'Manager') : ?>
											<a href="<?= base_url('data-barang-masuk/edit/' . $b->id) ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
											<a href="<?= base_url('data-barang-masuk/delete/' . $b->id) ?>" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
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