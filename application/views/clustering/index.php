<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header d-flex align-items-center">
				<h4 class="card-title text-center flex-grow-1"><strong>Management Barang</strong></h4>
				<div class="ml-auto">
					<?php if ($this->session->userdata('level') === 'Manager') : ?>
						<form action="<?= base_url('clusteringdatabarangcontroller/uploadExcel'); ?>" method="post" enctype="multipart/form-data">
							<input type="file" name="file" accept=".xls,.xlsx" required>
							<button type="submit">Upload</button>
						</form>
					<?php endif; ?>
				</div>
			</div>
			<div class="card-body">
				<div class="table-responsive">
					<table class="table table-striped datatable">
						<thead>
							<tr>
								<th>No</th>
								<th>Kode Barang</th>
								<th>Nama Barang</th>
								<th>Keterangan</th>
								<th>Stok</th>
							</tr>
						</thead>
						<tbody>
							<?php if (!empty($clusters)) { ?>
								<?php $no = 1;
								foreach ($clusters as $cluster) { ?>
									<tr>
										<td><?= $no++; ?></td>
										<td><span><?= $cluster->kode_barang; ?></span></td>
										<td><span><?= $cluster->nama_barang; ?></span></td>
										<td><span><?= $cluster->keterangan; ?></span></td>
										<td><span><?= $cluster->stok; ?></span></td>
									</tr>
								<?php } ?>
							<?php } else { ?>
								<tr>
									<td colspan="6" class="text-center">Tidak ada data barang.</td>
								</tr>
							<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>