<?php // 게시판 DB를 mysql을 통해 만들고 DB설정을 하여 필요한 부분에서 계속 불러옴
    $db= new PDO('mysql:host=localhost;dbname=library', 'root', 'trade2010');
    //global $db;
    function dq($query) {
        global $db;
        return $db->query($query);
    }
?>