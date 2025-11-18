<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Dashboard Wali Kelas</title>
</head>
<body>
  <h2>Wali Kelas: <?= htmlspecialchars($wali['nama']) ?> (Kelas <?= htmlspecialchars($wali['kelas']) ?>)</h2>
  <p><a href="?url=authcontroller/logout">Logout</a></p>

  <?php if (!empty($msg)): ?>
    <p><?= htmlspecialchars($msg) ?></p>
  <?php endif; ?>

  <h3>Pengajuan Izin Pending</h3>
  <table border="1" cellpadding="6">
    <tr>
      <th>Nama Siswa</th><th>Tanggal</th><th>Alasan</th><th>Aksi</th>
    </tr>
    <?php foreach ($leaves as $lv): ?>
      <tr>
        <td><?= htmlspecialchars($lv['nama']) ?></td>
        <td><?= htmlspecialchars($lv['tanggal']) ?></td>
        <td><?= htmlspecialchars($lv['alasan']) ?></td>
        <td>
          <a href="?url=walicontroller/leave_review/<?= urlencode($lv['id_leave']) ?>">Review</a>
        </td>
      </tr>
    <?php endforeach; ?>
  </table>
</body>
</html>