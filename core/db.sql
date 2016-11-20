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
	select task_id, task_message, DATE_FORMAT(task_createTime,'%d %b %Y %h:%i %p') as createTime, ts.estado
    from tasks ts join
    tasklists tl on ts.tasklist_id = tl.tasklist_id
    join users us on tl.tasklist_user_id = us.user_id
    where ts.tasklist_id = tlist and 
    tl.tasklist_user_id = userid and
    ts.estado_f = 1
    order by task_id desc;

end //
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

delimiter //
create procedure GetSingleTask(in id int)
begin
	select task_id, 
    task_message,
    DATE_FORMAT(task_createTime,'%d %b %Y %h:%i %p') as createTime, 
    estado from tasks
    where task_id = id;
    
end //

create procedure DeleteTask(in taskid int, in listid int)
begin
	update tasks set estado_f = 0 where task_id = taskid 
    and tasklist_id = listid;
end //

delimiter //
create procedure ChangeTaskState(in taskid int, in listid int)
begin
	set @state = (Select estado from tasks where task_id = taskid and tasklist_id = listid);
    
    if @state = 1 then
		update tasks set estado = 0 where task_id = taskid and tasklist_id = listid;
	else 
		update tasks set estado = 1 where task_id = taskid and tasklist_id = listid;
	end if;
end //

delimiter ;

delimiter // 
create procedure ChangeTaskMessage(in id int, in message varchar(40))
begin
	update tasks set task_message = message
	where task_id = id;
end //

call ChangeTaskMessage(1, 'hola');

delimiter ;