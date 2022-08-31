<?php
include_once "db/db_board.php";
session_start();
if (isset($_SESSION["login_user"])) {
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
if (isset($_GET["search_txt"])) {
    $search_txt = $_GET["search_txt"];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/detail.css">
    <link rel="stylesheet" href="css/common.css">
    <title><?= $item["title"] ?></title>
</head>

<body>
    <div class="container">
        <h1>디테일</h1>
        <button><a href="list.php?page=<?= $page ?><?= $search_txt !== "" ? "&search_txt=" . $search_txt : "" ?>">리스트</a></button>
        <?php if (isset($_SESSION["login_user"]) && $login_user["i_user"] === $item["i_user"]) { ?>
            <div>
                <a href="mod.php?i_board=<?= $i_board ?>"><button>수정</button></a>
                <button onclick="isDel();">삭제</button>
            </div>
        <?php } ?>
        <table>
            <tr>
                <th>제목</th>
                <td><?= str_replace("$search_txt", "<mark>$search_txt</mark>", $item["title"]) ?></td>
            </tr>
            <tr>
                <th>글쓴이</th>
                <td><?= $item["nm"] ?></td>
            </tr>
            <tr>
                <th>등록일시</th>
                <td><?= $item["created_at"] ?></td>
            </tr>
            <tr>
                <th>내용</th>
                <td class="ctnt"><?= $item["ctnt"] ?></td>
            </tr>
        </table>
        <script>
            function isDel() {
                console.log('isDel 실행 됨!!');
                if (confirm('삭제하시겠습니까?')) {
                    location.href = "del.php?i_board=<?= $i_board ?>";
                }
            }
        </script>
    </div>
</body>

</html>