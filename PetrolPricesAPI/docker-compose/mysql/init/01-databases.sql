# create databases
CREATE DATABASE IF NOT EXISTS `petrol-prices`;

# create local_developer user and grant rights
CREATE USER 'user'@'%' IDENTIFIED BY 'pass';
GRANT ALL ON `petrol-prices`.* TO 'user'@'%';


