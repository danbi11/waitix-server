<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];
$snum = $_REQUEST["snum"];
$pon = $_REQUEST["pon"];


// 쿼리 만드는 부분
$query  = "INSERT INTO `user` (`unum`, `snum`, `pon`)
              VALUES ($unum, '$snum', '$pon')";

// 실제로 디비에 넣는 부분
create($query);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": true, \"desc\": \"오프라인 발급신청 되었습니다.\"}";
