-- Create the database with utf8mb4 encoding and utf8mb4_0900_ai_ci collation
CREATE DATABASE IF NOT EXISTS trip_builder CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;
USE trip_builder;

-- Create airlines table
CREATE TABLE airlines (
    code CHAR(2) PRIMARY KEY,
    name VARCHAR(100) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

-- Insert airlines data
INSERT INTO airlines (code, name) VALUES
    ('AC', 'Air Canada');

-- Create airports table
CREATE TABLE airports (
    code CHAR(3) PRIMARY KEY,
    city_code CHAR(3) NOT NULL,
    name VARCHAR(100) NOT NULL,
    city VARCHAR(50) NOT NULL,
    country_code CHAR(2) NOT NULL,
    region_code CHAR(2) NOT NULL,
    latitude DECIMAL(9, 6) NOT NULL,
    longitude DECIMAL(9, 6) NOT NULL,
    timezone VARCHAR(50) NOT NULL
) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

-- Insert airports data
INSERT INTO airports (code, city_code, name, city, country_code, region_code, latitude, longitude, timezone) VALUES
    ('YUL', 'YMQ', 'Pierre Elliott Trudeau International', 'Montreal', 'CA', 'QC', 45.457714, -73.749908, 'America/Montreal'),
    ('YVR', 'YVR', 'Vancouver International', 'Vancouver', 'CA', 'BC', 49.194698, -123.179192, 'America/Vancouver');

-- Create flights table
CREATE TABLE flights (
    id INT AUTO_INCREMENT PRIMARY KEY,
    airline CHAR(2) NOT NULL,
    number INT NOT NULL,
    departure_airport CHAR(3) NOT NULL,
    departure_time TIME NOT NULL,
    arrival_airport CHAR(3) NOT NULL,
    arrival_time TIME NOT NULL,
    price DECIMAL(10, 2) NOT NULL,
    FOREIGN KEY (airline) REFERENCES airlines(code),
    FOREIGN KEY (departure_airport) REFERENCES airports(code),
    FOREIGN KEY (arrival_airport) REFERENCES airports(code)
) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci;

-- Insert flights data
INSERT INTO flights (airline, number, departure_airport, departure_time, arrival_airport, arrival_time, price) VALUES
    ('AC', 301, 'YUL', '07:35', 'YVR', '10:05', 273.23),
    ('AC', 302, 'YVR', '11:30', 'YUL', '19:11', 220.63);
