<?php
// 디비 연결 부분 인클루드
include("./dao.php");

$getStoresQuery = "SELECT * FROM store";
$result = read($getStoresQuery);

if ($result->num_rows > 0) {
    $stores = array();
    foreach($result->fetch_all(MYSQLI_ASSOC) as $store) {
        $stores[] = array(
            "snum" => $store["snum"],
            "storeid" => $store["storeid"],
            "name" => $store["name"],
            "waitpon" => $store["waitpon"],
            "waittime" => $store["waittime"],
            "address" => $store["address"],
            "tel" => $store["tel"],
            "text" => $store["text"],
            "imgsrc" => $store["imgsrc"]
        );
    }
    $dumpedStores = json_encode($stores);
    echo "{\"success\": true, \"stores\": $dumpedStores}";

} else {
    echo "{\"success\": false, \"desc\": \"매장 정보가 없습니다.\"}";
}

close();
