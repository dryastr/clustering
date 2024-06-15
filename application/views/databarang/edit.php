<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('data-barang/update') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title"><strong>Edit Data Barang</strong></h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <input type="hidden" name="id_barang" value="<?= $barang->id ?>">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang :</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" value="<?= $barang->kode_barang ?>" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang :</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" value="<?= $barang->nama_barang ?>" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan :</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" value="<?= $barang->keterangan ?>" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="stok">Stok :</label>
                                <input type="number" name="stok" id="stok" class="form-control" value="<?= $barang->stok ?>" required />
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