##<center>**Customer Relationship Management**</center>

===========================================================================





###**System Requirements**
---
> * PHP 
* MySQL v4.1.1 or later (v5+ is recommended)

###**Installation**
---
>Installation on Microsoft Windows:

>This procedure describes installation of Customer Relationship Management. It works with Windows 7and Windows 8. You should back up your important files before trying this or any other installation. Requirements:
<li>Installation of Microsoft Windows 7 or 8</li>
<li>Single, working network connection with a fixed IP address</li>
<li>Ability to use the Windows GUI and command prompt</li>
<li>Any 3rd party firewall configured correctly during installation</li>

Needed software to be downloaded:
<li> Customer Relationship Management</li>
<li> XAMPP</li>
<li> Sublime Text 3</li>

(A)Install XAMPP



1. Double-click xampp-win32-1.7.4-VC6-installer.exe
2. Wait for installer to verify, choose language, and default installation folder
3. On XAMPP Options screen, tick Install MySQL as service, then click Install, wait, click Finish
4. Wait for installation finished message, click OK, click No to the control panel question
5. Restart the Computer
6. Double-click XAMPP Control Panel icon on desktop, check that MySql has “running” beside it
7. Click Start beside Apache, if Windows Firewall is enabled and gives a warning, click Unblock
8. Click Security in left column, scroll down page that opens, click xamppsecurity.php link
9. Enter a MySQL root password and click Password changing then write it down
10. Go back to the XAMPP control panel (on taskbar or icon in the tray area)
11. Beside MySql, click Stop, count to 5, then click Start
12. Go to [http://127.0.0.1/phpmyadmin](http://127.0.0.1/phpmyadmin) and login with username root and password


(B)Install Sublime Text 3

(C) Install Customer Relationship Management

1. Unzip the Fat Free CRM zip file  and copy the folder  to C:\xampp\htdocs, then right click and rename the folder to customer-relationship-management
2. The folder structure should then be C:\xampp\htdocs\ customer-relationship-management
3. Go to phpmyadmin, creata a database name "crm". Next, go to C:\xampp\htdocs\ customer-relationship-management and drag crm.sql file into crm database.
4. Then, go to https://localhost/customer-relationship-management/. In this page you have to enter all the required details.

###**Tech**
___________________________________________
Customer Relationship Management uses a number of open source projects & license software to work properly:

>* [Sublime] - sophisticated text editor for code, markup and prose.
>* [AdminLTE Bootstrap] - makes front-end web development faster and easier
>* [ionicons] - The premium icon font for Ionic
>* [SmartGit] -  connect to SVN repositories
>* [XAMPP] - open source cross-platform web server solution stack package
<hr>
###**Main Contributors:**


> * Zack
> * Nizam
> * Amy
> * Thurga
 
See the [contributors graph](https://github.com/segimidae/customer-relationship-management/graphs/contributors) and the [contributors file](https://github.com/segimidae/customer-relationship-management/tree/master) for further details.
###**Version**
---
> 0.7.0
###**License**
________________________________
>SeGi MiDae All Rights Reserved

**_Paid Software_**
