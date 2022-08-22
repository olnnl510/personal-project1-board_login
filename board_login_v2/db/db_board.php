<?php // 순서 : CRUD
    include_once "db.php";

    function ins_board(&$param) {
        $i_user = $param["i_user"];
        $title = $param["title"];
        $ctnt = $param["ctnt"];

        $sql = 
        "   INSERT INTO t_board
            (title, ctnt, i_user)
            VALUES
            ('$title', '$ctnt', $i_user)
        ";

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }

    /* 페이지당 10개씩 보이겠다 */  /* 총 레코드 수 */ /* param으로 보낸 row_count값 */
    function sel_paging_count(&$param) {
        $sql = "SELECT CEIL(COUNT(i_board) / {$param["row_count"]}) as cnt
        FROM t_board";

    if($param["search_txt"] !== "") {
        $sql .= " WHERE title LIKE '%{$param["search_txt"]}%'";            
    }
        /*

        앞에 빈칸 없으면 에러뜸 문자열합치기

        .= : 문자열 합치기
        sum += 10;
        */

        $conn = get_conn(); // 연결
        $result = mysqli_query($conn, $sql); // 실행
        mysqli_close($conn); 
        $row = mysqli_fetch_assoc($result); /* ☆ 한줄만(제일 첫줄. 다시실행하면 그다음줄) 배열로 만드는 작업. 전체숫자에서 가져왔으므로 레코드는 하나.*/
        return $row["cnt"]; /* row 변수에 배열이 넘어감. 여기서 넘어간 배열에는 방이 몇개 있을까?1개 (컬럼 1개). 방 하나에 있는 값 return (count값 12) */
    }

    function sel_board_list(&$param) {
        $sql =
        "   SELECT A.i_board, A.title, A.created_at, B.nm
            FROM t_board A
            INNER JOIN t_user B
            ON A.i_user = B.i_user
        ";

        if($param["search_txt"] !== "") {
            $sql .= " WHERE title LIKE '%{$param["search_txt"]}%'";            
        } // title 제목에만 표시. orderby~limit 사이에 where 사용불가.
        
        $sql .= " ORDER BY A.i_board DESC
        LIMIT {$param["s_idx"]}, {$param["row_count"]}"; // index, index로부터 몇개

        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }



    /* mysqli_fetch_assoc
    result에 있는 값을 배열로 잘 정리해서 넘겨달라
    최초한번 : 첫번째 레코드 -> 정리해서 row로 넘어간다

    return $row; 배열 전체가 넘어감.
    return $row["cnt"]; 정수값 하나만 넘어감. 12
    */

    /* 레코드 한줄 뽑아낼때 컬럼명. */

    function sel_board(&$param) {
        $i_board = $param["i_board"];
        $sql = "SELECT A.title, A.ctnt, A.created_at
                     , B.i_user, B.nm
                  FROM t_board A
                 INNER JOIN t_user B
                    ON A.i_user = B.i_user
                 WHERE A.i_board = $i_board";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);        
        return mysqli_fetch_assoc($result);
    }

    function upd_board(&$param) {
        $i_board = $param["i_board"];
        $title = $param["title"];
        $ctnt = $param["ctnt"];
        $i_user = $param["i_user"];

        $sql = "UPDATE t_board
                   SET title = '$title'
                     , ctnt = '$ctnt'
                     , updated_at = now()
                 WHERE i_board = $i_board
                   AND i_user = $i_user";
         $conn = get_conn();
         $result = mysqli_query($conn, $sql);
         mysqli_close($conn);
         return $result;
    }

    function del_board(&$param) {
        $i_board = $param["i_board"];
        $i_user = $param["i_user"];

        $sql = "DELETE FROM t_board 
                 WHERE i_board = $i_board 
                   AND i_user = $i_user";
        $conn = get_conn();
        $result = mysqli_query($conn, $sql);
        mysqli_close($conn);
        return $result;
    }