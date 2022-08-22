<?php
 include_once "db.php"; // 파일기준

 function ins_user(&$param) { //만든함수, 파라미터
    $uid = $param["uid"];
    $upw = $param["upw"];
    $nm = $param["nm"];
    $gender = $param["gender"];

    $conn = get_conn(); //만든함수, VALUES 문자열이기 때문에 홑따옴표 넣어줘야함
    $sql = 
    "   INSERT INTO t_user 
        (uid, upw, nm, gender)
        VALUES
        ('$uid', '$upw', '$nm', $gender)
    ";
    $result = mysqli_query($conn, $sql); // 쿼리를 실행시켜줌. 커넥션정보,실행할쿼리 2개 필요함
    mysqli_close($conn);
    return $result; // 넘어온값 return
 }

 function sel_user(&$param) { // php 깊은복사. &치면주소값 안치면그대로복사
    $uid = $param["uid"]; // 비번 안데려옴 uid키값 $uid밸류값
    
    $sql = 
    "   SELECT i_user, uid, upw, nm, gender
        FROM t_user
        WHERE uid = '$uid'
    ";
    $conn = get_conn();
    $result = mysqli_query($conn, $sql); // select의 결과값이 result에 담김
    mysqli_close($conn);
    return mysqli_fetch_assoc($result); // result에 담긴값 return assoc배열을 result값에 하나씩 넣어줌
 } // 1줄만 가져오니 1번만 호출 (여러줄 : while문으로 반복)
 // 보낸 id가 맞으면 select~~값을 배열(mysqli_fetch_assoc)에 넣는다

//  컨펌 : 확인용~ 이미 통과했을때 옴

//  s : select의 결과값이 넘어옴
//  !s : 쿼리문 날리는것이 빈칸(false실패) or 1(ture성공). 결과x날리는것o

// & 주소값

// return 나를 호출한 곳으로 다시 돌아가겠다(주는 값을 데리고!)

// 함수 선언부 바뀌지 않게 최대한 유용한 값을 써주는게 좋음