<?php
  session_start();
  require 'config.php';
  require 'functions.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title><?php siteName(); ?> | <?php pageTitle(); ?></title>
    <style type="text/css">
        .wrap { max-width: 700px; margin: 50px auto; padding: 30px; text-align: center; box-shadow: 0 0 5px rgba(0,0,0,.5); }
        article { text-align: left; padding: 0 20px 0 20px; }
    </style>
    <link rel="stylesheet" href="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>
    <script src="https://code.jquery.com/mobile/1.4.5/jquery.mobile-1.4.5.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<div class="wrap" style="background-color: silver;">

    <header>
        <h2><?php siteName(); ?></h2>
        <nav class="menu">
            <a href="/" title="Home">Home</a> |
            <a href="?page=about-us">About</a> |
            <a href="?page=products">Products</a> |
            <a href="?page=contact-us">Contact</a>
        </nav>
        <hr>
    </header>

    <article>
        <h3><?php pageTitle(); ?></h3>
        <?php pageContent(); ?>
    </article>

    <?php if (isset($_SESSION['messages']) && (count($_SESSION['messages']) > 0)) { ?>
    <messages>
      <div id="dialog" title="Messages">
        <?php foreach ($_SESSION['messages'] as $key => $value) {
          ?>
          <div class="alert alert-success">
            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
            <strong>Success!</strong> <?php echo($value); ?>
          </div>
          <?php
          unset($_SESSION['messages'][$key]);
        }//end foreach
        ?>
      </div>
    </messages>
    <?php } ?>
<!-- <br/>
SESSION: <?php #var_dump($_SESSION); ?>
<br/>
POST: <?php #var_dump($_POST); ?> -->

    <footer>
      <hr>
      <small>&copy;<?php echo date('Y'); ?> <?php siteName(); ?>. All rights reserved. Written by Jeroen Bouman</small>
    </footer>
</div>
</body>
</html>
