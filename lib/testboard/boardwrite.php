<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 게시글 작성</title>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="boardcss.css">
    </head>
    <body>
        <section>
            <h1>테스트 게시판</h1>
            <h3>글을 작성합니다.</h3>
            <form action="programing.php?st=insert" method="post">
                <div>
                    <label>제목</label>
                    <input type="text" name="Title" placeholder="게시글 제목을 입력하세요.(필수)" maxlength="100" required>
                </div>
                <div>
                    <label>내용</label>
                    <textarea name="Contents" placeholder="게시글 내용을 입력하세요.(필수)" maxlength="5000" required></textarea>
                </div>
                <div>
                    <label>작성자</label>
                    <input type="text" name="Creator" placeholder="게시글 작성자를 입력하세요.(필수)" maxlength="20" required>
                </div>
                <div align="center">
                    <input class="write" type="submit" value="작성">
                    <input class="write" type="reset" value="초기화">
                </div>
            </form>
        </section>
    </body>
</html>