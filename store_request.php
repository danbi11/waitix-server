<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];
$snum = $_REQUEST["snum"];
$pon = $_REQUEST["pon"];

// 오프라인 유저를 만들고 신청하는 부분
$createOfflineUserQuery = "INSERT INTO `user` (`unum`, `date`, `pon`, `offtx`, `snum`) VALUES ('$unum', NOW(), $pon, 'yes', $snum)";
create($createOfflineUserQuery);

// 매장의 대기인원을 늘리는 부분
$increaseStoreWaitPon = "UPDATE `store` SET `waitpon` = `waitpon` + 1 WHERE `snum` = $snum";
update($increaseStoreWaitPon);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": true, \"desc\": \"오프라인 발급신청 되었습니다.\"}";
