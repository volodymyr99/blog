

<nav class="navbar navbar-expand bg-light navbar-light">
  <a class="navbar-brand" href="index.php">Блог</a>
  <ul class="navbar-nav ml-auto">

      <?php if(isset($_SESSION['loggedUser'])): ?>
        <li class="nav-item nav-link"><?php echo "Вітаємо, ".$_SESSION['loggedUser'] -> name."!"; ?></li>
        <li class="nav-item"><a class="nav-link" href="profile.php">Профіль</a></li>
        <li class="nav-item"><a class="nav-link" href="add_post.php">Додати статтю</a></li>
        <li class="nav-item"><a class="nav-link" href="logout.php">Вийти</a></li>
      <?php else: ?>
        <li class="nav-item"><a class="nav-link" href="login_register.php">Ввійти</a></li>
      <?php endif ?>

  </ul>
</nav>