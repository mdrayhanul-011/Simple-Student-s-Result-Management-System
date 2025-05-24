DROP DATABASE IF EXISTS DBstudent;
CREATE DATABASE DBstudent;
use DBstudent;

CREATE table students(
    ID int(11) primary key not null auto_increment,
    Name varchar(50) not null,
    Roll_no varchar(15) unique not null,
    DSA int(11),
    CAO int(11),
    DC int(11),
    OS int(11),
    Math int(11),
    WebEngr int(11)
);