-- backup： mysqldump -uroot -proot ums users hotelinfo -> backup.sql(in cmd)
-- restore: 1. create database ums; 2. use ums; 3. mysql -uroot -proot ums < C:\Users\User\backup.sql(in cmd)
-- Reference: http://www.booking.com/ The hotel info from booking.com


-- create database named "UMS"
CREATE DATABASE UMS;

USE UMS;


/*
	table name: securityLevel
	table description: this table is used to define user security level.
*/
CREATE TABLE securityLevel(
SecurityLevel_ID int PRIMARY KEY auto_increment,
SecurityDescription varchar(20)
);


-- insert two security level.
insert into securityLevel values(null, 'General');
insert into securityLevel values(null, 'Admin');


/*
	table name: Users
	table description: this table is used to hold user info include user name, password, and security level.
*/
CREATE TABLE Users(
User_ID  INT PRIMARY KEY auto_increment,
User_Name varchar(50),
Pass_Word varchar(50),
SecurityLevel_ID int,
FOREIGN KEY (SecurityLevel_ID) REFERENCES securityLevel(SecurityLevel_ID)
);




/*
	table name: HotelInfo
	table description: this table is used to hold hotel info include hotel name, hotel rating, location of this hotel(country and city), and free room.
*/
CREATE TABLE HotelInfo(
HotelInfo_ID  INT PRIMARY KEY auto_increment,
Hotel_Name nvarchar(50),
Hotel_Rating float,
Country varchar(50),
City varchar(50),
free_room int
)



-- insert some data for HotelInfo table.

-- Reference: http://www.booking.com/ The hotel info from booking.com

INSERT INTO HotelInfo
    (Hotel_Name, Hotel_Rating, Country, City, free_room)
VALUES
    ('Coast Coal Harbour Hotel', 8.8, 'Canada', 'Vancouver', 2),
    ('Rosewood Hotel Georgia', 9.4,'Canada', 'Vancouver', 6),
    ('Four Seasons Resort Whistler', 9.1, 'Canada', 'Whistler', 0),
    ('Grand Hotel & Suites', 9.4, 'Canada', 'Toronto', 5),
    ('BCMInns-Hinton', 8.6, 'Canada', 'Hinton', 20),
    ('The Quin', 8.7, 'USA', 'New York City', 10),
    ('The London NYC', 8.5, 'USA', 'New York City', 15),
    ('Villas at Pelican Hill', 9.0, 'USA', 'Newport Beach', 10),    
    ('Sofitel London Heathrow', 9.0, 'England', 'Healthrow', 0),
    ('Intercontinental London - The 02', 9.4, 'England', 'London', 2),
    ('Ennios Boutique Hotel', 8.9, 'England', 'Southampton', 17),
    ('Black Horse inn', 9.2, 'England', 'Northallerton', 1),
    ('London Marriott Hotel West India Quay', 8.9, 'England', 'London', 8),
    ('Judges Court', 8.6, 'England', 'York', 14),
    ('Montcalm Shoreditch London Tech City', 9.1, 'England', 'London', 6),
    ('The Three Crowns', 8.9, 'England', 'Chagford', 2),
    ('Fownes Hotel', 8.8, 'England', 'Worcester', 2),
    ('The Crown', 9.4,'England', 'Worcester', 6),
    ('Premier Inn Worcester City Centre', 9.1, 'England', 'Worcester', 0),
    ('Ye Olde Talbot Hotel', 9.4, 'England', 'Worcester', 5),
    ('The Worcester Witehouse Hotel', 8.6, 'England', 'Worcester', 20),
    ('Severn View Hotel', 8.7, 'England', 'Worcester', 10),
    ('The Pear Tree Inn&Country Hotel', 8.5, 'England', 'Worcester', 15),
    ('The Dewdrop Inn', 8.8, 'England', 'Worcester', 2),
    ('Diglis House Hotel', 9.4,'England', 'Worcester', 6),
    ('Pitmaston Apartments', 9.1, 'England', 'Worcester', 0),
    ('YWalter de Cantelupe Inn', 9.4, 'England', 'Worcester', 5),
    ('St.Lawrence Hotel', 8.6, 'England', 'Worcester', 20),
    ('Osborne House', 8.7, 'England', 'Worcester', 10),
    ('Daybrook House', 8.5, 'England', 'Worcester', 15),
    ('Holiday Inn Express London Standsted', 9.4, 'England', 'Stansted Mountifitchet', 5),
    ('Bloc Hotel Gatwick', 8.6, 'England', 'Gatwick', 20),
    ('The Piccadilly London West End', 8.7, 'England', 'London', 10),
    ('The Montcalm Marble Arch', 8.5, 'England', 'London', 15),
    ('Britannia Hotel Birmingham', 8.8, 'England', 'Birmingham', 2),
    ('Park Regis Birmingham', 9.4,'England', 'Birmingham', 6),
    ('Radisson Blu Hotel', 9.1, 'England', 'Leeds', 0),
    ('Village Hotel Leeds North', 9.4, 'England', 'Leeds', 5),
    ('Leeds Marriott Hotel', 8.6, 'England', 'Leeds', 20),
    ('Park Plaza Leeds', 8.7, 'England', 'Leeds', 10),
    ('Argyll Hotel', 8.5, 'England', 'Glasgow', 15),
    ('Villas at Pelican Hill', 9.0, 'USA', 'Newport Beach', 10);