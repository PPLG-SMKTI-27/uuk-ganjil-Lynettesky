<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Review Izin</title>
</head>
<body>
  <h2>Review Izin</h2>
  <p>Nama: <?= htmlspecialchars($leave['nama']) ?> (Kelas <?= htmlspecialchars($leave['kelas']) ?>)</p>
  <p>Tanggal: <?= htmlspecialchars($leave['tanggal']) ?></p>
  <p>Alasan: <?= htmlspecialchars($leave['alasan']) ?></p>

  <form method="post" action="?url=walicontroller/leave_review/<?= urlencode($leave['id_leave']) ?>">
    <button type="submit" name="action" value="approve">Approve</button>
    <button type="submit" name="action" value="reject">Reject</button>
  </form>

  <p><a href="?url=walicontroller/dashboard">Kembali</a></p>
</body>
</html>