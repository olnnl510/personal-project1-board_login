<?php
    include_once "db/db_board.php";

    session_start();
    $title = $_POST["title"];
    $ctnt = $_POST["ctnt"];

    $login_user = $_SESSION["login_user"];
    $i_user = $login_user["i_user"];
    
    $param = [
        "i_user" => $i_user,
        "title" => $title,
        "ctnt" => $ctnt,
    ];

    $result = ins_board($param);
    if($result) {
        Header("Location: list.php");
    }
    //t_board에 insert 완료 후 list.php로 이동.
