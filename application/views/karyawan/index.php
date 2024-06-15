<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header d-flex align-items-center">
                <h4 class="card-title text-center flex-grow-1"><strong>Management User</strong></h4>
                <div class="ml-auto">
                    <a href="<?= base_url() ?>karyawan/create" class="btn btn-success btn-sm btn-add-user" style="background-color: #FFD700; color: black;">Tambah User</a>
                </div>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-striped datatable">
                        <thead>
                            <th>No</th>
                            <th>Nama</th>
                            <th>Username</th>
                            <th>Role</th>
                            <th width="20%">Aksi</th>
                            <!-- <th></th> -->
                        </thead>
                        <tbody>
                            <?php foreach ($karyawan as $i => $k) : ?>
                                <tr>
                                    <td><?= $i + 1 ?></td>
                                    <td><span><?= $k->nama ?></span></td>
                                    <td><span><?= $k->username ?></span></td>
                                    <td><span><?= $k->level ?></td>
                                    <td>
                                        <a href="<?= base_url('karyawan/edit/' . $k->id_user) ?>" class="btn btn-primary btn-sm" title="Edit"><i class="fa fa-edit"></i> Edit</a>
                                        <a href="<?= base_url('karyawan/delete/' . $k->id_user) ?>" class="btn btn-danger btn-sm ml-2" onclick="return confirm('Apakah Anda yakin ingin menghapus barang ini?')" title="Hapus"><i class="fa fa-trash"></i> Hapus</a>
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

<div class="modal fade" id="modal-add-user" tabindex="-1" role="dialog" aria-labelledby="modal-add-user-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-add-user" action="<?= base_url('karyawan/store') ?>" method="post" onsubmit="return false">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-add-user-label">Tambah User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Lengkap:</label>
                        <input type="text" name="nama" id="nama" class="form-control" placeholder="Masukkan Nama Lengkap" required="reuired" />
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telp : </label>
                        <input type="text" name="telp" id="telp" class="form-control" placeholder="Masukan No. Telp" required="reuqired" />
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail : </label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Masukan Email" required="reuqired" />
                    </div>
                    <div class="form-group">
                        <label for="divisi">Kelas : </label>
                        <select name="divisi" id="divisi" class="form-control">
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            <?php foreach ($divisi as $d) : ?>
                                <option value="<?= $d->id_divisi ?>"><?= $d->nama_divisi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Akun</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" class="form-control" placeholder="Masukan Username" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********" required="reuqired" />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="modal-edit-user" tabindex="-1" role="dialog" aria-labelledby="modal-edit-user-label" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form id="form-edit-user" action="<?= base_url('karyawan/update') ?>" method="post" onsubmit="return false">
                <div class="modal-header">
                    <h5 class="modal-title" id="modal-edit-user-label">Edit User</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit-nama-divisi">Nama Kelas :</label>
                        <input type="hidden" name="id_user" id="edit-id_user">
                        <input type="text" name="nama" id="edit-nama" class="form-control" placeholder="Nama Lengkap" required="reuired" />
                    </div>
                    <div class="form-group">
                        <label for="telp">No. Telp : </label>
                        <input type="text" name="telp" id="telp" value="<?= $karyawan->telp ?>" class="form-control" placeholder="Masukan No. Telp" required="reuqired" />
                    </div>
                    <div class="form-group">
                        <label for="email">E-mail : </label>
                        <input type="email" name="email" id="email" value="<?= $karyawan->email ?>" class="form-control" placeholder="Masukan Email" required="reuqired" />
                    </div>
                    <div class="form-group">
                        <label for="divisi">Kelas : </label>
                        <select name="divisi" id="divisi" value="<?= $karyawan->divisi ?>" class="form-control">
                            <option value="" disabled selected>-- Pilih Kelas --</option>
                            <?php foreach ($divisi as $d) : ?>
                                <option value="<?= $d->id_divisi ?>" <?= ($d->id_divisi == $karyawan->divisi) ? 'selected' : '' ?>><?= $d->nama_divisi ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                </div>
                <div class="card-body border-top py-0 my-3">
                    <h4 class="text-muted my-3">Akun</h4>
                    <div class="row">
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="username">Username</label>
                                <input type="text" name="username" id="username" value="<?= $karyawan->username ?>" class="form-control" placeholder="Masukan Username" required="reuqired" />
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" id="password" class="form-control" placeholder="********" />
                                <span class="text-danger">Tidak perlu diisi jika tidak ingin diganti!</span>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>