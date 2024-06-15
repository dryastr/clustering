<div class="row">
	<div class="col-12">
		<div class="card">
			<form action="<?= base_url('tentukan-clustering/process') ?>" method="post">
				<div class="card-header">
					<h4 class="card-title"><strong>Tentukan Clustering</strong></h4>
				</div>
				<div class="card-body border-top py-0 my-3">
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="type_centroid">Type Centroid :</label>
								<select name="type_centroid" id="type_centroid" class="form-control" required>
									<option value="mean">Rata-rata Nilai</option>
									<option value="random">Random Centroid</option>
								</select>
							</div>
						</div>
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="num_clusters">Jumlah Cluster :</label>
								<input type="number" name="num_clusters" id="num_clusters" class="form-control" placeholder="Masukkan Jumlah Cluster" required />
							</div>
						</div>
					</div>
					<div class="row">
						<div class="col-xs-12 col-sm-6">
							<div class="form-group">
								<label for="max_iterations">Max Perulangan :</label>
								<input type="number" name="max_iterations" id="max_iterations" class="form-control" placeholder="Masukkan Max Perulangan" required />
							</div>
						</div>
					</div>
				</div>
				<div class="card-footer">
					<button type="submit" class="btn btn-primary">Simpan <i class="fa fa-save"></i></button>
				</div>
			</form>
		</div>
	</div>
</div>