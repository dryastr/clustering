<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('data-barang-keluar/update') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title"><strong>Edit Data Barang Masuk</strong></h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <input type="hidden" name="id" value="<?= $databarangkeluar->id ?>">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="barang_id">Kode Barang :</label>
                            <select name="barang_id" id="barang_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Kode Barang</option>
                                <?php foreach ($barang as $item) : ?>
                                    <option value="<?= $item->id ?>" <?= ($item->id == $databarangkeluar->barang_id) ? 'selected' : '' ?>>
                                        <?= $item->kode_barang ?>
                                    </option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal :</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" value="<?= $databarangkeluar->tanggal ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="jumlah">Jumlah :</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" value="<?= $databarangkeluar->jumlah ?>" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan :</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $databarangkeluar->keterangan ?>" required />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan Perubahan <i class="fa fa-save"></i></button>
                </div>
            </form>
        </div>
    </div>
</div>
