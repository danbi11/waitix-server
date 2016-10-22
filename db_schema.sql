CREATE TABLE `history` (
 `snum` varchar(100) NOT NULL,
 `pon` int(20) NOT NULL,
 `hdate` date NOT NULL,
 `unum` varchar(100) NOT NULL,
 KEY `index_history_unum` (`unum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8


CREATE TABLE `store` (
 `snum` int(10) NOT NULL AUTO_INCREMENT,
 `storeid` varchar(10) CHARACTER SET utf8mb4 NOT NULL,
 `name` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
 `waitpon` int(10) NOT NULL,
 `waittime` int(10) NOT NULL,
 `address` varchar(30) CHARACTER SET utf8mb4 NOT NULL,
 `tel` varchar(20) CHARACTER SET utf8mb4 NOT NULL,
 `text` text CHARACTER SET utf8mb4 NOT NULL,
 `imgsrc` varchar(100) CHARACTER SET utf8mb4 NOT NULL,
 `alarmtime` int(20) NOT NULL,
 `password` text CHARACTER SET utf8mb4 NOT NULL,
 PRIMARY KEY (`snum`),
 UNIQUE KEY `UQ_store_storeid` (`storeid`)
) ENGINE=InnoDB AUTO_INCREMENT=13 DEFAULT CHARSET=utf8


CREATE TABLE `user` (
 `unum` varchar(100) NOT NULL,
 `date` date NOT NULL,
 `pon` int(10) NOT NULL,
 `alarm` varchar(10) NOT NULL,
 `offtix` varchar(5) NOT NULL,
 `snum` int(20) NOT NULL,
 PRIMARY KEY (`unum`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8