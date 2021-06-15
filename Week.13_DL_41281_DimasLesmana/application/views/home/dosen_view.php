<div class="container">
    <table class="table table-striped table-bordered" cellspacing="0">
        <thead>
            <tr>
                <th>Nama</th>
                <th>Nomor Induk Dosen</th>
                <th>Email</th>
                <th>Foto</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($dosen as $row) : ?>
            <tr class="text-center">
                <td style="vertical-align: middle;"><?= $row['fname_dosen'] . " " . $row['lname_dosen']; ?></td>
                <td style="vertical-align: middle;"><?= $row['nomorinduk_dosen']; ?></td>
                <td style="vertical-align: middle;"><?= $row['email_dosen']; ?></td>
                <td style="vertical-align: middle;"><img src="<?= base_url($row['foto_dosen']); ?>" alt="Foto Dosen" width="150"></td>
                <td style="vertical-align: middle;"><a class="btn btn-link" href="<?= site_url('dosen/delete/' . $row['id_dosen']); ?>"><i class="fa fa-close"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>