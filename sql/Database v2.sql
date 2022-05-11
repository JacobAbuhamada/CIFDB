
#CIF Database v2.0
#Jacob Abuhamada
#3/3/2022

#create database cifdb;
#use cifdb;


create table user (
	ID int(11) not null AUTO_INCREMENT,
	email varchar(100) not null UNIQUE,
 	password varchar(60) not null,
	join_date date,
	primary key (ID)
	);

create table profile (
	ID int(8) not null,
	DOB date not null,
	gender int(1),
  	trans int(1),
	race int(1),
	ethnicity varchar(255), 
	religion varchar(255), 
	econ_stance int(1),
	cultural_stance int(1),
	education varchar(64),
	country varchar(64),
	zip int(5),
	soc_class int(1), 
	vet_status int(1), 
	dis_status int(1),
	maj_depression int(1),
	min_depression int(1),
	GAD int(1),
	PTSD int(1),
	social_anx int(1),
	OCD int(1),
	DID int(1),
	dissociative int(1),
	bipolar int(1),
	psychotic int(1),
	personality int(1),
	sleep int(1),
	eating int(1),
	dementia int(1), 
	known_diagnoses varchar(1000), 
	susp_diagnoses varchar(1000), 
	medications varchar(1000),
	primary key(ID, DOB),
	foreign key(ID) references user(ID) on delete cascade on update cascade
	);

create table vectors (
	ID int(8) not null,
	v_time time not null,
	v_date date not null,
	X float(2,1) not null,
	Y float(2,1) not null,
	Z float(2,1) not null,
	SoS int(1) not null,
	description varchar(300) not null,
	past_or_pres int(1) not null,
	primary key (ID, v_time, v_date),
	foreign key(ID) references user(ID) on delete cascade on update cascade
	);

