create database if not exists tasklist;
use tasklist;

create table if not exists users(
	user_id int auto_increment primary key,
	user varchar(30) unique not null,
	pass varchar(250) unique not null,
	estado bit default 1
);


create table if not exists tasklists(
	tasklist_id int auto_increment primary key,
	tasklist_name varchar(30) not null,
	tasklist_user_id int not null,
	constraint `fk_tasklist_user` foreign key (tasklist_user_id)
	references users(user_id)
);


create table if not exists tasks(
	task_id int auto_increment primary key,
	task_title varchar(30) null,
	task_message varchar(50) not null,
	estado bit default 1,
	tasklist_id int not null,
	constraint `fk_task_tklist`foreign key (tasklist_id)
	references tasklists(tasklist_id)
);