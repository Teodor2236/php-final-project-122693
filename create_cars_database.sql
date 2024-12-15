CREATE DATABASE cars;
CREATE USER 'cars_user'@'localhost' IDENTIFIED BY '123456';
GRANT ALL PRIVILEGES ON cars.* TO 'cars_user'@'localhost';
FLUSH PRIVILEGES;