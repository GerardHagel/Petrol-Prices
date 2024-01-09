# create databases
CREATE DATABASE IF NOT EXISTS `local_laravel`;

# create local_developer user and grant rights
CREATE USER 'user'@'db' IDENTIFIED BY 'pass';
GRANT ALL PRIVILEGES ON *.* TO 'user'@'%';

