<?php
    include_once "db/db_board.php";
    session_start(); // 세션키고
    if(isset($_SESSION["login_user"])) { // 로그아웃시 에러x (예외처리) // if문 안 ture false
        $login_user = $_SESSION["login_user"];
    }
    $i_board = $_GET["i_board"];
    $param = [
        "i_board" => $_GET["i_board"]
    ];
    $item = sel_board($param); // 선생님 네이밍 규칙) select table명, sel_board_list(1개 이상)
?>
</php><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?=$item["title"]?></title>
</head>
<body>
    <div><a href="list.php"><button>리스트</button></a></div>
        <?php if(isset($_SESSION["login_user"]) && $login_user["i_user"] === $item["i_user"]) { ?> <!-- 앞쪾 true && 뒤 있음-->
            <div>                                   <!-- 현재 로그인 유저 pk값 = DB상 유저 pk값 => 지금 로그인한 사람이 쓴 글 -->
            <a href="mod.php?i_board=<?=$i_board?>"><button>수정</button></a>
            <button onclick="isDel();">삭제</button>
            </div>
        <?php } ?>
    <div>제목 : <?=$item["title"]?></div>
    <div>글쓴이 : <?=$item["nm"]?></div>
    <div>등록일시 : <?=$item["created_at"]?></div>
    <div><?=$item["ctnt"]?></div>
    <script> // 자바스크립트
        function isDel(){
            console.log('isDel 실행 됨!!');
            // const result = confirm('삭제하시겠습니까?'); // 확인 : true 리턴, 취소 : false 리턴. 상수. 삭제버튼 누를때마다 새로운 상수 생성
            if(confirm('삭제하시겠습니까?')){ // confirm 내장함수 : true return(나를 호출한곳으로 어떠한 값을 가지고 데려간다) 한다/ flase return 한다
                location.href = "del.php?i_board=<?=$i_board?>"; // 자바스크립트에서 주소값 이동
            }
        }
    </script>
</body>
</html>


<!--
    detail 은 무조건 pk값이 필요
    ex 쇼핑몰 = 상품pk값 필요

    if(isset($_SESSION["login_user"]) && $login_user["i_user"] === $item["i_user"])
    글 작성한사람일 경우에만 수정, 삭제버튼

    && : 앞에 false떴는데 뒤쪽 굳이 체크할필요 없음.

    event : ~했을때 (발생될 때 까지 기다리고 있음)
    클릭했을때

    바인딩한다 : 어떤 함수와 클릭 이벤트를 연결시켜준다.

    함수호출 함수정의

    자바스크립트 문자열 홑따옴표 씀
-->