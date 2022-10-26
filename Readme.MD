# A Content Manegement Suystem using PHP and MySQL

## Link to app

To see the app working please go to
<https://mmbank.herokuapp.com/>

## Preparation for hosting the project on a server

### 1. copy the project

copy the project into the folder that your PHP server uses for hosting  

### 2. import the mmbank database

in windows-gitbash or linux cd into the bin folder of mysql and copy the mmbank.sql from the project folder into bin foder.
after that login into mysql and ceate an empty database called mmbank:
CREATE DATABASE mmbank;
then log out of mysql and use the following code to import the mmbank database into your mysql server:
./mysql -uroot -pmysql mmbank < mmbank.sql
if error occurs, use PHPMyAdmin or MySQLWorkbench to import the mmbank.sql into your MySQL, they may help.
