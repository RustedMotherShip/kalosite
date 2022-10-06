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
    <br>
    <div class="form-row text-center">
      <div class="col-12">
        <button type="button" class="btn btn-primary" data-mdb-toggle="modal" data-mdb-target="#Enter">
          Enter Mothership
        </button>
      </div>
   </div>
<!-- Button trigger modal -->

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
  </body>
</html>
