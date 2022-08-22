<?php
    include_once "db/db_board.php";

    session_start();
    $login_user = $_SESSION["login_user"];
    $i_board = $_GET["i_board"];
    $i_user = $login_user["i_user"]; // 로그인한 사람만 글 삭제 가능하게 세션
    $param = [
        "i_board" => $i_board, // 내가쓴글인지 체크
        "i_user" => $i_user
    ];
    $result = del_board($param);
    header("Location: list.php");
    ?>

<!--
함수호출시
return값 있으면 =
없으면 그냥
-->