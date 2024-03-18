<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Blogito</title>
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <a class="navbar-brand" href="#">Navbar</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
    <div class="navbar-nav">
      <a class="nav-item nav-link active" href="/">Hlavni menu<span class="sr-only">(current)</span></a>
      <a class="nav-item nav-link" href="/onas">O Nás</a>
      <?php 
        if (!isset($_SESSION["user_id"])) {
                echo "<a class='nav-item nav-link' href='/login'>Login</a>";
        } ?>
      <?php 
        if (!isset($_SESSION["user_id"])) {
                echo "<a class='nav-item nav-link' href='/register'>Register</a>";
        } ?>
    </div>
  </div>
</nav>

    
