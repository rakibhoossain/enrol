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