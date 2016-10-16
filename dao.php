<?php
    define("MYSQL_HOST", "127.0.0.1");
    define("MYSQL_USER", "root");
    define("MYSQL_PASSWORD", "dms021");
    define("MYSQL_NAME", "waitix");

    // MySQL 데이터베이스 연결
    global $connection;
    $connection = new mysqli(MYSQL_HOST, MYSQL_USER, MYSQL_PASSWORD, MYSQL_NAME);

    // 연결 오류 발생 시 스크립트 종료
    if ($connection->connect_errno) {
        die('DB Connect Error: '.$connection->connect_error);
    }

    function create($query) {
        global $connection;
        if ($connection->query($query) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $query . "<br>" . $connection->error;
        }
        $connection->close();
    }

    function read($query) {
        global $connection;
        $result = $connection->query($query);
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "Row: " . $row;
            }
        } else {
            echo "0 results";
        }
        $connection->close();
        return $result;
    }

    function update($query) {
        global $connection;
        if ($connection->query($query) === TRUE) {
            echo "Record updated successfully";
        } else {
            echo "Error updating record: " . $connection->error;
        }
        $connection->close();
    }

    function delete($query) {
        global $connection;
        if ($connection->query($query) === TRUE) {
            echo "Record deleted successfully";
        } else {
            echo "Error deleting record: " . $connection->error;
        }
        $connection->close();
    }

