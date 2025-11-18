<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>Login - Perijinan Siswa</title>
  <link rel="stylesheet" href="assets/css/style2.css">
</head>
<body>
  <h2>Login</h2>
  <?php if (!empty($error)): ?>
    <p style="color:red"><?= htmlspecialchars($error) ?></p>
  <?php endif; ?>
  <form method="post" action="?url=authcontroller/process_login">
    <label>Username</label>
    <input type="text" name="username" required>
    <label>Password</label>
    <input type="password" name="password" required>
    <button type="submit">Login</button>
  </form>
  <p><a href="?url=landingcontroller/index">Kembali</a></p>
</body>
</html>