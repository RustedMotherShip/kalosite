<?php include 'boot.php';?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Ggalins!</title>
<!-- MDB -->
<link
  href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.css"
  rel="stylesheet"
/>
<!-- MDB -->
<script
  type="text/javascript"
  src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/5.0.0/mdb.min.js"
></script>
  </head>
  <body>
  <?php
require_once __DIR__.'/boot.php';

$user = null;

if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}
?>
<?php if ($user) { ?>

    <h1>Welcome back, <?=htmlspecialchars($user['nickname'])?>!</h1>

    <form class="mt-5" method="post" action="">
        <button type="submit" class="btn btn-primary">Logout</button>
    </form>

<?php } else { echo "govno"}?>






















<!-- <nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link">D337</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">@</a>
        </li>
        <li class="nav-item">
          <a class="nav-link">Name</a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
      <button type="button" class="btn btn-primary me-2">
          Hangar
        </button>
        <button type="button" class="btn btn-primary me-3">
          Info
        </button>        
      </div>
    </div>
  </div>
</nav> -->

</body>
</html>