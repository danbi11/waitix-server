<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];

// 신청 내용을 취소하는 부분
$cancelUserRequest = "UPDATE `user` SET `pon` = NULL, `snum` = NULL WHERE `unum` = '$unum'";
update($cancelUserRequest);

// 대기인원을 줄이는 부분
$decreaseStoreWaitPon = "UPDATE `store` SET `waitpon` = `waitpon` - 1 WHERE `snum` = $snum";
update($decreaseStoreWaitPon);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": \"취소되었습니다.\"}";
