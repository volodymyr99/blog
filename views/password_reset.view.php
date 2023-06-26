<?php require "partials/top.php"; ?>

<nav class="navbar navbar-expand bg-light navbar-light">
  <a class="navbar-brand" href="index.php">Блог</a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">На головну</a>
    </li>
  </ul>
</nav>

<div class="jumbotron text-center">
    <h4>Відновлення паролю</h4>
</div>

<div class="container">
    <div class="row">

        <div class="col-6">
            <h5>Відновлення паролю</h5><br>
            <form action="password_reset.php" method="POST">

                <input type="email" name="email" placeholder="email" class="form-control" required><br>

                <button class="btn btn-info pr-5 pl-5" name="resetBtn">Новий пароль</button>
            </form>
            <?php if(isset($_POST['resetBtn'])): ?>
                <?php if($user->successReset): ?>
                    <div class="alert-success p-2 mt-2"><p>Новий пароль відправлено на Ваш email!</p></div>
                <?php else: ?>
                    <div class="alert-danger p-2 mt-2"><p>Сталася помилка, email не знайдено! Спробуйте ще раз!</p></div>
                <?php endif ?>
            <?php endif ?>
        </div>
        

    </div>
</div>

<?php require "partials/bottom.php"; ?>