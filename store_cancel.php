<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$snum = $_REQUEST["snum"];


// 쿼리 만드는 부분
$query  = "SELECT * FROM store WHERE snum=$snum";
//snum이 참조가 안되는거 같아용

// 실제로 디비에 넣는 부분
delete($query);

// 클라이언트한테 응답해주는 부분
echo "{\"sucess\": 삭제되었습니다.}";
