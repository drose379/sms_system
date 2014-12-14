create table `users` (
    `FirstName` varchar(50),
    `LastName` varchar(50),
    `Email` varchar(100) primary key,
    `Password` char(60)
)engine=innodb charset=utf8;