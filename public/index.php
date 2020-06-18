<?php 
require_once('./auth.php');
?>

<?php include "./header.php" ?>
<div class="jumbotron">
  <div class="container">
    <h1 class="display-3">Hello, world!</h1>
    <p>
      This is a template for a simple login/register system. It includes a
      simple OpenID Connect Implicit Flow. To view Profile page please login.
    </p>
    <p>      
      <?php if ($auth->isLoggedIn()) { ?>
      <a class="btn btn-success btn-lg" href="/profile.php" role="button"
        >View Profile &raquo;</a
      >
      <?php } else { ?>
      <a class="btn btn-primary btn-lg" href="/login.php" role="button"
        >Login/Register &raquo;</a
      >
      <?php } ?>
    </p>
    <p></p>
  </div>
</div>
<?php include "./footer.php" ?>