<?php
    include_once "db.php";

    function ins_board($param){ // write_proc.php 에 있는 $param에 접근
        $i_user = $param["i_user"]; // 변수명이 똑같아서 똑같은 값 갖고있는 아니라는것 인지 Q
        $title = $param["title"];
        $ctnt = $param["ctnt"];

        $sql =
        "   INSERT INTO t_board (i_user, title, ctnt)
            VALUES ($i_user, '${title}', '${ctnt}')
        "; // 정수형 '' 안붙임
        
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function sel_board_list(&$param){ // 다 뿌릴꺼니까 파라미터 필요없음 (외부로부터 값을 받지 않을것이다 = 혼자서 해결 가능)
        $sql = "SELECT A.i_board, A.title, B.nm, B.i_user, A.created_at
                FROM t_board A
                INNER JOIN t_user B
                ON A.i_user=B.i_user
                ORDER BY i_board
                DESC";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function sel_board($param){
        $i_board = $param["i_board"];

        $sql = "SELECT B.i_user, A.title, B.nm, A.created_at, A.ctnt
                FROM t_board A
                INNER JOIN t_user B
                ON A.i_user=B.i_user
                WHERE A.i_board=${i_board}"; // nm 쓰기위해 조인

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return mysqli_fetch_assoc($result); // 쿼리문으로 나온 결과를 한줄씩 배열로 넣어주는 함수!
    }
    
    function upd_board(&$param){
        $i_board = $param["i_board"];
        $i_user = $param["i_user"];
        $title = $param["title"];
        $ctnt = $param["ctnt"];

        $sql ="UPDATE t_board
                SET title='$title', ctnt='$ctnt', updated_at=now()
                WHERE i_board = $i_board
                AND i_user = $i_user"; // 다른사람이 수정x

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    function del_board(&$param){
        $i_board = $param["i_board"];
        $i_user = $param["i_user"];

        $sql =
        "   DELETE FROM t_board
            WHERE i_board = $i_board
            AND i_user = $i_user
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }
?>

<!--
- CRUD순서 정렬

- DB
ROUND 반올림
FLOOR 강제내림
CEIL 강제올림

페이징처리, 댓글쓰기, 예외처리..
카운트(조회수)는 나중에
-->