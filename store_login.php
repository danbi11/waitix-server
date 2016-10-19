<?php
    // 디비 연결 부분 인클루드
    include("./dao.php");
    session_start();

    // 파라미터 받는 부분
    $storeid = getConnection()->real_escape_string($_REQUEST["storeid"]);
    $password = getConnection()->real_escape_string($_REQUEST["password"]);

    // 쿼리 만드는 부분
    $query  = "SELECT `snum`, `name` FROM `store` WHERE `storeid` = '$storeid' AND `password` = password('$password')";

    // 실제로 디비에 넣는 부분
    $result = read($query);
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $snum = $row["snum"];
        $name = $row["name"];

        // 쿠키를 만드는 곳
        $_SESSION["snum"] = $snum;

        // 클라이언트한테 응답해주는 부분
        echo "{\"sucess\": true, \"desc\": \"$name 님 환영합니다.\"}";
    } else {
        echo "{\"sucess\": false, \"desc\": \"아이디 또는 비밀번호를 확인해주세요.\"}";
    }




