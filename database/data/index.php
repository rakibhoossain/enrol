<?php
require_once('../../core/connect.php');


if($conn->query("SELECT * FROM city") == true){
	insert_city_names($conn);
}

if($conn->query("SELECT * FROM student") == true){
	insert_dummy_student($conn);
}

if($conn->query("SELECT * FROM user") == true){
	insert_dummy_user($conn);
}
if($conn->query("SELECT * FROM subject") == true){
	insert_dummy_subject($conn);
}

function insert_city_names($conn){
	$cities = array('BAGERHAT', 'BANDARBAN', 'BARGUNA', 'BARISAL', 'BHOLA', 'BOGRA', 'BRAHMANBARIA', 'CHANDPUR', 'CHAPAINAWABGANJ', 'CHITTAGONG', 'CHUADANGA', 'COMILLA', 'COX\'S BAZAR', 'DHAKA', 'DINAJPUR', 'FARIDPUR', 'FENI', 'GAIBANDHA', 'GAZIPUR', 'GOPALGANJ', 'HABIGANJ', 'JAMALPUR', 'JESSORE', 'JHALAKATI', 'JHENAIDAH', 'JOYPURHAT', 'KHAGRACHHARI', 'KHULNA', 'KISHOREGANJ', 'KURIGRAM', 'KUSHTIA', 'LAKSHMIPUR', 'LALMONIRHAT', 'MADARIPUR', 'MAGURA', 'MANIKGANJ', 'MEHERPUR', 'MOULVIBAZAR', 'MUNSHIGANJ', 'MYMENSINGH', 'NAOGAON', 'NARAIL', 'NARAYANGANJ', 'NARSINGDI', 'NATORE', 'NETROKONA', 'NILPHAMARI', 'NOAKHALI', 'PABNA', 'PANCHAGARH', 'PATUAKHALI', 'PIROJPUR', 'RAJBARI', 'RAJSHAHI', 'RANGAMATI', 'RANGPUR', 'SATKHIRA', 'SHARIATPUR', 'SHERPUR', 'SIRAJGANJ', 'SUNAMGANJ', 'SYLHET', 'TANGAIL', 'THAKURGAON',);
	$stmt = $conn->prepare("INSERT INTO city (name) VALUES (?)");
	foreach ($cities as $city) {
		$stmt->bind_param("s", $city);
		$stmt->execute();
	}
	echo $stmt->affected_rows .'insert city</br>';
	$stmt->close();
	// $conn->close();
}


function insert_dummy_user($conn){
  
	$stmt = $conn->prepare("INSERT INTO user (name, email, username, password, designation, phone, active) VALUES (?, ?, ?, ?, ?, ?, ?)");

  	$name = 'Rakib Hossain';
  	$email = 'rakibhoossain@gmail.com';
  	$username = 'root';
  	$password = md5('admin');
  	$designation = 'admin';
  	$phone = '01776217594';
  	$active = '1';

    $stmt->bind_param("sssssss",  $name, $email, $username, $password, $designation, $phone, $active);
    $stmt->execute();

    echo $stmt->affected_rows. 'insert user</br>';
    $stmt->close();
    // $conn->close();
}

