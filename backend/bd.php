<?php

    $massege = filter_var(trim($_POST['message']), FILTER_SANITIZE_STRING); 
    $hashtag = filter_var(trim($_POST['hashtag']), FILTER_SANITIZE_STRING);
    $fields = filter_var(trim($_POST['field']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('std-mysql', 'std_1739_cworkphp', 'Bigbos2002', 'std_1739_cworkphp');;
    if ($mysql->connect_errno) exit('Ошибка');
    $mysql->set_charset('utf8');


    function getFields() {
        $db = sql_query('SELECT * FROM Field');
        $res = [];
        while ($row = $db->fetch_assoc()) {
            $res[] = $row['title'];
        }
    
        return $res;
    }
?>