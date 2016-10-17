<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$snum = $_REQUEST["snum"];
$storeid = $_REQUEST["storeid"];
$address = $_REQUEST["address"];
$tel = $_REQUEST["tel"];
$text = $_REQUEST["text"];
$imgsrc = $_REQUEST["imgsrc"];
$alarmtime = $_REQUEST["alarmtime"];
$password = $_REQUEST["password"];

// 쿼리 만드는 부분
$query  = "UPDATE store SET storeid='$storeid', address='$address', tel='$tel', text='$text', 
            imgsrc='$imgsrc', alarmtime='$alarmtime', password='$password'
            WHERE snum=$snum";

// 실제로 디비에 넣는 부분
update($query);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": true, \"desc\": \"수정되었습니다.\"}";


