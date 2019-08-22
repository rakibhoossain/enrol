<?php
// Table structure for table `student`
include "../core/connect.php";

$drop_user = "DROP TABLE IF EXISTS `user`";

if ($conn->query($drop_user) === TRUE) {
    echo "Table user delete successfully";
} else {
    echo "Error deleting user table: " . $conn->error;
}


$create_user = "
CREATE TABLE IF NOT EXISTS `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `designation` varchar(20) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `active` varchar(15) NOT NULL,
  
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1";


if ($conn->query($create_user) === TRUE) {
    echo "Table user created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}