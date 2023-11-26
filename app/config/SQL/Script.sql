
CREATE DATABASE integration_workshop;
USE integration_workshop;


CREATE USER 'erp_admin'@'localhost' IDENTIFIED BY 'Hash:12!';
GRANT ALL PRIVILEGES ON integration_workshop.* TO 'erp_admin'@'localhost';
FLUSH PRIVILEGES;


CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80),
    email VARCHAR(80) UNIQUE,
    password VARCHAR(128),
    change_password BOOLEAN
);

INSERT INTO Users (name, email, password, change_password)
VALUES 	('EDUARDO ONETTO', 'testemail@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE),
		('ALEXIS MONTES', 'testemail2@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE),
		('GUSTAVO LARA', 'testemail3@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE),
		('LORENA PRIETO', 'testemail4@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE);


CREATE TABLE Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) UNIQUE 
);

INSERT INTO Roles (name) VALUES ('ADMIN'), ('SUPERVISOR'), ('BODEGA'), ('MECANICO');

CREATE TABLE Users_Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    role_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (role_id) REFERENCES Roles(id)
);

INSERT INTO Users_Roles (user_id, role_id)
VALUES (1, 1),(2, 2),(3, 3),(4, 4); 


CREATE TABLE Inventories(
         id INT AUTO_INCREMENT PRIMARY KEY,
         item varchar(80),
         categoria varchar(80),
         valor varchar(80),
         umbral varchar(80),
         cantidad varchar(80)
         );

CREATE TABLE Customers (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80),
    email VARCHAR(80),
    phone VARCHAR(15),
    address VARCHAR(100),
    rut varchar(80)
);

CREATE TABLE Vehicles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    make VARCHAR(50),
    model VARCHAR(50),
    year INT,
    date_in date,
    reason_visit varchar(80),
    patente VARCHAR(17) UNIQUE, 
    customer_id INT, 
    FOREIGN KEY (customer_id) REFERENCES Customers(id)
);

CREATE TABLE Insurances(
	id INT AUTO_INCREMENT PRIMARY KEY,
    start_date date,
    end_date date,
    razon_social varchar(80),
    cobertura varchar(80)
    );

CREATE TABLE WorkOrders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT, 
    date_created DATE,
    status VARCHAR(20),
    description TEXT,
    FOREIGN KEY (vehicle_id) REFERENCES Vehicles(id)
);
CREATE TABLE Services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    work_order_id INT, 
    service_name VARCHAR(100),
    cost DECIMAL(10, 2), 
    FOREIGN KEY (work_order_id) REFERENCES WorkOrders(id)
);
CREATE TABLE MaterialsUsed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT,
    material_name VARCHAR(100),
    quantity INT,
    cost_per_unit DECIMAL(10, 2),
    FOREIGN KEY (service_id) REFERENCES Services(id)
);
CREATE TABLE MaterialInventory (
    id INT AUTO_INCREMENT PRIMARY KEY,
    material_name VARCHAR(100) UNIQUE,
    quantity INT,
    unit_price DECIMAL(10, 2)
);
