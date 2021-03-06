<?php
    include "dbconfig.php";
    if(!empty($_GET['No'])){
        $temp=$db->prepare('SELECT * FROM boardtest WHERE No =:No');
        $temp->bindParam(':No', $No, PDO::PARAM_INT);
        $No=$_GET['No'];
        $temp->execute();
        $list=$temp->fetch();
        //var_dump($list);
    }
?>
<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 게시글 수정</title>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="boardcss.css">
    </head>
    <body>
        <section>
            <h1>테스트 게시판</h1>
            <h3>글을 수정합니다.</h3>
            <form action="programing.php?st=modify" method="post">
                <input type="hidden" name="No" value="<?php echo $list['No']?>" />
                <div>
                    <label>제목</label>
                    <input type="text" name="Title" placeholder="게시글 제목을 입력하세요.(필수)" maxlength="100" value="<?php echo $list['Title']?>" required>
                </div>
                <div>
                    <label>내용</label>
                    <textarea name="Contents" placeholder="게시글 내용을 입력하세요.(필수)" maxlength="5000" required><?php echo $list['Contents']?></textarea>
                </div>
                <div>
                    <label>작성자</label>
                    <input type="text" name="Creator" placeholder="게시글 작성자를 입력하세요.(필수)" maxlength="20" value="<?php echo $list['Creator']?>" required>
                </div>
                <div align="center">
                    <input class="write" type="submit" value="수정">
                    <input class="write" type="reset" onclick="location.href='boardlist.php?No=<?php echo $list['No']?>';" value="취소">
                </div>
            </form>
        </section>
    </body>
</html>