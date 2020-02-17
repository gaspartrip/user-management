create database users;
use users;

create table users(id int auto_increment,
				   code int,
				   firstname varchar(40),
                   lastname varchar(40),
                   email varchar(40),
                   constraint pk_users primary key(id),
                   constraint unq_users unique(code));