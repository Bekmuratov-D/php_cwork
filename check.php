<?php
    $login = filter_var(trim($_POST['username']), FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['password']), FILTER_SANITIZE_STRING);
    

    if(mb_strlen($login) < 5 || mb_strlen($login) > 50) {
        echo "Недоступная длина логина";
        exit();
    } else if(mb_strlen($pass) < 4 || mb_strlen($login) > 20) {
        echo "Недоступная длина пароля (от 4 до 6 символов)";
        exit(); 
    }

    $pass = md5($pass);

    $mysql = new mysqli('std-mysql', 'std_1739_cworkphp', 'Bigbos2002', 'std_1739_cworkphp');
    $mysql->query("INSERT INTO `users` (`name`, `password`) VALUES('$login', '$pass') ");
    $mysql->close();


    header('Location: /page.php');
?>