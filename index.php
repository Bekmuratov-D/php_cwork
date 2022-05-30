
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>Login page</title>
</head>
<body>
    <div class="container">
        <?php
            if(!isset($_COOKIE['user'])):
        ?>
        <div class="row mt-5 p-3">
            <div class="flex-grow-0 bg-light m-auto mt-4 p-3" style="width: 400px;">
                <form action="auth.php" method="POST">
                    <h2>Войти</h2>
                    <input type="text" class="form-control mb-4 mt-3" name="login" id="logUsername" placeholder="Ведите логин">
                    <input type="password" class="form-control mb-3" name="pass" id="logPassword" placeholder="Ведите пароль">
                    <button type="submit" class="btn btn-primary">Войти</button>
                </form>
            </div>
            <div class="flex-grow-0 bg-light m-auto mt-4 p-3" style="width: 400px;">
                <form action="check.php" method="POST" type="reg">
                    <h2>Зарегистрироваться</h2>
                    <input type="text" class="form-control mb-4 mt-3" name="username" id="regUsername" placeholder="Ведите логин">
                    <input type="password" class="form-control mb-3" name="password" id="regPassword"  placeholder="Ведите пароль">
                    <button type="submit" class="btn btn-primary">Зарегистрироваться</button>
                </form>
            </div>
        <?php else:
            require_once 'page.php';
            ?>{
        <?php endif;?>           

        </div>
    <script src="" integrity="" crossorigin=""></script>
</body>
</html>