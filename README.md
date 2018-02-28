## SER322_Project
Class Project for SER322
Team Members: 
Rudy Matthews
Joseph Reneer
Nicholas Walsh
Karen Zaunscherb


## Set Up Proceedures
This project is run using MySQL, Apache 2.4, and PHP 7. In order to run the program successfully on your computer, you must have all three properly installed on your system. 
Below are links for how to install each of the 3 systems. 

#Apache 2.4 and PHP 7
Detailed directions for installation of Apache and PHP7 can be found at the link below:
https://danielarancibia.wordpress.com/2015/09/27/installing-apache-2-4-and-php-7-for-development-on-windows/

Once those directions are followed, verify it by using the testing proceedures listed in the above page.

After that, ensure that you have php_mysql.dll and php_mysqli.dll files in your PHP ext library, as well as ensure that they are enabled. 
The dll files should be located in the php7/ext folder. If not, you may have to download your php7 again or download those modules again. 
Also, ensure that your php.ini file has been updated. This means you may have to go into the file. 
Ensure that you have commented out the appropriate line for where loadable extensions (modules) reside. 
For windows, that means removing the semicolon next to extension_dir and ensuring it is set to the appropriate location (ie "C:\php7\ext")
For example, it should look like the following:

; Directory in which the loadable extensions (modules) reside.
; http://php.net/extension-dir
; extension_dir = "./"
; On windows:
extension_dir = "C:\php7\ext"
;extension=php_mysql.dll
extension=php_mysqli.dll

#MySQL
Download and install MySQL from the following link: https://dev.mysql.com/downloads/installer/
You can install either workbench, or use the SQL Shell. Directions for setup of the database are completed using the Shell.

Open the mysql shell, and ensure you are under mysql-sql> (or similar). -js or other extensions will not work, so you may have to type in \sql to get to that screen.
The first step is to create a new user. Make sure you are connected - this can be done by connecting using the root@localhost. 
\connect root@localhost  and entering your password. 
Next, create the user:
CREATE USER 'bhweb'@'localhost' IDENTIFIED BY 'supersecure';
Connect to that database by entering:
\connect bhweb@localhost   and then etnering password: supersecure

You are now connected. The next step is to create the tables and database. 
