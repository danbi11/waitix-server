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
$storeid = $_REQUEST["storeid"];
$address = $_REQUEST["address"];
$tel = $_REQUEST["tel"];
$text = $_REQUEST["text"];
$imgsrc = $_REQUEST["imgsrc"];
$alarmtime = $_REQUEST["alarmtime"];
$password = $_REQUEST["password"];

$updateFields = array();
if (!empty($storeid)&&isset($storeid)) $updateFields[] = "`storeid` = '$storeid'";
if (!empty($address)&&isset($address)) $updateFields[] = "`address` = '$address'";
if (!empty($tel)&&isset($tel)) $updateFields[] = "`tel` = '$tel'";
if (!empty($text)&&isset($text)) $updateFields[] = "`text` = '$text'";
if (!empty($imgsrc)&&isset($imgsrc)) $updateFields[] = "`imgsrc` = '$imgsrc'";
if (!empty($alarmtime)&&isset($alarmtime)) $updateFields[] = "`alarmtime` = '$alarmtime'";
if (!empty($password)&&isset($password)) $updateFields[] = "`password` = password('$password')";

// 쿼리 만드는 부분
$query = "UPDATE `store` SET ".implode(",", $updateFields)." WHERE `snum`=$snum";
echo $query;

// 실제로 디비에 넣는 부분
update($query);

close();

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": true, \"desc\": \"수정되었습니다.\"}";


