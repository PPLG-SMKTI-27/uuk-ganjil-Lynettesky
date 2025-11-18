<h2>Register</h2>
<?php if (!empty($error)): ?>
  <p style="color:red"><?= htmlspecialchars($error) ?></p>
<?php endif; ?>
<form method="post" action="?url=authcontroller/process_register">
  <label>Username</label>
  <input type="text" name="username" required>
  <label>Password</label>
  <input type="password" name="password" required>
  <label>Role</label>
  <select name="role" required>
    <option value="siswa">Siswa</option>
    <option value="wali">Wali Kelas</option>
  </select>
  <label>Nama Lengkap</label>
  <input type="text" name="nama" required>
  <label>Kelas</label>
<select name="id_kelas" required>
  <option value="1">XI-PPLG</option>
  <option value="2">XII-PPLG</option>
  <!-- Tambahkan sesuai isi tabel kelas -->
</select>
<button type="submit">Daftar</button>
</form>
<p><a href="?url=authcontroller/login">Sudah punya akun? Login</a></p>