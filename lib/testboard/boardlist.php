<!DOCTYPE html>
<html lang="ko">
    <head>
        <meta charset="utf-8">
        <title>테스트 게시판 라이브러리</title>
        <link href="https://fonts.googleapis.com/css2?family=Nanum+Gothic:wght@400;700;800&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="boardcss.css">
        </style>
    </head>
    <body>
        <section>
            <h1>테스트 게시판</h1>
            <h3>글도 쓰고 저장도 한번 해봅시다.</h3>
            <?php
                include "dbconfig.php";
                if(!empty($_GET['No'])){
                    $temp=$db->prepare('SELECT * FROM boardtest WHERE No =:No');
                    $temp->bindParam(':No', $No, PDO::PARAM_INT);
                    $No=$_GET['No'];
                    $temp->execute();
                    $list=$temp->fetch();
                    //var_dump($list);
                    echo '<div class="board"><h4>'.$list["Title"].'</h4><p align="right"><span>'.$list["Creator"].'</span><span>'.$list["Cdate"].'</span><span>조회수 : '.$list["Views"].'</span></p><hr><p>'.$list["Contents"].'</p></div>';
                    echo ("<table class='button' width=98%>
                    <tr>
                    <td width=8%><button onclick=\"location.href='boardlist.php';\">목록</button></td>
                    <td width=76%></td><td width=8%><button onclick=\"location.href='boardmodify.php?No=".$list['No']."';\">수정</button></td>
                    <td>
                    <form method=\"POST\" action=\"programing.php?st=delete\" onsubmit=\"return confirm('정말로 삭제하시겠습니까?');\">
                        <input type=\"hidden\" name=\"No\" value=\"".$list['No']."\"/>
                        <input type=\"submit\" value=\"삭제\" />
                    </form>
                    </td>
                    </tr>
                    </table><p><br></p>");
                    //<button onclick=\"if (confirm('정말로 삭제하겠습니까?')){location.href='programing.php?st=delete&No=".$list['No']."';}\">삭제</button>
                }
            ?>
            <table class="board" align="center" width="98%">
                <thead>
                    <tr>
                        <th width="5%">번호</th>
                        <th width="50%">제목</th>
                        <th width="15%">글쓴이</th>
                        <th width="15%">작성일</th>
                        <th width="5%">조회수</th>
                    </tr>
                </thead>
                <tbody>
                        <?php
                            $dql=dq("SELECT * from boardtest order by No desc"); // limit 0,5 5까지만 나오게 함
                            if(empty($dql)) {
                                echo "<td colspan=5>게시물이 없습니다.</td>";
                            } else {
                            while($bd = $dql->fetch()){
                                $title=$bd["Title"];
                                if(strlen($title)>30) {
                                    $title=str_replace($bd["Title"],mb_substr($bd["Title"],0,30,"utf-8")."···",$bd["Title"]);
                                }
                                echo "<tr><td>{$bd['No']}</td><td><a href=\"?No={$bd['No']} \">{$title}</a></td><td>{$bd['Creator']}</td><td>{$bd['Cdate']}</td><td>{$bd['Views']}</td></tr>";
                                }
                            }
                        ?>
                </tbody>
            </table>
            <button class="write" onclick="location.href='boardwrite.php';">글쓰기</button>
        </section>
    </body>
</html>