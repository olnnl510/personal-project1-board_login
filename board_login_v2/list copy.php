<?php   
    include_once "db/db_board.php";

    session_start();
    $nm = "";
    if(isset($_SESSION["login_user"])) {
        $login_user = $_SESSION["login_user"];
        $nm = $login_user["nm"];
    }

    $page = 1; // 만약에 쿼리스트링 값 없다면 무조건 1페이지 // 쿼리스트링을 받는다

    if(isset($_GET["page"])) { 
        $page = intval($_GET["page"]) ;
    } // page에 값이 있나? 있다면 intval(문자열 -> 정수형 으로 형변환 해주는 함수. 강제형번환 {$_GET $_POST 해서 넘어오는 값 : 무조건 문자열(정수라도 문자열로 바뀜)} )
    
    // print "<div>page : $page</div>"; // 잘받아졌는지 확인


    /* 검색기능 */
    $search_txt = "";
    if(isset($_GET["search_txt"])) { 
        $search_txt = $_GET["search_txt"] ;
    }
    // print "search_txt : {$search_txt}";
    /* 검색기능 */

    $row_count = 10; // 페이지당 보여줘야되는 값 10

    $param = [
        "s_idx" => ($page - 1) * $row_count,
        "row_count" => $row_count,
        "search_txt" => $search_txt
    ];
    // start index row count, 정리해서 sel_board_list에 보내줄꺼임

    $paging_count = sel_paging_count($param); // 배열이아닌 정수값(12)가 넘어옴. 복사하여 왼쪽에 준다. param 값 보내준다.

    $list = sel_board_list($param);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <title>리스트</title>
</head>
<body>
    <div id="container">
        <header>
            <div class="header_l"><?=isset($_SESSION["login_user"]) ? "<div>". $nm . "님 환영합니다.</div>" : "" ?></div>
            <div class="header_r">
                <a href="list.php">리스트</a>
                <?php if(isset($_SESSION["login_user"])) { ?>
                    <a href="write.php">글쓰기</a>
                    <a href="logout.php">로그아웃</a>
                <?php } else { ?>
                    <a href="login.php">로그인</a>
                <?php } ?>                
            </div>
        </header>
        <main>
            <h1>리스트</h1>
            <div class="search"> <!-- 검색기능 -->
                <form action="list.php" method="get">
                    <div>
                        <input type="search" name="search_txt" value="<?=$search_txt?>"> <!-- 재귀함수처럼 내가 내 자신한테 다시한번 호출. 위에서 받는다 -->
                        <input type="submit" value="검색">
                    </div>
            </div> <!-- 검색기능 -->

            <div class="table">
                <table>
                    <thead>
                        <tr>
                            <th>글번호</th>
                            <th>제목</th>
                            <th>글쓴이</th>
                            <th>등록일시</th>
                        </tr>
                    </thead>
                    <tbody>                    
                        <?php foreach($list as $item) { ?>
                            <tr>
                                <td><?=$item["i_board"]?></td>
                                <td class="title"><a href="detail.php?i_board=<?=$item["i_board"]?>&page=<?=$page?>"><?=str_replace("$search_txt","<mark>$search_txt</mark>", $item["title"])?></a></td>
                                <td><?=$item["nm"]?></td>
                                <td><?=$item["created_at"]?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>

            <div class="paging"> <!-- 페이징 처리-->
                <?php for($i=1; $i<=$paging_count; $i++) { ?>
                    <span class="<?=($i==$page ? "selected_page" : " ") ?>">
                        <a href="list.php?page=<?=$i?><?= $search_txt !== "" ? "&search_txt=" . $search_txt : "" ?>"><?=$i?></a>

                        <!-- ?php if($search_txt == "") { ?>
                        <a href="list.php?page=<?=$i?>"><?=$i?></a>
                        ?php } else { ?>
                        <a href="list.php?page=<?=$i?>&search_txt=<?=$search_txt?>"><?=$i?></a>
                        ?php }?> -->

                    </span> <!-- 쿼리스트링으로 알려준다 -->
                <?php } ?>
            </div>

        </main>
        <footer>
            <div>
            made by developer_y │ 주소 : 대구광역시 중구 중앙대로 394, 제일빌딩 5F 그린컴퓨터아트학원 대구 │ 전화 : 010-6749-0510
            </div>
        </footer>
    </div>
</body>
</html>


<!--
쿼리스트링
= 함수호출할때 파라미터 아규먼트로 보내는것과 같음.

쿼리스트링을 받는다
-->