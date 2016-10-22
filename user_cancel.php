<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];

// 대기인원을 줄이는 부분
$decreaseStoreWaitPon = "UPDATE `store` INNER JOIN `user` ON `store`.`snum` = `user`.`snum` SET `waitpon` = `store`.`waitpon` - `user`.`pon`";
update($decreaseStoreWaitPon);

// 신청 내용을 취소하는 부분
$cancelUserRequest = "UPDATE `user` SET `pon` = NULL, `snum` = NULL WHERE `unum` = '$unum'";
update($cancelUserRequest);

close();

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": \"취소되었습니다.\"}";
