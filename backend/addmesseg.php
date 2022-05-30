<?php
    
    include_once 'database.php';
    include_once 'function.php';
    
    $message = $_POST['message']; 
    $hashtag = filter_var(trim($_POST['hashtag']), FILTER_SANITIZE_STRING);
    $field = filter_var(trim($_POST['field']), FILTER_SANITIZE_STRING);

    $mysql = new mysqli('std-mysql', 'std_1739_cworkphp', 'Bigbos2002', 'std_1739_cworkphp');
    $mysql->query("INSERT INTO `hashtag` (`name`) VALUES('$hashtag')");

    
    $hashtagId = sql_query('SELECT id FROM hashtag WHERE name = ' . add_quotes($hashtag))->fetch_assoc()['id'];
    $fieldsTable = sql_query('SELECT * FROM field WHERE name =' . add_quotes($field));
    $fieldId = sql_query('SELECT id FROM field WHERE name = ' . add_quotes($field))->fetch_assoc()['id'];
    $relateHashtagIdCount = sql_query('SELECT `id_#` FROM bundle WHERE `id_#` = ' . add_quotes($hashtagId))->num_rows;
    
    
    if ($fieldsTable->num_rows == 1) {
        if ($relateHashtagIdCount == 0) {
            sql_query('INSERT INTO bundle (`id_#`, `id_field`) VALUES (' . add_quotes($hashtagId) . ',' . add_quotes($fieldId) . ')');
        }
    }
    
    
    
    $mysql->query('INSERT INTO sms (`id`,`#_id`,`field_id`, `Data`) VALUES (NULL,' . add_quotes($hashtagId) . ',' . add_quotes($fieldId) . ',' . add_quotes($message) . ')');


    
    $mysql->close();
    header('Location: /page');

?>