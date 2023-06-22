<?php require "partials/top.php"; ?>

<nav class="navbar navbar-expand bg-light navbar-light">
  <a class="navbar-brand" href="index.php">Blogger</a>
  <ul class="navbar-nav ml-auto">
    <li class="nav-item active">
      <a class="nav-link" href="index.php">На головну</a>
    </li>
  </ul>
</nav>

<div class="jumbotron text-center">
    <h4>Вхід/Реєстрація</h4>
</div>

<div class="container">
    <div class="row">

        <div class="col-6">
            <h5>Вхід</h5><br>
            <form action="login_register.php" method="POST">
                <input type="email" name="login_email" placeholder="email" class="form-control" required><br>
                <input type="password" name="login_password" placeholder="Пароль" class="form-control" required><br>
                <button class="btn btn-info pr-5 pl-5" name="loginBtn">Вхід</button>
            </form>
            <?php if(isset($_POST['loginBtn'])): ?>
                <?php if($user->successLogin): ?>
                    <?php header("Location: index.php"); ?>
                <?php else: ?>
                    <div class="alert-danger p-2 mt-2"><p>Сталася помилка, спробуйте ще раз!</p></div>
                <?php endif ?>
            <?php endif ?>
            <a href="password_reset.php">Не пам'ятаю пароль</a>
        </div>

        <div class="col-6">
            <h5>Реєстрація</h5><br>
            <form action="login_register.php" method="POST">
                <input type="text" name="name" placeholder="ім'я" class="form-control" required><br>
                <input type="email" name="register_email" placeholder="email" class="form-control" required><br>
                <input type="password" name="register_password" placeholder="пароль" class="form-control" required><br>
                <button class="btn btn-info pr-5 pl-5" name="registerBtn">Зареєструватися</button>
            </form>
            <?php if(isset($_POST['registerBtn'])): ?>
                <?php if($user->successRegister): ?>
                    <div class="alert-success p-2 mt-2"><p>Успішна реєстрація!</p></div>
                <?php else: ?>
                    <div class="alert-danger p-2 mt-2"><p>Сталася помилка, спробуйте ще раз!</p></div>
                <?php endif ?>
            <?php endif ?>
        </div>
        

    </div>
</div>

<?php require "partials/bottom.php"; ?>