<?php
// Table structure for table `city`
include "../core/connect.php";

$drop_city = "DROP TABLE IF EXISTS `city`";

if ($conn->query($drop_city) === TRUE) {
    echo "Table city delete successfully";
} else {
    echo "Error deleting city table table: " . $conn->error;
}


$create_city = "
CREATE TABLE IF NOT EXISTS `city` (
  `code` int(4) NOT NULL,
  `name` varchar(25) NOT NULL,
  PRIMARY KEY (`code`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1";


if ($conn->query($create_city) === TRUE) {
    echo "Table city created successfully";
} else {
    echo "Error creating table: " . $conn->error;
}