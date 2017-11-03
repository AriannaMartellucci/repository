<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="lib/bootstrap-3.3.7/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
    <title>Biblioteca Eliari Saeli</title>
</head>
<body>

    <header>

    </header>

<!-- inizio menu -->
<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php"><img src="img/logo.png" width="60px"></a>
    </div>

   <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li><a href="catalogo.php">Catalogo <span class="sr-only">(current)</span></a></li>
        <li><a href="info.php">Info</a></li>
      </ul>
      <form class="navbar-form navbar-left">
        <div class="form-group">
          <input type="text" class="form-control" placeholder="Cerca libro">
        </div>
        <button type="submit" class="btn btn-default">Cerca</button>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Login<span class="caret"></span></a>
          <ul class="dropdown-menu">
            <li><a href="login_utenti.php">Utenti</a></li>
            <li><a href="login_dipendenti.php">Dipendenti</a></li>
          </ul>  
        </li>
        <li id="logout"><a href="index.php">Logout</a></li>
      </ul>
    </div>
  </div>
</nav>
<!-- fine menu -->

<!-- apertura container -->
<div class="container">

<!-- bootstrap e jquery -->
<!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script src="lib/bootstrap-3.3.7/js/bootstrap.min.js"></script> -->

