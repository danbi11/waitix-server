<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];

// 새로운 유저기기를 등록하는 부분
$createOnlineUserQuery = "INSERT INTO `user` (`unum`, `offtix`) VALUES ('$unum', 'no')";
create($createOnlineUserQuery);

close();

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": true, \"desc\": \"유저가 등록되었습니다.\"}";
