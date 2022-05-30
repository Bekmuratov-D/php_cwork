<?php
    $login = filter_var(trim($_POST['login']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']), FILTER_SANITIZE_STRING);

    $pass = md5($pass);

    $mysql = new mysqli('std-mysql', 'std_1739_cworkphp', 'Bigbos2002', 'std_1739_cworkphp');;
    
    $result = $mysql->query("SELECT * FROM `users` WHERE `name` = '$login' AND `password` = '$pass'");
    $user = $result->fetch_assoc();
    if($user == NULL){
        echo "такой пользователь не найден";
        exit();
    }

    setcookie('user', $user['name'], time() + 12000, "/");

    $mysql->close();

    header('Location: /');
?>