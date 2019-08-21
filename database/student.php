<?php
// Table structure for table `student`
include "../core/connect.php";

$drop_student = "DROP TABLE IF EXISTS `student`";

if ($conn->query($drop_student) === TRUE) {
    echo "Table student created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}


$create_student = "
CREATE TABLE IF NOT EXISTS `student` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `roll` int(10) NOT NULL,
  `name` varchar(50) NOT NULL,
  `class` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `gender` varchar(7) NOT NULL,
  `birth_date` text NOT NULL,
  `city` varchar(15) NOT NULL,
  `address` text NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `roll` (`roll`),
  UNIQUE KEY `roll_2` (`roll`)
) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1";


if ($conn->query($create_student) === TRUE) {
    echo "Table student created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}