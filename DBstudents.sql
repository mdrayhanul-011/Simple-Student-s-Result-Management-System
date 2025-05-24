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
insert into students (Name, Roll_no, DSA, CAO, DC, OS, Math, WebEngr) 
values
('Rayhan Islam', '22CSE011', 85, 90, 78, 88, 92, 95),
('Ibrahim Ali', '22CSE012', 72, 80, 82, 85, 78, 80),
('Abdus Sakur', '22CSE013', 60, 95, 88, 92, 85, 87),
('Md. Abdullah', '22CSE014', 62, 75, 80, 78, 82, 76),
('Imam Hossian', '22CSE015', 77, 85, 90, 92, 95, 89);