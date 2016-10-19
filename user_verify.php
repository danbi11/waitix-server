<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$unum = $_REQUEST["unum"];

// 쿼리 만드는 부분
$query  = "SELECT * FROM `user` INNER JOIN `store` ON `user`.`snum` = `store`.`snum` WHERE `unum`='$unum'";

// 실제로 디비에 넣는 부분
$result = read($query);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();

    $pon = $row["pon"];
    $date = $row["date"];
    $waitpon = $row["waitpon"];
    $waittime = $row["waittime"];
    $storeName = $row["name"];

    echo "{
        \"success\": true, 
        \"current\": {
            \"pon\": \"$pon\",
            \"date\": \"$date\",
            \"waitpon\": \"$waitpon\",
            \"waittime\": \"$waittime\",
            \"storeName\": \"$storeName\"
        }
    }";

} else {
    echo "{\"success\": false, \"desc\": \"유저 정보가 없습니다.\"}";
}
