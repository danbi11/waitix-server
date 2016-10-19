<?php
// 디비 연결 부분 인클루드
include("./dao.php");

// 파라미터 받는 부분
$storeid = $_REQUEST["storeid"];

$getStoresQuery = "SELECT * FROM store";
$result = read($getStoresQuery);

if ($result->num_rows > 0) {
    $stores = array();
    foreach($result->fetch_all() as $store) {
        $stores[] = $store;
    }
    $dumpedStores = json_encode($stores);
    echo "{\"success\": true, \"stores\": $dumpedStores}";

} else {
    echo "{\"success\": false, \"desc\": \"매장 정보가 없습니다.\"}";
}
