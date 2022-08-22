<?php 
    include_once "db/db_user.php";
    //login.php 에서 넘어오는 값을 적절한 변수에 담는다.
    //변수의 값을 출력.
    $uid = $_POST["uid"];
    $upw = $_POST["upw"]; // 내가 보낸 비밀번호 (_POST로 가져온 정보는 숫자더라도 '문자열'로 받아옴!)

    echo "uid : ", $uid, "<br>"; // 잘 넘어왔는지 체크
    echo "upw : ", $upw, "<br>";

    $param = [
        "uid" => $uid
    ]; // QQQQQ 왜 굳이 1개인데 배열화?
    // 맡길때 : 키 / 값 같이 맡김 param = 전당포
    // 찾을때 : 값만 

    $result = sel_user($param); // 함수에게 필요한 정보 건네줌 (uid값)
    if(empty($result)) {
        echo "해당하는 아이디 없음";
        die; // 만나면 종료되기 때문에 밑에있는 소스 실행 안됨 (die, exit)
    } // 해당하는 아이디가 없었으면 빈칸이 넘어옴 if문 true 여야만 진입. 중괄호 실행.
    // id만 보내는 이유 : id있다면? 비번체크 (둘다 보내면 무엇이 잘못된지 모름)

    echo "i_user : " , $result["i_user"], "<br>";
    echo "pw : " , $result["upw"], "<br>"; //데이터베이스에서 가져온 비밀번호 
    
    //(만약에=if) 비밀번호가 맞으면 "list.php로 주소 이동"
    //(만약에) 비밀번호가 다르면 "login.php로 주소 이동"

    if($upw == $result["upw"]){ // 로그인 성공!! 로그인하겠다고 적은 비밀번호 = 데이터베이스에 저장된 비밀번호
        session_start(); // 스코프가 긴 세션(브라우저 켜서 세션변수 할당! 끌때까지 살아있음)에 저장
        $_SESSION["login_user"] = $result; // 세션에 값을 박아줘야함. 값o=로그인o 값x=로그인x
        header("Location: list.php");
    }
    else {
        header("Location: login.php");
    }

?>

<!--
배열 : 부엌으로 따지면 쟁반. 여러개 값을 묶어서 저장
변수 1 : 하나의 값만 저장 (변수타입 : 리터럴값(값 그 자체), or 주소값)

M : DB관련 친구들
V : html css Javascript 관련
C : 관장하는 친구 (C V 분리 안되어있음)

- Session 세션 (=변수) . 배열. 여러개를 담을 수 있음.

$_SESSION["a"] = "안녕";
$_SESSION["b"] = "헬로우";


왜 담음? 나중에 쓰려고 담음. (나중에 빼려고)

$a = $_SESSION["a"];
안녕이 담겨있음

$_SESSION["login_user"] = $result
            키값            결과값

-연동해서 쓰고있지만, db 세션 둘은 별개다.
-->