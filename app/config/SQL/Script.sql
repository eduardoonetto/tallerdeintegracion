-- Crear la base de datos
CREATE DATABASE integration_workshop;
USE integration_workshop;

-- Crear un usuario con privilegios
CREATE USER 'erp_admin'@'localhost' IDENTIFIED BY 'Hash:12!';
GRANT ALL PRIVILEGES ON integration_workshop.* TO 'erp_admin'@'localhost';
FLUSH PRIVILEGES;

-- Crear la tabla de usuarios
CREATE TABLE Users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80),
    email VARCHAR(80) UNIQUE,
    password VARCHAR(128), -- Recomiendo usar VARCHAR(128) para contraseñas con hash
    change_password BOOLEAN
);

-- NOTA: Contraseña ABC123 con hash
INSERT INTO Users (name, email, password, change_password)
VALUES 	('EDUARDO ONETTO', 'testemail@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE),
		('ALEXIS MONTES', 'testemail2@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE),
		('GUSTAVO LARA', 'testemail3@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE),
		('LORENA PRIETO', 'testemail4@gmail.com', 'bbf2dead374654cbb32a917afd236656', FALSE);

-- Crear la tabla de roles
CREATE TABLE Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(80) UNIQUE -- Asegurar que los nombres de los roles sean únicos
);
select 
-- Roles predeterminados
INSERT INTO Roles (name) VALUES ('ADMIN'), ('SUPERVISOR'), ('BODEGA'), ('MECANICO');

-- Crear la tabla de asignación de roles a usuarios
CREATE TABLE Users_Roles (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    role_id INT,
    FOREIGN KEY (user_id) REFERENCES Users(id),
    FOREIGN KEY (role_id) REFERENCES Roles(id)
);

-- Asignar el rol de ADMIN a EDUARDO
INSERT INTO Users_Roles (user_id, role_id)
VALUES (1, 1),(2, 2),(3, 3),(4, 4); 

-- Ver roles y usuarios asignados usando una vista
CREATE OR REPLACE VIEW UserRolesView AS
SELECT
    U.name AS User_Name,
    U.email AS User_Email,
    R.name AS Role_Name
FROM
    Users AS U
JOIN Users_Roles AS UR ON U.id = UR.user_id
JOIN Roles AS R ON UR.role_id = R.id;

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
    patente VARCHAR(17) UNIQUE, -- Número de identificación del vehículo
    customer_id INT, -- ID del cliente propietario
    FOREIGN KEY (customer_id) REFERENCES Customers(id)
);


CREATE TABLE WorkOrders (
    id INT AUTO_INCREMENT PRIMARY KEY,
    vehicle_id INT, -- ID del vehículo relacionado
    date_created DATE,
    status VARCHAR(20), -- Estado de la orden (por ejemplo, "En Proceso", "Completada", "Pendiente")
    description TEXT,
    FOREIGN KEY (vehicle_id) REFERENCES Vehicles(id)
);
CREATE TABLE Services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    work_order_id INT, -- ID de la orden de trabajo relacionada
    service_name VARCHAR(100),
    cost DECIMAL(10, 2), -- Costo del servicio
    FOREIGN KEY (work_order_id) REFERENCES WorkOrders(id)
);
CREATE TABLE MaterialsUsed (
    id INT AUTO_INCREMENT PRIMARY KEY,
    service_id INT, -- ID del servicio relacionado
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
