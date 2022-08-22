<?php
    include_once "db/db_user.php"; // 경로. 같은폴더가 아님. 이 파일이 있는 위치 기준. 중복된 소스 엄청 줄여주는 효과

    $uid = $_POST["uid"]; // 클라이언트가 보내준 값 받음
    $upw = $_POST["upw"];
    $confirm_upw = $_POST["confirm_upw"];
    $nm = $_POST["nm"];
    $gender = $_POST["gender"];

    $param = [
        "uid" => $uid,
        "upw" => $upw,
        "nm" => $nm,
        "gender" => $gender,
    ]; // 배열로 넣어줌
    
    $result = ins_user($param); // 함수 호출, = 왼쪽으로 값을 보내준다(대입), 리턴값을 받아온다
    
    echo "result : " , $result , "<br>"; // 빈칸(false) or 1(true) 조인실패,성공
    echo "uid : " , $uid , "<br>";
    echo "upw : " , $upw , "<br>";
    echo "confirm_upw : " , $confirm_upw , "<br>";
    echo "nm : " , $nm , "<br>";
    echo "gender : " , $gender , "<br>";

    // header("Location: login.php");

// 5가지 정보 받아서
// 잘 받아졌는지 화면에 뿌려보기

// proc : process

// 1.받아서(post)
// 2.배열로 만들어서
// 3.찍어준다

// $result = user_join($param);

// ☆ 프로그래밍에서 = 의 의미 : 오른쪽의 값을 복사하여 왼쪽에 준다 ☆ 메커니즘 중요
// 함수 호출하게되면, 함수가 '값'이된다. (ex literal 값일수도, 주소값일수도 있음)
// 값이된다 : 함수안에 return 값이 있다는 뜻 (무언가 값을 return 해준다)
// 대답o 일o

// $dddd($praram);
// 대답x 일o
// return 이 없다.(옵션. 있다해도 return; ) = 없음