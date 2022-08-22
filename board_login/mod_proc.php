<?php
    include_once "db/db_board.php";
    
    session_start();
    $login_user = $_SESSION["login_user"];
    $i_user = $login_user["i_user"];

    $i_board = $_POST["i_board"];
    $title = $_POST["title"];
    $ctnt = $_POST["ctnt"];

    $param = [
        "i_board" => $i_board,
        "i_user" => $i_user,
        "title" => $title,
        "ctnt" => $ctnt
    ];

    $result = upd_board($param);
    if($result){
        header("Location: detail.php?i_board=$i_board");
    }
?>

<!-- 세션 i_user 써야함 -->
<!-- mod = 로직detail + 화면write -->
<!-- mod = 로직detail(sel_board함수 또씀) + 화면write -->