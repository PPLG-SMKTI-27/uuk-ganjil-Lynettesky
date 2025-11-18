<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard Siswa</title>
</head>
<body>

  <h2>Halo, <?= htmlspecialchars($siswa['nama']) ?> (Kelas <?= htmlspecialchars($siswa['id_kelas']) ?>)</h2>
  <p><a href="?url=siswacontroller/leave_add">Ajukan Izin</a> | <a href="?url=authcontroller/logout">Logout</a></p>

  <h3>Riwayat Izin</h3>
  <table border="1" cellpadding="6">
    <tr>
      <th>Tanggal</th><th>Alasan</th><th>Status</th><th>Approved By</th><th>Approved At</th>
    </tr>
    <?php if (!empty($leaves)): ?>
    <?php foreach ($leaves as $leave): ?>
        <tr>
            <td><?= htmlspecialchars($leave['tanggal']) ?></td>
            <td><?= htmlspecialchars($leave['alasan']) ?></td>
            <td><?= htmlspecialchars($leave['status']) ?></td>
            <td><?= htmlspecialchars($leave['approved_by'] ?? '-') ?></td>
            <td><?= htmlspecialchars($leave['approved_at'] ?? '-') ?></td>
        </tr>
    <?php endforeach; ?>
    <?php else: ?>
        <tr><td colspan="5">Belum ada riwayat izin</td></tr>
    <?php endif; ?>
    </table>
</body>
</html>