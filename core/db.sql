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
    task_createTime datetime not null default now(),
	estado bit default 1,
    estado_f bit default 1,
	tasklist_id int not null,
	constraint `fk_task_tklist`foreign key (tasklist_id)
	references tasklists(tasklist_id)
);



# __sp__
delimiter //
create procedure GetTask(in tlist int, in userid int)
begin
	select task_id, task_title, task_message, DATE_FORMAT(task_createTime,'%d %b %Y %h:%i %p') as createTime, ts.estado
    from tasks ts join
    tasklists tl on ts.tasklist_id = tl.tasklist_id
    join users us on tl.tasklist_user_id = us.user_id
    where ts.tasklist_id = tlist and 
    tl.tasklist_user_id = userid;

end  //
delimiter ;


delimiter //
create procedure EmptyList(in userid int)
begin
	select count(*) from tasks ts join
tasklists tk on tk.tasklist_id = ts.tasklist_id
join users us on us.user_id = tk.tasklist_user_id
where us.user_id = userid;
end //

delimiter ;