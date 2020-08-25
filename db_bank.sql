CREATE DATABASE db_bank DEFAULT CHARACTER SET utf8;

use db_bank;

--
-- 建立帳戶(tbl_accounts)資料表結構
--

CREATE TABLE `tbl_accounts` (

`id` int(11) NOT NULL AUTO_INCREMENT,
`user_id` int(11) NOT NULL,
`acc_no` varchar(20) NOT NULL,
`balance` double NOT NULL,
`status` varchar(10) NOT NULL,
`bdate` varchar(100) NOT NULL,
PRIMARY KEY (`id`),
UNIQUE KEY `acc_no` (`acc_no`)
)ENGINE=InnoDB AUTO_INCREMENT=6 ;

--
-- 新增帳戶(tbl_accounts)資料表記錄
--

INSERT INTO `tbl_accounts` (`id`, `user_id`, `acc_no`, `balance`, `status`, `bdate`)
VALUES
(1, 1, '402973598398', 12500, 'ACTIVE', '2019-08-21 14:28:03'),
(2, 2, '316116509321', 4252, 'ACTIVE', '2017-03-09 11:32:40'),
(3, 3, '506565522164', 27123, 'ACTIVE', '2017-05-03 10:15:12'),
(4, 4, '943616572642', 32639, 'ACTIVE', '2018-11-14 13:22:01'),
(5, 5, '299023859801', 1050, 'INACTIVE', '2014-03-17 14:30:06');


--
-- 建立使用者(tbl_users)資料表結構
--

CREATE TABLE `tbl_users` (
    `id` int(11) NOT NULL AUTO_INCREMENT,
    `surname` varchar(40) NOT NULL,
    `given_name`varchar(80) NOT NULL,
    `email` varchar(100) NOT NULL,
    `password` varchar(120) NOT NULL,
    `gender` varchar(6) NOT NULL,
    `phone` varchar(20) NOT NULL,
    `bdate` varchar(100) NOT NULL,
    PRIMARY KEY(`id`),
    UNIQUE KEY `email` (`email`)
)ENGINE=InnoDB AUTO_INCREMENT=6 ;

--
-- 新增使用者(tbl_users)資料表記錄
--

INSERT INTO `tbl_users` (`id`, `surname`, `given_name`, `email`, `password`, `gender`, `phone`, `bdate` )
VALUES
(1, '林', '佐博', 'Arrom1989@gustr.com', '0d5a0fe6b4b7e8a26fee827d0eaec2302d42b8d4d089211b9909f5cca5c9d1da','Male', '0911708319', '2015-01-03 16:35:37'),
(2, '黃', '宜珊', 'muveffone-1814@yopmail.com', 'a097a2714e90763317edc7d02569d15780ca0ad2879f9be96981f6ec39098f3b','Female', '0924803904', '2017-08-16 11:41:03'),
(3, '葉', '家銘', 'tapeppave-9843@yopmail.com', '2c51ab09e18ef1224fa21447ce1bdb8a31d22977289b1481d1a6c6d9b642fdf5','Male', '0929225336', '2017-01-20 14:11:40'),
(4, '張', '世偉', 'xudokinneby-1466@yopmail.com', '094d363b7119916a5b18218588fe867fd1f2c5d50fa7cf029aba5ac32ad5ffdd','Male', '0961922175', '2015-09-04 10:03:24'),
(5, '王', '紹一', 'unnosoleff-2307@yopmail.com', '47ff6e251c81d81bb9707fa33045c230d873f44860ea76e110754250c94bb467','Male', '0932919438', '2018-01-17 15:43:08');

--
-- 建立地址(tbl_users)資料表結構
--

CREATE TABLE `tbl_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `zipcode` int(10) NOT NULL,
  PRIMARY KEY (`id`)
)ENGINE=InnoDB;





--
-- 建立交易(tbl_transaction)資料表結構
--


CREATE TABLE `tbl_transaction` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `tx_no` varchar(24) NOT NULL,
    `tx_type` varchar(10) NOT NULL,
    `amount` double NOT NULL,
    `date` varchar(100) NOT NULL,
    `to_accno` varchar(20) NOT NULL,
    `status` varchar(10) NOT NULL,
    `comments` varchar(100) NOT NULL,
    PRIMARY KEY (`id`)
-- )ENGINE=InnoDB AUTO_INCREMENT= ;
)ENGINE=InnoDB ;

--
-- 建立交易(tbl_transaction)資料表記錄
--

INSERT INTO `tbl_transaction` (`id`, `tx_no`, `tx_type`, `amount`, `date`, `to_accno`, `status`, `comments`)
VALUES
(1, 'TX000001', 'credit', 1000, '2018-02-10 11:32:38', '316116509321', 'SUCCESS', '' ),
(2, 'TX000002', 'debit', 2104, '2018-02-12 18:50:08', '299023859801', 'SUCCESS', '網購' );











