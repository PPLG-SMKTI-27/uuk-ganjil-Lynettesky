<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Ajukan Izin</title>
</head>
<body>
  <h2>Ajukan Izin - <?= htmlspecialchars($siswa['nama']) ?></h2>
  <form method="post" action="?url=siswacontroller/leave_add">
    <label>Tanggal</label>
    <input type="date" name="tanggal" required>
    <label>Alasan</label>
    <textarea name="alasan" required></textarea>
    <button type="submit">Kirim</button>
  </form>
  <p><a href="?url=siswacontroller/dashboard">Kembali</a></p>
</body>
</html>