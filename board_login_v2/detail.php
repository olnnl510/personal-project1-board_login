<?php
    include_once "db/db_board.php";
    session_start();
    if(isset($_SESSION["login_user"])) {
        $login_user = $_SESSION["login_user"];
    }
    $i_board = $_GET["i_board"];
    $param = [
        "i_board" => $i_board
    ];
    $item = sel_board($param);

    $page = $_GET["page"];

    // $search_txt = $_GET["search_txt"];

    /* 검색어 기능 */
    $search_txt = "";
    if(isset($_GET["search_txt"])) { 
        $search_txt = $_GET["search_txt"] ;
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="common.css">
    <link rel="stylesheet" href="detail.css">
    <title><?=$item["title"]?></title>
</head>
<body>
    <button><a href="list.php?page=<?=$page?><?= $search_txt !== "" ? "&search_txt=" . $search_txt : "" ?>">리스트</a></button>
    <?php if(isset($_SESSION["login_user"]) && $login_user["i_user"] === $item["i_user"]) { ?>
        <div>
            <a href="mod.php?i_board=<?=$i_board?>"><button>수정</button></a>
            <button onclick="isDel();">삭제</button>
        </div>
    <?php } ?>
    <div>제목 : <?=str_replace("$search_txt","<mark>$search_txt</mark>", $item["title"])?></div>
    <div>글쓴이 : <?=$item["nm"]?></div>
    <div>등록일시 : <?=$item["created_at"]?></div>
    <div><?=$item["ctnt"]?></div>
    <script>
        function isDel() {            
            console.log('isDel 실행 됨!!');            
            if(confirm('삭제하시겠습니까?')) {
                location.href = "del.php?i_board=<?=$i_board?>";
            } 
        }
    </script>
</body>
</html>