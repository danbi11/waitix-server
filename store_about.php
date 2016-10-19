<?php
session_start();

if (!isset($_SESSION["snum"]) || empty($_SESSION["snum"])) {
    echo "{\"success\": false, \"desc\": \"로그인을 먼저 해주세요.\"}";
    return ;
}

// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$snum = $_SESSION["snum"];

// 쿼리 만드는 부분
$query = "SELECT * FROM store WHERE snum = $snum";

// 실제로 디비에 넣는 부분
$result = read($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $storeid = $row["storeid"];
    $name = $row["name"];
    $address = $row["address"];
    $tel = $row["tel"];
    $text = $row["text"];
    $imgsrc = $row["imgsrc"];
    $alarmtime = $row["alarmtime"];
    $password = $row["password"];

    echo "{
            \"success\": true,
            \"store\": {
                \"storeid\": \"$storeid\",
                \"name\": \"$name\",
                \"address\": \"$address\",
                \"tel\": \"$tel\",
                \"text\": \"$text\",
                \"imgsrc\": \"$imgsrc\",
                \"alarmtime\": \"$alarmtime\"
            }
    }";
} else {
    echo "{\"success\": false, \"desc\": \"찾을 수 없는 매장입니다.\"}";
}