function insert_dummy_student($conn){

	$roll = '5047';
	$name = 'Rakib Hossain';
	$class = 'Hons. Prof.';
	$subject = 'BSc in CSE';
	$gender = 'Male';
	$birth_date = '14-08-1996';
	$city = 'BAGERHAT';
	$address = 'BAGERHAT';
	$phone = '01776217594';
	$email = 'serakib@gmail.com';
	$image = 0;

	$stmt = $conn->prepare("INSERT INTO student (roll,name,class,subject,gender,birth_date,city,address,phone,email,image) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
	$stmt->bind_param("issssssssss", $roll, $name, $class, $subject, $gender, $birth_date, $city, $address, $phone, $email, $image);

    $stmt->execute();
    printf("%d Student inserted</br>", $stmt->affected_rows);
    $stmt->close();
    // $conn->close();
}


function insert_dummy_subject($conn){
	$subjects = array
	(
		array( '1001', 'BENGALI', 'HONOURS'),
		array( '1101', 'ENGLISH', 'HONOURS'),
		array( '1201', 'ARABIC', 'HONOURS'),
		array( '1501', 'HISTORY', 'HONOURS'),
		array( '1601', 'ISLAMIC HISTORY & CULTURE', 'HONOURS'),
		array( '1701', 'PHILOSOPHY', 'HONOURS'),
		array( '1801', 'ISLAMIC STUDIES', 'HONOURS'),
		array( '1901', 'POLITICAL SCIENCE', 'HONOURS'),
		array( '2001', 'SOCIOLOGY', 'HONOURS'),
		array( '2101', 'SOCIAL WORK', 'HONOURS'),
		array( '2201', 'ECONOMICS', 'HONOURS'),
		array( '2301', 'MARKETING', 'HONOURS'),
		array( '2401', 'FINANCE & BANKING', 'HONOURS'),
		array( '2501', 'ACCOUNTING', 'HONOURS'),
		array( '2601', 'MANAGEMENT', 'HONOURS'),
		array( '2701', 'PHYSICS', 'HONOURS'),
		array( '2801', 'CHEMISTRY', 'HONOURS'),
		array( '2901', 'BIO CHEMISTRY', 'HONOURS'),
		array( '3001', 'BOTANY', 'HONOURS'),
		array( '3101', 'ZOOLOGY', 'HONOURS'),
		array( '3201', 'GEOGRAPHY', 'HONOURS'),
		array( '3301', 'SOIL SCIENCE', 'HONOURS'),
		array( '3401', 'PSYCHOLOGY', 'HONOURS'),
		array( '3501', 'HOME ECONOMICS', 'HONOURS'),
		array( '3601', 'STATISTICS', 'HONOURS'),
		array( '3701', 'ATHEMATICS', 'HONOURS'),
		array( '3801', 'BRARY AND INFORMATION SCIENCE', 'HONOURS'),
		array( '3901', 'ACHELOR OF EDUCATION', 'HONOURS'),
		array( '4001', 'ANTHROPOLOGY', 'HONOURS'),
		array( '4101', 'PUBLIC ADMINISTRATION', 'HONOURS'),
		array( '4201', 'COMPUTER SCIENCE', 'HONOURS'),
		array( '4301', 'BUSINESS ADMINISTRATION', 'HONOURS'),
		array( '4401', 'ENVIRONMENTAL SCIENCES', 'HONOURS'),

		array( '5000', 'Science', 'Eleven'),
		array( '5001', 'Arts', 'Eleven'),
		array( '5002', 'Commerce', 'Eleven'),

		array( '6000', 'Science', 'Twelve'),
		array( '6001', 'Arts', 'Twelve'),
		array( '6002', 'Commerce', 'Twelve'),

		array( '7000', 'Science', 'BM'),
		array( '7001', 'Arts', 'BM'),
		array( '7002', 'Commerce', 'BM'),

		array( '8000', 'BSc', 'Degree Pass'),
		array( '8001', 'BBS', 'Degree Pass'),
		array( '8002', 'BCOM', 'Degree Pass'),

		array( '9000', 'BSc in CSE', 'Hons. Prof.'),
		array( '9001', 'ECE', 'Hons. Prof.'),
		array( '9002', 'BBA', 'Hons. Prof.'),
	);	

	$stmt = $conn->prepare("INSERT INTO subject (sub_code, sub_name, sub_class) VALUES (?, ?, ?)");

	foreach ($subjects as $subject) {
		$stmt->bind_param("sss",  $subject[0], $subject[1], $subject[2]);
		$stmt->execute();
	}
	echo $stmt->affected_rows .'insert Subject</br>';
	$stmt->close();
}