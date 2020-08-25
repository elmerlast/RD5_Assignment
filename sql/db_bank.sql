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
UNIQUE KEY `acc_no` (`acc_no`),
constraint `fk_accounts_user_id` foreign key (user_id) references tbl_users (id) ON UPDATE CASCADE ON DELETE CASCADE
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
    `user_name`varchar(80) NOT NULL,
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

INSERT INTO `tbl_users` (`id`, `surname`, `given_name`, `user_name`, `email`, `password`, `gender`, `phone`, `bdate` )
VALUES
(1, '林', '佐博', 'vki2388', 'Arrom1989@gustr.com', '3dad07d9788c22561f37d9343d5e33dd6c123ae9d9617b3182873f7d7bccbb92','Male', '0911708319', '2015-01-03 16:35:37'),
(2, '黃', '宜珊', 'ios820z', 'muveffone-1814@yopmail.com', 'd8b763c8d6b3dde0960a49b144e418d4fe1edabc8e379ba1064adb40d2b1176d','Female', '0924803904', '2017-08-16 11:41:03'),
(3, '葉', '家銘', 'djc89oo22', 'tapeppave-9843@yopmail.com', 'f418dd08b196dfaf3444e1ff8ac3f9c4165f221876ddf0dadff8a2251f8eb03d','Male', '0929225336', '2017-01-20 14:11:40'),
(4, '張', '世偉', 'xxc2jjy3', 'xudokinneby-1466@yopmail.com', 'eb8536a5acde048fb1d542318119ea276122d3ac9fe6d9231fba53d18e3665d3','Male', '0961922175', '2015-09-04 10:03:24'),
(5, '王', '紹一', 'jib8cb2lk', 'unnosoleff-2307@yopmail.com', '3b2966c0210e4e977d0b796cd1814e3545c2291c8884be1d90e7ec47c0f63d08','Male', '0932919438', '2018-01-17 15:43:08');

--
-- 建立地址(tbl_users)資料表結構
--

CREATE TABLE `tbl_address` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `address` varchar(200) NOT NULL,
  `zipcode` int(10) NOT NULL,
  PRIMARY KEY (`id`),
  constraint `fk_address_user_id` foreign key (user_id) references tbl_users (id) ON UPDATE CASCADE ON DELETE CASCADE
)ENGINE=InnoDB;





--
-- 建立交易(tbl_transaction)資料表結構
--


CREATE TABLE `tbl_transaction` (
    `id` int(10) NOT NULL AUTO_INCREMENT,
    `accno_id` int(10) NOT NULL,
    `tx_no` varchar(24) NOT NULL,
    `tx_type` varchar(10) NOT NULL,
    `amount` double NOT NULL,
    `date` varchar(100) NOT NULL,
    `to_accno` varchar(20) NOT NULL,
    `status` varchar(10) NOT NULL,
    `comments` varchar(100) NOT NULL,
    PRIMARY KEY (`id`),
    constraint `fk_transaction_accounts` foreign key (accno_id) references tbl_accounts (id) ON UPDATE CASCADE ON DELETE CASCADE
-- )ENGINE=InnoDB AUTO_INCREMENT= ;
)ENGINE=InnoDB ;

--
-- 新增交易(tbl_transaction)資料表記錄
--

INSERT INTO `tbl_transaction` (`id`, `accno_id`, `tx_no`, `tx_type`, `amount`, `date`, `to_accno`, `status`, `comments`)
VALUES
(1, 1, 'TX000001', 'credit', 1000, '2018-02-10 11:32:38', '316116509321', 'SUCCESS', '' ),
(2, 1, 'TX000002', 'debit', 2104, '2018-02-12 18:50:08', '299023859801', 'SUCCESS', '網購' );











