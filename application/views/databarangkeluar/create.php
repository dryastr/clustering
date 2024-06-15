<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('data-barang-keluar/store') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title"><strong>Tambah Data Barang Masuk</strong></h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <div class="row">
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label for="kode_barang">Kode Barang :</label>
                            <select name="barang_id" id="barang_id" class="form-control" required>
                                <option value="" disabled selected>Pilih Kode Barang</option>
                                <?php foreach ($barang as $b) : ?>
                                    <option value="<?= $b->id ?>"><?= $b->kode_barang ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="tanggal">Tanggal :</label>
                                <input type="date" name="tanggal" id="tanggal" class="form-control" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="jumlah">Jumlah :</label>
                                <input type="number" name="jumlah" id="jumlah" class="form-control" placeholder="Masukkan Jumlah" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="jumlah">Keterangan :</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan" required />
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
