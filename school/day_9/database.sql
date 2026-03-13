create database product_db_api;

create table products(
    product_id smallint AUTO_INCREMENT PRIMARY_KEY,
    name varchar(255) not null,
    price decimal(255) not null,
    description text,
    is_deleted tinyint(1) default 0,
    created_at timestamp default current_timestamp,
    updated_at timestamp default current_timestamp,
    on update current_timestamp
);

