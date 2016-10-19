<?php
session_start();

if (!isset($_SESSION["snum"]) || empty($_SESSION["snum"])) {
    echo "{\"success\": false, \"desc\": \"로그인을 먼저 해주세요.\"}";
    return ;
}

// 디비 연결 부분 인클루드
include("./dao.php");

$snum = $_SESSION["snum"];

// 쿼리 만드는 부분
$query = "SELECT (`waitpon` * `waittime`) AS `total_waittime`, `waitpon` AS `total_pon`, 
            SUM(`history`.`pon`) AS `online_pon`, (`waitpon` - SUM(`history`.`pon`)) AS `offilne_pon` FROM `store` 
            LEFT JOIN `history` ON `store`.`snum` = `history`.`snum` WHERE `snum`=$snum";

// 실제로 디비에 넣는 부분
$result = read($query);
if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $total_pon = $row["total_pon"];
    $online_pon = $row["online_pon"];
    $offline_pon = $row["offline_pon"];
    $total_waittime = $row["total_waittime"];

    echo "{
        \"success\": true, 
        \"store\": {
            \"total_pon\": \"$total_pon\",
            \"online_pon\": \"$online_pon\",
            \"offline_pon\": \"$offline_pon\",
            \"total_waittime\": \"$total_waittime\"
        }
    }";

} else {
    echo "{\"success\": false, \"desc\": \"현재 매장상황을 알 수 없습니다.\"}";
}
