<div class="row">
	<div class="col-12">
		<div class="card">
			<div class="card-header">
				<h4 class="card-title"><strong>Hasil Clustering</strong></h4>
			</div>
			<div class="card-body border-top py-0 my-3">
				<?php
				$current_iteration = -1;
				foreach ($clustering_results as $result) {
					if ($current_iteration != $result->iteration) {
						if ($current_iteration != -1) {
							echo "</tbody></table>";
						}
						$current_iteration = $result->iteration;
						echo "<h5>Iterasi ke-{$current_iteration}</h5>";
						echo "<table class='table'>
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Kode Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Keterangan</th>
                                        <th>Stok</th>
                                        <th>Cluster</th>
                                        <th>Distance</th>
                                    </tr>
                                </thead>
                                <tbody>";
					}
					echo "<tr>
                            <td>{$result->barang_id}</td>
                            <td>{$result->kode_barang}</td>
                            <td>{$result->nama_barang}</td>
                            <td>{$result->keterangan}</td>
                            <td>{$result->stok}</td>
                            <td>{$result->cluster_id}</td>
                            <td>{$result->distance}</td>
                          </tr>";
				}
				if ($current_iteration != -1) {
					echo "</tbody></table>";
				}
				?>
			</div>
		</div>
	</div>
</div>