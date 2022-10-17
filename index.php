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
$log_outer = null;
if (check_auth()) {
    // Получим данные пользователя по сохранённому идентификатору
    $stmt = pdo()->prepare("SELECT * FROM `users` WHERE `id` = :id");
    $stmt->execute(['id' => $_SESSION['user_id']]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    //unset($_SESSION['user_id']);
}
?>

<?php if ($user) {
$nick = htmlspecialchars($user['nickname']);
$log_outer = "Out MotherShip";
$log_form = "LogOut";
} 
else { 
  $nick = (" ");
}?>
<?php if ($log_outer==null) 
{ 
  $log_outer = ("Enter Mothership");
  $log_form = "Enter";
}?>


<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container">
    <div class="collapse navbar-collapse" id="navbarButtonsExample">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link">D337</a>
        </li>
        <li class="nav-item">
          <a class="nav-link disabled">@</a>
        </li>
        <li class="nav-item">
          <a class="nav-link"><?php echo($nick);?></a>
        </li>
      </ul>
      <div class="d-flex align-items-center">
        <button type="button" class="btn btn-primary me-2">
          Hangar
        </button>
        <button type="button" class="btn btn-primary me-2">
          Info
        </button>
        <?php echo "\n".'<button type="button" class="btn btn-primary me-3" data-mdb-toggle="modal" data-mdb-target="#'.$log_form.'">'. 
        $log_outer. 
        '</button>';?>
              
      </div>
    </div>
  </div>
</nav>


<form action="reg.php" method="post">
  <!-- Modal -->
  <div class="modal fade" id="Enter" tabindex="-1" aria-labelledby="Enter" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="Enter">Log/Reg</h5>
          <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
        </div>
        <!-- ModalBody -->
        <div class="modal-body">
        <?php flash(); ?>
          <div class="input-group mb-3">
            <span class="input-group-text" id="basic-addon1">@</span>
            <input
              type="text"
              class="form-control"
              placeholder="NickName"
              aria-label="NickName"
              aria-describedby="basic-addon1"
              name = "RegNickName"
              id = "RegNickName"
              required
            />
          </div>
          
          <div class="input-group mb-3">
            <input
              type="email"
              class="form-control"
              placeholder="Email"
              aria-label="Email"
              name = "RegEmail"
              id="RegEmail"
              required
            />
          </div>

          <div class="input-group mb-3">
            <input
              type="password"
              class="form-control"
              placeholder="Password"
              aria-label="Password"
              name = "RegPassword"
              id = "RegPassword"
              required
            />
          </div>

          <div class="input-group mb-3">
            <input
              type="password"
              class="form-control"
              placeholder="Repeat"
              aria-label="Repeat"
              name = "RegPassRepeat"
              id = "RegPassRepeat"
              required
            />
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#EnterLogin">Login</button>
          <button type="submit" class="btn btn-primary">Registration</button>
        </div>
      </div>
    </div>
  </div>
</form>
<form action="log.php" method="post">
<div class="modal fade" id="EnterLogin" tabindex="-1" aria-labelledby="Enter" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Enter">Log</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <!-- ModalBody -->
      <div class="modal-body">
      <?php flash(); ?>
        <div class="input-group mb-3">
          <span class="input-group-text" id="basic-addon1">@</span>
          <input
            type="text"
            class="form-control"
            placeholder="NickName"
            aria-label="NickName"
            aria-describedby="basic-addon1"
            name = "LogNickName"
            id = "LogNickName"
            required
          />
        </div>

        <div class="input-group mb-3">
          <input
            type="password"
            class="form-control"
            placeholder="Password"
            aria-label="Password"
            name = "LogPassword"
            id = "LogPassword"
            required
          />
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-mdb-toggle="modal" data-mdb-target="#Enter">Back</button>
        <button type="submit" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>
</form>
<form action="log_out.php" method="post">
<div class="modal fade" id="LogOut" tabindex="-1" aria-labelledby="Out" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="Out">Out</h5>
        <button type="button" class="btn-close" data-mdb-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-footer">
      <button type="submit" class="btn btn-primary">Log Out</button>
      </div>
    </div>
  </div>
</div>
</form>
</body>
</html>
