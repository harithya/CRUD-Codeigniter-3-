<div class="row mt-5">
    <div class="col-md-12">
        <button class="btn btn-primary mb-5" data-toggle="modal" data-target="#modalAdd">
            Tambah
        </button>
        <?php if ($this->session->flashdata('message')) : ?>
            <div class="alert alert-success">
                <?= $this->session->flashdata('message'); ?>
            </div>
        <?php endif; ?>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Alamat</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($mahasiswa as $index => $mhs) : ?>
                    <tr>
                        <td><?= $index + 1 ?></td>
                        <td><?= $mhs['nama'] ?></td>
                        <td><?= $mhs['email'] ?></td>
                        <td><?= ($mhs['jenis_kelamin'] == "L") ? 'Laki-Laki' : 'Perempuan' ?></td>
                        <td><?= $mhs['alamat']; ?></td>
                        <td>
                            <div class="dropdown">
                                <button class="btn btn-transparent dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="ti ti-view-list-alt"></i>
                                </button>
                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item update" data-id="<?= $mhs['id']; ?>" href="#"><i class="ti ti-pencil-alt pr-2"></i> Update</a>
                                    <a class="dropdown-item" onclick="return confirm('Apakah Yakin ?')" href="<?= site_url('mahasiswa/delete/') . $mhs['id'] ?>"><i class="ti ti-trash pr-2"></i> Delete</a>
                                </div>
                            </div>
                        </td>
                    </tr>
                <?php endforeach ?>
            </tbody>
        </table>
    </div>
</div>