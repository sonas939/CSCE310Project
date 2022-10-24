DROP DATABASE IF EXISTS build_a_bread;
CREATE DATABASE build_a_bread CHARSET utf8mb4;
USE build_a_bread;
CREATE TABLE Comments(
comment_id 		int      			not null primary key,
order_id		int			        not null references Orders(order_id),
comment_field 	varchar(300)       	null);

create table Orders(
order_id 		int            		not null primary key,
price_total 	FLOAT 				not null,
schedule_id		int					not null references Schedules(schedule_id),
profile_id		int					not null references Profiles(profile_id),
order_status 	int					not null);

create table Profiles(
profile_id		int            		not null primary key,
first_name		varchar(20)			not null,
last_name		varchar(20)			not null,
username		varchar(20)			not null,
password		varchar(20)			not null,
email			varchar(20)			null,
phone_number	varchar(20)			null,
user_type		int					not null);

create table Schedules(
schedule_id		int            		not null primary key,
order_id		varchar(20)			not null references Orders(order_id),
start_time		DATETIME			not null,
end_time		DATETIME			not null);

create table Items(
item_id			int            		not null primary key,
item_inventory	int					not null,
item_price		FLOAT 				null,
item_name		varchar(30)			not null);

create table Order_Lines(
item_id			int            		not null primary key references Items(item_id),
order_id		int					not null references Orders(order_id),
item_name		varchar(30)			not null references Items(item_name),
quantity_ordered int				not null);
-- primary key(item_id,order_id));