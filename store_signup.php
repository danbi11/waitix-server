<?php
    // 디비 연결 부분 인클루드
    include("./dao.php");

    // 파라미터 받는 부분
    $storeid = $_REQUEST["storeid"];
    $address = $_REQUEST["address"];
    $tel = $_REQUEST["tel"];
    $text = $_REQUEST["text"];
    $imgsrc = $_REQUEST["imgsrc"];
    $alarmtime = $_REQUEST["alarmtime"];
    $password = $_REQUEST["password"];

    // 쿼리 만드는 부분
    $query  = "INSERT INTO `store` (`storeid`, `address`, `tel`, `text`, `imgsrc`, `alarmtime`, `password`)
              VALUES ($storeid, '$address', '$tel', '$text', '$imgsrc', '$alarmtime', '$password')";

    // 실제로 디비에 넣는 부분
    create($query);

    // 클라이언트한테 응답해주는 부분
    echo "{\"sucess\": true, \"desc\": \"회원가입을 축하합니다.\"}";


