<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];
$snum = $_REQUEST["snum"];
$pon = $_REQUEST["pon"];

// 유저가 신청하는 부분
$requestQuery  = "UPDATE `user` SET `pon` = $pon, `snum` = $snum, `date`=NOW() WHERE `unum` = '$unum'";
update($requestQuery);

// 매장의 대기인원을 늘리는 부분
$increaseStoreWaitPon = "UPDATE `store` SET `waitpon` = `waitpon` + 1 WHERE `snum` = $snum";
update($increaseStoreWaitPon);

// 유저가 신청한 내역 기록하는 부분
$logQuery = "INSERT INTO `history` (`snum`, `pon`, `hdate`, `unum`) VALUES ($snum, $pon, NOW(), '$unum')";
create($logQuery);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": true, \"desc\": \"발급신청 되었습니다.\"}";
