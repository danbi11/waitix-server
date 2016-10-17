<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];


// 쿼리 만드는 부분
$query  = "SELECT * FROM user WHERE unum=$unum";

// 실제로 디비에 넣는 부분
read($query);

// 클라이언트한테 응답해주는 부분
echo "unum=".$row["unum"];
