<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$snum = $_REQUEST["snum"];
$waitpon = $_REQUEST["waitpon"];
$waittime = $_REQUEST["waittime"];


// 쿼리 만드는 부분
$query  = "SELECT * FROM store WHERE snum=$snum";

// 실제로 디비에 넣는 부분
read($query);

// 클라이언트한테 응답해주는 부분
echo "매장 상황을 뿌려줍니다.";//대기시간,대기인원 나타내주기
