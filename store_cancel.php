<?php
session_start();

if (!isset($_SESSION["snum"]) || empty($_SESSION["snum"])) {
    echo "{\"success\": false, \"desc\": \"로그인을 먼저 해주세요.\"}";
    return ;
}

// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];

// 오프라인 유저를 지우는 부분(취소 + 오프라인 유저 가입 해제)
$deleteOfflineUser = "DELETE FROM `user` WHERE `unum` = $unum AND `offtix` = 'yes'";
delete($cancelUserRequest);

// 대기인원을 줄이는 부분
$decreaseStoreWaitPon = "UPDATE `store` SET `waitpon` = `waitpon` - 1 WHERE `snum` = $snum";
update($decreaseStoreWaitPon);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": \"취소되었습니다.\"}";
