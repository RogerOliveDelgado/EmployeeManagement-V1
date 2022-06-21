<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" 
  integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" 
  integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
  <link href="./assets/css/login.css" rel="stylesheet">
  <title>Bootstrap demo</title>
</head>
<body>
  <main class="form-signin">
    <form action="./src/library/loginController.php" method="POST">
      <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
      <input name="login" type="hidden">
      <div class="form-floating ">
        <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" 
        data-bs-toggle="tooltip" data-bs-html="true" title="imassembler@assemblerschool.com">
        <label for="floatingInput">Email address</label>
      </div>
      <div class="form-floating">
        <input name="pass" type="password" class="form-control" id="floatingPassword" placeholder="Password" title="Assemb13r">
        <label for="floatingPassword">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted text-center">&copy; 2021</p>
    </form>
  </main>
</body>
</html>