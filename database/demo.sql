CREATE DATABASE food_kingdom CHARACTER SET utf8 COLLATE utf8_unicode_ci;
use food_kingdom;
create table banner(
	id varchar(10) primary key,
    name varchar(200),
    image text,
    content text,
    status tinyint DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE users(
	id bigint PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    email varchar(255),
    code text,
    avatar text,
    password varchar(255),
    remember_token varchar(255),
    deleted tinyint default 1, 
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
create table customer(
	id bigint PRIMARY KEY AUTO_INCREMENT,
    first_name varchar(255),
    last_name varchar(255),
    email varchar(255),
    avatar text,
    birth date,
    address varchar(255),
    gender tinyint DEFAULT 0,
    password varchar(255),
    provider varchar(255),
    provider_id text,
    phone varchar(20),
    remember_token varchar(255),
    username varchar(255),
    point int DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE customer_type(
	id int primary key AUTO_INCREMENT,
    name varchar(255),
    bonus text,
    condition_type text,
    sale_percent int DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
create TABLE customer_type_history(
	customer_id bigint,
    type_id int,
    deleted tinyint default 1,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (type_id) REFERENCES customer_type(id)    
);
create TABLE category(
	id int PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    slug varchar(255),
    deleted tinyint default 1,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
create TABLE menu(
	id bigint PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    slug varchar(255),
    image text,
    image_list text,
    price float DEFAULT 0,
    description text,
    sale float DEFAULT 0,
    status tinyint DEFAULT 0,
    deleted tinyint default 1,
    cat_id int,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (cat_id) REFERENCES category(id)
);
create TABLE service(
	id bigint PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    slug varchar(255),
    image text,
    price float DEFAULT 0,
    sale float DEFAULT 0,
    type int,
    description text,
    status tinyint DEFAULT 0,
    deleted tinyint default 1,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE service_menu(
	service_id bigint,
    product_id bigint,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (service_id) REFERENCES service(id),
    FOREIGN KEY (product_id) REFERENCES menu(id)
);
CREATE TABLE tag(
	id bigint PRIMARY KEY AUTO_INCREMENT,
    name varchar(255),
    slug varchar(255),
    deleted tinyint default 1,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
CREATE TABLE blog(
	id bigint PRIMARY KEY AUTO_INCREMENT,
    title varchar(255),
    slug varchar(255),
    image text,
    writer bigint,
    view bigint,
    content text,
    status tinyint DEFAULT 0,
    deleted tinyint default 1,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (writer) REFERENCES users(id)
);
create TABLE blog_editer(
	blog_id bigint,
    editer bigint,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (blog_id) REFERENCES blog(id),
    FOREIGN KEY (editer) REFERENCES users(id)
);
CREATE TABLE blog_tag(
	blog_id bigint,
    tag_id bigint,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (blog_id) REFERENCES blog(id),
    FOREIGN KEY (tag_id) REFERENCES tag(id)
);
create table comments(
    id varchar(255) primary key,
	blog_id bigint,
    customer_id bigint,
    parent_id varchar(255),
    content text,
    status tinyint DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (blog_id) REFERENCES blog(id),
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (parent_id) REFERENCES comments(id)
);
create table orders(
	id varchar(255) primary KEY,
    first_name varchar(255),
    last_name varchar(255),
    address text,
    email varchar(255),
    phone varchar(20),
    table_count int DEFAULT 1,
    customer_id bigint,
    service_id bigint,
    service_type int,
    status tinyint DEFAULT 0,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (customer_id) REFERENCES customer(id),
    FOREIGN KEY (service_id) REFERENCES service(id)
);
create table order_detail(
	order_id varchar(255),
    product_id bigint,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES menu(id)
);
create table password_resets(
	id int PRIMARY KEY AUTO_INCREMENT,
    email varchar(255),
    token text,
    created_at timestamp DEFAULT CURRENT_TIMESTAMP,
    updated_at timestamp DEFAULT CURRENT_TIMESTAMP
);
insert into users(name,password,code,email) VALUES 
("admin","$2y$10$UCJIUNNZevrpIHCPK7sXte.3Qq8NrASALpA5jaEhRAUoCdOFq13fC","03112000","admin@gmail.com");