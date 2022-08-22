<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>로그인</title>
</head>
<body>
    <h1>로그인</h1>
    <form action="login_proc.php" method="post">
        <div><input type="text" name="uid" placeholder="아이디"></div>
        <div><input type="password" name="upw" placeholder="비밀번호"></div>
        <div><input type="submit" value="로그인"></div>
    </form>
    <a href="join.php">회원가입</a>
</body>
</html>

<!--
$a = 1;
$b = "1";

$a == $b : true
$a === $b : false (타입이 다르므로)

형변환 연습 필요!

form 태그 :  여러개의 값을 어떤 방식으로 한방에 보내기위해서
name에 적혀있는 값이 중요!

-->