use book_sale_sc;

create table books(
  book_id integer auto_increment primary key,
  title varchar(25),
  isbn varchar(25),
  category varchar(25),
  page_number smallint,
  unit_price decimal(6,2),
  is_deleted tinyint(1) default 0,
  created_at timestamp default current_timestamp,
  updated_at timestamp default current_timestamp on update current_timestamp
);

create table sale (
  sale_id bigint auto_increment primary key,
  sale_date datetime not null,
  staff_name varchar(100) not null,
  total_amount decimal(10,2) not null,
  created_at timestamp default current_timestamp,
  updated_at timestamp default current_timestamp on update current_timestamp
);

create table sale_detail (
  sale_id bigint not null,
  book_id integer not null,
  qty integer not null,
  unit_price decimal(6,2),
  amount decimal(10,2),
  primary key (sale_id, book_id),
  foreign key (sale_id) references sale(sale_id),
  foreign key (book_id) references books(book_id)
);
