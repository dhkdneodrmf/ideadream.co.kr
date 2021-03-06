<?php
    include "dbconfig.php";
    switch($_GET['st']){
        case 'insert':
            $temp=$db->prepare("INSERT INTO boardtest (Title, Contents, Creator, Cdate, Views) VALUES (:title, :contents, :creator, now(),:views)");
            $temp->bindParam(':title',$title);
            $temp->bindParam(':contents',$contents);
            $temp->bindParam(':creator',$creator);
            $temp->bindParam(':views',$views);
            $title=$_POST['Title'];
            $contents=$_POST['Contents'];
            $creator=$_POST['Creator'];
            $views=0;
            $temp->execute();
            $temp=$db->prepare("SELECT MAX(No) from boardtest");
            $temp->execute();
            $no=$temp->fetch();
            //$row=$temp->fetch();
            //var_dump($no);
            header("Location: boardlist.php?No=".$no[0]);
            break;
        case 'delete':
            $temp=$db->prepare('DELETE FROM boardtest WHERE No=:No');
            $temp->bindParam(':No',$No);
            $No=$_POST['No'];
            $temp->execute();
            //echo "<script>alert(\"선택한 게시글 삭제가 완료되었습니다.\");</script>";
            header("Location: boardlist.php");
            break;
        case 'modify':
            $temp=$db->prepare('UPDATE boardtest SET Title = :title , Contents = :contents, Creator = :creator WHERE No = :No');
            $temp->bindParam(':title',$title);
            $temp->bindParam(':contents',$contents);
            $temp->bindParam(':creator',$creator);
            $temp->bindParam(':No',$No);
            $title=$_POST['Title'];
            $contents=$_POST['Contents'];
            $creator=$_POST['Creator'];
            $No=$_POST['No'];
            $temp->execute();
            header("Location: boardlist.php?No={$_POST['No']}");
            break;
    }
?>