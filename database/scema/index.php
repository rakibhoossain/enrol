<?php
require_once('../../core/connect.php');

if($conn->query("SELECT * FROM city") == false){
	drop_city_table($conn);
	create_city_table($conn);
}

if($conn->query("SELECT * FROM student") == false){
	drop_student_table($conn);
	create_student_table($conn);
}

if($conn->query("SELECT * FROM user") == false){
	drop_user_table($conn);
	create_user_table($conn);
}

function drop_city_table($conn){
	$drop_city = "DROP TABLE IF EXISTS `city`";
	if ($conn->query($drop_city) === TRUE) {
	    echo "Table city delete successfully";
	} else {
	    echo "Error deleting city table table: " . $conn->error;
	}
}

function create_city_table($conn){
	$create_city = "
	CREATE TABLE IF NOT EXISTS `city` (
	  `id` int(4) NOT NULL AUTO_INCREMENT,
	  `name` varchar(25) NOT NULL,
	  PRIMARY KEY (`id`),
	  UNIQUE KEY `name` (`name`)
	) ENGINE=MyISAM DEFAULT CHARSET=latin1";


	if ($conn->query($create_city) === TRUE) {
	    echo "Table city created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}
}

function drop_student_table($conn){
	$drop_student = "DROP TABLE IF EXISTS `student`";

	if ($conn->query($drop_student) === TRUE) {
	    echo "Table student delete successfully";
	} else {
	    echo "Error deleting student table table: " . $conn->error;
	}
}

function create_student_table($conn){
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
	  UNIQUE KEY `roll` (`roll`)
	) ENGINE=MyISAM AUTO_INCREMENT=85 DEFAULT CHARSET=latin1";


	if ($conn->query($create_student) === TRUE) {
	    echo "Table student created successfully";
	} else {
	    echo "Error creating table: " . $conn->error;
	}
}

function drop_user_table($conn){
	$drop_user = "DROP TABLE IF EXISTS `user`";

	if ($conn->query($drop_user) === TRUE) {
	    echo "Table user delete successfully";
	} else {
	    echo "Error deleting user table: " . $conn->error;
	}
}

function create_user_table($conn){
	$create_user = "
	CREATE TABLE IF NOT EXISTS `user` (
	  `id` int(10) NOT NULL AUTO_INCREMENT,
	  `name` varchar(50) NOT NULL,
	  `email` varchar(50) DEFAULT NULL,
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
}


