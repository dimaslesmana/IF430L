<div class="container">
    <table class="table table-striped table-bordered" cellspacing="0">
        <thead>
            <tr>
                <th>Nama Mahasiswa</th>
                <th>Nomor Induk Mahasiswa</th>
                <th>Email Mahasiswa</th>
                <th>Tugas</th>
                <th>UTS</th>
                <th>UAS</th>
                <th>Grade</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($mahasiswa as $row) : ?>
            <tr class="text-center">
                <td style="vertical-align: middle;"><?= $row['fullName']; ?></td>
                <td style="vertical-align: middle;"><?= $row['nim']; ?></td>
                <td style="vertical-align: middle;"><?= $row['email']; ?></td>
                <td style="vertical-align: middle;"><?= $row['nilai_tugas']; ?></td>
                <td style="vertical-align: middle;"><?= $row['nilai_uts']; ?></td>
                <td style="vertical-align: middle;"><?= $row['nilai_uas']; ?></td>
                <td style="vertical-align: middle;"><?= $row['grade']; ?></td>
                <td style="vertical-align: middle;"><a class="btn btn-link" href="<?= site_url('mahasiswa/delete/' . $row['id_mahasiswa']); ?>"><i class="fa fa-close"></i></a></td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>