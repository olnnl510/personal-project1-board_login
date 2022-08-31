<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/login.css">
    <link rel="stylesheet" href="css/common.css">
    <title>로그인</title>
</head>

<body>
    <div class="container">

        <h1>로그인</h1>
        <form action="login_proc.php" method="post">
            <div><input type="text" name="uid" placeholder="아이디"></div>
            <div><input type="password" name="upw" placeholder="비밀번호"></div>
            <div><input type="submit" value="로그인"></div>
        </form>
        <a href="join.php">회원가입</a>
    </div>
</body>

</html>