<?php
    define("URL", "localhost");
    define("USERNAME", "root");
    define("PASSWORD", "506greendg@");
    define("DB_NAME", "board_login");
    define("PORT", "3306");

    function get_conn()
    {
        return mysqli_connect(URL, USERNAME, PASSWORD, DB_NAME, PORT);
    }

// 커넥션 담당
// htdoc : httpdocument

// -db
// db_board.php
// db_user.php
// db.php

// -
// css

// join.php
// join_proc.php

// login.php
// login_proc.php
// logout.php

// write.php
// write_proc.php

// list.php
// detail.php

// mod.php
// mod_proc.php

// del.php

// 팩토리얼.. 피보아치 수열..