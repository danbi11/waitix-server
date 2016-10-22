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

    function getConnection() {
        global $connection;
        return $connection;
    }

    function close() {
        global $connection;
        $connection->close();
    }

    function create($query) {
        global $connection;
        $success = FALSE;
        try {
            $success = $connection->query($query);
        } finally {
            if ($success === FALSE) {
                echo "Error: ".$connection->error;
            }
            return $success;
        }
    }

    function read($query) {
        global $connection;
        $result = $connection->query($query);
        return $result;
    }

    function update($query) {
        global $connection;
        $success = FALSE;
        try {
            $success = $connection->query($query);
        } finally {
            if ($success === FALSE) {
                echo "Error: ".$connection->error;
            }
            return $success;
        }
    }

    function delete($query) {
        global $connection;
        $success = FALSE;
        try {
            $success = $connection->query($query);
        } finally {
            if ($success === FALSE) {
                echo "Error: ".$connection->error;
            }
            return $success;
        }
    }

