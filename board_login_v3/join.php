<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Do+Hyeon&family=Noto+Sans+KR:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/join.css">
    <link rel="stylesheet" href="css/common.css">
    <title>회원가입</title>
</head>

<body>
    <div class="container">

        <h1>회원가입</h1>
        <form action="join_proc.php" method="post">
            <div><input type="text" name="uid" id="uid" placeholder="아이디"><input type="button" value="중복검사" onclick="checkid();"></div>
            <div><input type="password" name="upw" placeholder="비밀번호"></div>
            <div><input type="password" name="confirm_upw" placeholder="비밀번호 확인"></div>
            <div><input type="text" name="nm" placeholder="이름"></div>
            <div>성별 : <label>여자<input type="radio" name="gender" value="0" checked></label>
                <label>남자<input type="radio" name="gender" value="1"></label>
            </div>
            <div>
                <input type="submit" value="회원가입">
                <input type="reset" value="초기화">
            </div>
            <a href="login.php">로그인</a>
        </form>

        <script>
            function checkid() {
                var userid = document.getElementById("uid").value;
                if (userid) {
                    url = "check.php?userid=" + userid;
                    window.open(url, "chkid", "width=300,height=100");
                } else {
                    alert("아이디를 입력하세요");
                }
            }
        </script>
    </div>
</body>

</html>

<!-- 아이디 중복검사, 비밀번호 일치확인 기능 -->