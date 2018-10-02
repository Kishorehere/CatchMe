<?php
	define ('DB_Host','localhost');
	define ('DB_User','root');
	define ('DB_Password','123456');

	$conn = mysqli_connect(DB_Host,DB_User,DB_Password,'maps');
	if(!$conn){
		die("connection error".mysql_error());
		$dbcr="create database maps";
		if(!(mysqli_query($conn,$dbcr))){
			echo "Error creating the Database";
		}
	}
	$table="select * from users";
	if(!(mysqli_query($conn,$table))){
		$create1="create table users(id int(11) NOT NULL AUTO_INCREMENT,username varchar(255) NOT NULL,email varchar(255) NOT NULL, password varchar(255) NOT NULL, name varchar(255), firstName varchar(255), lastName varchar(255), PRIMARY KEY(id))";
		$ok1=mysqli_query($conn,$create1);
		$create2="create table info(id int(11) NOT NULL AUTO_INCREMENT,username varchar(255) NOT NULL, ruser varchar(255) NOT NULL, lat double NOT NULL, lon double NOT NULL, sos int(11) NOT NULL, PRIMARY KEY(id))";
		$ok2=mysqlia_query($conn,$create2);
		if((!ok1)||(!ok2)){
			echo "Error in creating tables";
		}

	}
?>