<div class="row">
    <div class="col-12">
        <div class="card">
            <form action="<?= base_url('data-barang/store') ?>" method="post">
                <div class="card-header">
                    <h4 class="card-title"><strong>Tambah Data Barang</strong></h4>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="kode_barang">Kode Barang :</label>
                                <input type="text" name="kode_barang" id="kode_barang" class="form-control" placeholder="Masukkan Kode Barang" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="nama_barang">Nama Barang :</label>
                                <input type="text" name="nama_barang" id="nama_barang" class="form-control" placeholder="Masukkan Nama Barang" required />
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="keterangan">Keterangan :</label>
                                <input type="text" name="keterangan" id="keterangan" class="form-control" placeholder="Masukkan keterangan" required />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="stok">Stok :</label>
                                <input type="number" name="stok" id="stok" class="form-control" placeholder="Masukkan Stok" required />
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