-- Admins Table
CREATE TABLE `admins` (
  `Admin_id` INT AUTO_INCREMENT PRIMARY KEY,
  `Username` VARCHAR(50) NOT NULL,
  `Password` VARCHAR(255) NOT NULL,
  `Email` VARCHAR(100) NOT NULL
);

-- Bookings Table
CREATE TABLE `bookings` (
  `Booking_id` INT AUTO_INCREMENT PRIMARY KEY,
  `Customer_id` INT,
  `Vehicle_id` INT,
  `Start_date` DATE,
  `End_date` DATE,
  `Amount_due` DECIMAL(10,2),
  `Is_active` TINYINT(1),
  `Booking_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP(),
  FOREIGN KEY (`Customer_id`) REFERENCES `customers`(`Customer_id`),
  FOREIGN KEY (`Vehicle_id`) REFERENCES `cars`(`Vehicle_id`)
);

-- Cars Table
CREATE TABLE `cars` (
  `Vehicle_id` INT AUTO_INCREMENT PRIMARY KEY,
  `Model` VARCHAR(100),
  `Year` VARCHAR(4),
  `Type_Id` INT,
  `Status_Id` INT,
  FOREIGN KEY (`Type_Id`) REFERENCES `car_types`(`Type_Id`),
  FOREIGN KEY (`Status_Id`) REFERENCES `car_statuses`(`Status_Id`)
);

-- Car Photos Table
CREATE TABLE `car_photos` (
  `Photo_id` INT AUTO_INCREMENT PRIMARY KEY,
  `Vehicle_id` INT,
  `Photo` BLOB,
  FOREIGN KEY (`Vehicle_id`) REFERENCES `cars`(`Vehicle_id`)
);

-- Car Statuses Table
CREATE TABLE `car_statuses` (
  `Status_Id` INT AUTO_INCREMENT PRIMARY KEY,
  `Status` VARCHAR(50)
);

-- Car Types Table
CREATE TABLE `car_types` (
  `Type_Id` INT AUTO_INCREMENT PRIMARY KEY,
  `Type` ENUM('Compact','Medium','Large','SUV','Truck','Van'),
  `Weekly_rate` DECIMAL(10,2),
  `Daily_rate` DECIMAL(10,2)
);

-- Customers Table
CREATE TABLE `customers` (
  `Customer_id` INT AUTO_INCREMENT PRIMARY KEY,
  `Phone` VARCHAR(15),
  `First_name` VARCHAR(50),
  `Last_name` VARCHAR(50),
  `Customer_type` ENUM('Individual','Bank'),
  `Admin_id` INT,
  `Email` VARCHAR(255),
  `Password` VARCHAR(255),
  FOREIGN KEY (`Admin_id`) REFERENCES `admins`(`Admin_id`)
);
