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
INSERT INTO students(Name, Roll_no, DSA, CAO, DC, OS, Math, WebEngr) VALUES
('Mahmudul Hasan Noman', '22cse001', 55, 60, 58, 66, 62, 70),
('Md Rayhan Khan', '22cse002', 50, 64, 59, 61, 65, 68),
('Lija Moni', '22cse003', 64, 84, 73, 72, 80, 85),
('Lazmi Rahman Ayman', '22cse004', 60, 66, 58, 64, 80, 85),
('Md Rayhan', '22cse005', 70, 75, 65, 74, 84, 82),
('Suria Hossain Bonna', '22cse006', 66, 72, 65, 70, 88, 85),
('Mahruf Alam Sowad', '22cse007', 75, 85, 75, 74, 86, 88),
('Durjoy Kundu', '22cse008', 60, 62, 67, 69, 66, 70),
('Sourav Debnath', '22cse009', 71, 82, 76, 74, 82, 85),
('Md Nayim Sheikh', '22cse010', 49, 66, 46, 67, 75, 76),
('Md Rayhanul Isalm Rony', '22cse011', 65, 82, 77, 76, 85, 87),
('Md Ibrahim Ali', '22cse012', 66, 84, 78, 73, 87, 82),
('Nazmul Hasan Shipon', '22cse013', 63, 74, 66, 75, 54, 87),
('Nayeem Islam Jibon', '22cse015', 44, 80, 56, 69, 65, 71),
('Riaj Shikder', '22cse016', 61, 84, 66, 67, 78, 89),
('Utsojet Paticor', '22cse017', 66, 85, 69, 67, 78, 88),
('Khan Md Omar Faruk', '22cse018', 56, 82, 63, 78, 85, 90),
('Shadia Khanom Shorna', '22cse019', 75, 80, 66, 70, 86, 74),
('Yeamin Talukdar', '22cse020', 66, 70, 54, 69, 77, 80),
('Omar Faruk', '22cse022', 42, 66, 51, 67, 52, 65),
('Likhon Mondol', '22cse023', 62, 82, 64, 69, 77, 75),
('Abdus Sakur', '22cse024', 61, 83, 64, 78, 85, 80);
