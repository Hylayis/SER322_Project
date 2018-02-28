# SER322_Project_BookHarmony
Class Project for SER322
Team Members: 
Rudy Matthews,
Joseph Reneer,
Nicholas Walsh,
Karen Zaunscherb


# Set Up Procedures
This project is run using MySQL, Apache 2.4.25, and PHP 7.2.2. In order to run the program successfully on your computer, you must have all three properly installed on your system. 
Below are links for how to install each of the 3 systems. 

## Apache 2.4.25 and PHP 7.2.2
Detailed directions for installation of Apache and PHP7 can be found at the link below:
https://danielarancibia.wordpress.com/2015/09/27/installing-apache-2-4-and-php-7-for-development-on-windows/

Once those directions are followed, verify it's working by using the testing proceedures listed in the above page.

After that, ensure that you have php_mysql.dll and php_mysqli.dll files in your PHP ext library, as well as ensuring that they are enabled. 
The dll files should be located in the php7/ext folder. If not, you may have to download your php7 again or download those modules again. 
Also, ensure that your php.ini file has been updated. This means you may have to go into the file. 
Ensure that you have commented out the appropriate line for where loadable extensions (modules) reside. 
For windows, that means removing the semicolon next to extension_dir and ensuring it is set to the appropriate location (ie "C:\php7\ext")
For example, it should look like the following:
```
; Directory in which the loadable extensions (modules) reside.
; http://php.net/extension-dir
; extension_dir = "./"
; On windows:
extension_dir = "C:\php7\ext"
extension=php_mysql.dll
extension=php_mysqli.dll
```

## MySQL
Download and install MySQL from the following link: https://dev.mysql.com/downloads/installer/
You can install either workbench, or use the SQL Shell. Directions for setup of the database are completed using the Shell.

Open the mysql shell, and ensure you are under mysql-sql> (or similar). -js or other extensions will not work, so you may have to type in \sql to get to that screen.
The first step is to create a new user. Make sure you are connected - this can be done by connecting using the root@localhost. 
```
\connect root@localhost 
```
and entering your password. 
Next, create the user:
```
CREATE USER 'bhweb'@'localhost' IDENTIFIED BY 'supersecure';
```
Connect to that database by entering:
```
\connect bhweb@localhost   
```
and then entering password: supersecure

You are now connected. The next step is to create the database:
Enter the following code:
```
create database bookharmony;
show databases;
use bookharmony;
```
This will create the database bookharmony and get you into the Book Harmony Database. The next step is to add the tables into the database.

Enter the following code: 
```
CREATE TABLE Authors(authorID INT(6) NOT NULL PRIMARY KEY, name CHAR(50), gender CHAR(1));
CREATE TABLE Users (userID INT(6) NOT NULL PRIMARY KEY, userName CHAR(50), DOB DATE, gender CHAR(1), email CHAR(100));
CREATE TABLE BooksRead (userID INT(6) NOT NULL, ISBN INT(11) NOT NULL, startDate DATE, finishDate DATE, rating DECIMAL(2,1), primary key(userID, ISBN));
CREATE TABLE Books (ISBN CHAR(11) NOT NULL PRIMARY KEY, title CHAR(100), author CHAR(50), pages INT(4), type CHAR(1), genre CHAR(30));
```

This will create your tables. 

The next step is to add the data to the tables. In order to this, we have created a tool in order to take the XML files and put them into the database. 
__NOTE: The database must be set up using the appropriate name and password or else it will not work properly.__

First step is to download the .xml files, as well as add.php and cleartables.php. Place those files into the same folder. 
In order to run, open a command window in the folder where those files are contained. What you will be doing is run the php.exe program alongside the add.php files. __Again, the .xml and .php files must be in the same folder.__
The following code (in your command terminnal) will only work if these are the locations of your php.exe and add.php files. Adjust according to your own preferences and set up. Also, it was tested with Windows 10. Note, it is just two file names next to each other. The first one is for the php.exe file, and the second is for the add.php file.
```
C:\php7\php.exe C:\users\user\ser322_project\add.php
```

This should automatically populate your database with the data from the xml files. If you'd like to clear your databse, do the same proceedure, only use the cleartables.php instead of the add.php file. For example:
```
C:\php7\php.exe C:\users\user\ser322_project\cleartables.php
```
Your set up should be complete after this. Keep in mind, that you do need to have data in your database in order to get the program to run. 

## Running the Program
To run the program simply place all of the php,html and xml files in your apache server directory, in our setup this was 
```
C:\Apache24\htdocs. 
```
Then open your browser and navigate to http://localhost/index.php. This should take you to the home page.
