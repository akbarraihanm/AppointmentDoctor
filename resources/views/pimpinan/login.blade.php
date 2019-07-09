<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Pimpinan - Masuk</title>

  <!-- Custom fonts for this template-->
  <link href="/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">

  <!-- Custom styles for this template-->
  <link href="/css/sb-admin.css" rel="stylesheet">

</head>

<body class="bg-white">
    
    <style>
        .content {
          max-width: 500px;
          margin: auto;
          margin-top: 120px;
          /*background: yellow;*/
          padding: 40px;
        }        
    </style>
    
  <div class="container content">
      <h3 class="text-center">Silahkan masuk</h3>
    <div class="card card-login mx-auto mt-5">
      <div class="card-header">Masuk</div>
      <div class="card-body">
        <form action="{{url('/login/pimpinan')}}" method="POST">
                    {{ csrf_field() }}            
          <div class="form-group">
            <div class="form-label-group">
              <input type="text" id="inputEmail" class="form-control" placeholder="Username" required="required" name="username" autofocus="autofocus">
              <label for="inputEmail">Username</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input type="password" id="inputPassword" class="form-control" placeholder="Password" name="password" required="required">
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <button class="btn btn-primary btn-block" >Masuk</a>
        </form>
      </div>
    </div>
  </div>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

</body>

</html>
