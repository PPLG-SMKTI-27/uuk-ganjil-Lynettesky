<div class="container">
    <div class="header-links">
        <a href="/auth/logout">Logout</a>
    </div>

    <h2>Manage Semua Izin</h2>

    <table>
        <tr>
            <th>ID</th>
            <th>Siswa</th>
            <th>Kelas</th>
            <th>Tanggal</th>
            <th>Alasan</th>
            <th>Status</th>
            <th>Approved By</th>
            <th>Aksi</th>
        </tr>
        <?php foreach($data['leaves'] as $leave): ?>
        <tr>
            <td><?= $leave['id_request'] ?></td>
            <td><?= $leave['nama_siswa'] ?></td>
            <td><?= $leave['nama_kelas'] ?></td>
            <td><?= $leave['date'] ?></td>
            <td><?= $leave['reason'] ?></td>
            <td><?= ucfirst($leave['status']) ?></td>
            <td><?= $leave['wali_name'] ?? '-' ?></td>
            <td>
                <?php if($leave['status']=='pending'): ?>
                    <a class="table-btn approve" href="/admin/approve/<?= $leave['id_request'] ?>">Approve</a>
                    <a class="table-btn reject" href="/admin/reject/<?= $leave['id_request'] ?>">Reject</a>
                <?php else: ?>
                    -
                <?php endif; ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
</div>
