<?php
    // 디비 연결 부분 인클루드
    include("./dao.php");

    // 파라미터 받는 부분
    $storeid = getConnection()->real_escape_string($_REQUEST["storeid"]);
    $name = getConnection()->real_escape_string($_REQUEST["name"]);
    $address = getConnection()->real_escape_string($_REQUEST["address"]);
    $tel = getConnection()->real_escape_string($_REQUEST["tel"]);
    $text = getConnection()->real_escape_string($_REQUEST["text"]);
    $imgsrc = getConnection()->real_escape_string($_REQUEST["imgsrc"]);
    $alarmtime = getConnection()->real_escape_string($_REQUEST["alarmtime"]);
    $password = getConnection()->real_escape_string($_REQUEST["password"]);

    // 쿼리 만드는 부분
    $query  = "INSERT INTO `store` (`storeid`, `name`, `address`, `tel`, `text`, `imgsrc`, `alarmtime`, `password`)
              VALUES ('$storeid', '$name', '$address', '$tel', '$text', '$imgsrc', '$alarmtime', password('$password'))";

    // 실제로 디비에 넣는 부분
    create($query);

    // 클라이언트한테 응답해주는 부분
    echo "{\"sucess\": true, \"desc\": \"회원가입을 축하합니다.\"}";


