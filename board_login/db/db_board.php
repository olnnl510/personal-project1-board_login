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

    function sel_paging_count(&$param) {
        $row_count = $param["row_count"];
        $sql = "SELECT CEIL(COUNT(i_board) / $row_count)
                AS cnt
                FROM t_board";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        $row = mysqli_fetch_assoc($result);
        return $row["cnt"];
    }

    function sel_board_list(&$param){ // 다 뿌릴꺼니까 파라미터 필요없음 (외부로부터 값을 받지 않을것이다 = 혼자서 해결 가능)
        $start_idx = $param["start_idx"];
        $row_count = $param["row_count"];
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

        $title = $param["title"];
        $nm = $param["nm"];
        $created_at = $param["created_at"];
        $ctnt = $param["ctnt"];

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

    function search_board(&$param) {
        $conn = get_conn();
        $search_select = $param['search_select']; // select선택값
        $search_input_txt = $param['search_input_txt']; // 검색어
        $textArray = explode(" ", $search_input_txt); // 검색어를 공백으로 나눈다
        $where = "nm"; // sql 검색시 열(=속성,칼럼) 이름
        $query ="
        SELECT B.i_user, A.title, B.nm, A.created_at, A.ctnt
        FROM t_board A
        INNER JOIN t_user B
        ON A.i_user=B.i_user
        WHERE 
        ";
        switch($search_select) {
            case "search_writer";
                $where += ["B.nm"];
                break;
            case "search_title";
                $where += ["A.title"];
                break;
            case "search_ctnt";
                $where += ["A.ctnt", "A.title"];
                break;
        }

        for ($i = 0; $i < count($textArray); $i++) {
            for($j = 0; $j < count($where); $j++) {
                $query = $query." $where[$j] LIKE '%$textArray[$i]%' ";
                if(($i !== count($textArray) - 1) || ($j !== count($where) - 1)){ // 마지막 검색어가 아니라면 
                    $query = $query."OR";
                }
            }
        }

        $result = mysqli_query($conn, $query);
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