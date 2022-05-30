


<?php

    include_once 'database.php';

    function getFields() {
        $db = sql_query('SELECT * FROM field');
        $res = [];
        while ($row = $db->fetch_assoc()) {
            $res[] = $row['name'];
        }

        return $res;
    }

    function getHashtag() {
        $db = sql_query('SELECT * FROM hashtag');
        $res = [];
        while ($row = $db->fetch_assoc()) {
            $res[] = $row['name'];
        }

        return $res;
    }

    function getTableMessages() {
        $res = sql_query('SELECT * FROM SMS');
    
        return $res;
    }
?>