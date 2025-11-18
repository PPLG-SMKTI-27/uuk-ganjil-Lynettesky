<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <link rel="stylesheet" href="../assets/css/style.css">
</head>
<body>
<div class="container">
    <h2>Dashboard</h2>
    <p>Halo, <?php echo $_SESSION['user']['username']; ?>!</p>
    <a href="../auth/logout">Logout</a>
</div>
</body>
</html>
