# Blood Bank Management System <sup>`v0.1`</sup>
Simple BBM System Project in DCIT 24A for 1st Semester of Second Year (2022 - 2023)

- Authors 
	- Ryan James V. Capadocia
	  - James Matthew Veloria
	  - Nico Aldrich Cano
	  - Joseph Contador 	
	  - Jomari Bautista
	  - Julian Bragaiz 
	  - Cielo Besonia

```
Created on December 5, 2022 at 10:30:20 PM
IDE Visual Studio Code, Sublime Text Editor
```

## Instruction
To Run This Web Application you need to download the files <br>
Extract the file after downloading, then open the downloaded folder and copy all the files and folder <br>
Once all the files and folders have been copied, go to the Xampp folder `C:\xampp` and locate the htdoc folder. <br>
Create a new folder and name it `Blood Bank Management` <br>
Once the folder has been created, open it and paste the file that you copied earlier into the newly created folder <br>
After that, open the XAMPP application and run Apache and MySQL. Then, go to Chrome and type in `localhost/phpmyadmin` and press Enter.
Then, go to the Import tab and click "**Choose File**". After that, find the folder, go to the Database, select `BBMS Database.sql`, and click "**OK**".
After that, scroll down and click "**Import**". Then, open a new tab and type `localhost/Blood Bank Management/Home/Homepage.php` and you're good to go. Enjoy!
  
-----
### Preview
<div align="center"
<img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/Pre1.png"/> <img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/pre2.png"/> <img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/pre3.png"/> <img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/pre4.png"/> <img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/pre5.png"/> <img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/pre6.png"/> <img width="25%" src="https://github.com/Unknownplanet40/Simple-Blood-Bank-Management-System/blob/6966cc78cd9b89794234cee4d7545af1eed8c1d1/Previews/pre7.png"/>
</div>


-----
## CHANGE LOGS

> My change logs only began on December 29th so there are no other records of progress to date

- ### December 29, 2022
  - [x] Added function to separate the blood type for compatibility in blood request page
  - [x] Created new Page for creating, updating, and deleting Users in Manage User Page
  - [x] Fixes some Bugs in Manage User Page
  - [x] Created Staff_Status page for staff to know if they are approved or not

- ### December 30, 2022
  - [x] Created Error page for Connection Error plus some other errors
  - [x] deleted old AlertBox function and replaced it with NewAlertBox function [sweetalert2]
  - [x] Separate the background animation in css file for easy access and modification

- ### December 31, 2022
  - [x] Added Some Favorites Icon in Webpage that have UI
  - [x] Added password to our database for security purposes

- ### January 1, 2023
  - [x] Created Staff Dashboard (Inventory to Mange User Page)
  - [x] Fix Log Out Button in Staff Dashboard (not setting is_login to 0)
  - [x] Fix Decline account update (not updating the page when isApproved is 2)

- ### January 2, 2023
  - [x] Fix user not updating blood group
  - [x] Added liters donated in blood Inventory Page in user dashboard
  - [x] added Name in the page title in user dashboard

- ### January 9, 2023
  - [x] Fix some bugs in Database Connection
  - [x] Added Staff Registration Page
  - [x] Fix Register Page
  - [x] Created Accounts for group mates to test the website (Ryan)

- ### January 10, 2023
  - [x] Fix hide password for Staff ser Manage Page in Staff Account
  - [x] Fix search Bar in Admin dashboard (including non-admin users when searching)
  - [x] Hide the Search Button for Admin User Manage Page

- ### January 13, 2023
  - [x] Added Staff Dashboard for Users Account
  - [x] Fix search Bar in Staff dashboard (including other users when searching)

- ### January 14, 2023
  - [x] Fix some bugs in Admin Dashboard
  - [x]  Added Donated and Requested Blood card in Admin Inventory

- ### January 15, 2023
  - [x] Added Portfolio for Caps and Veloria
  - [x] Fix some bugs in Staff Dashboard
		
- ### January 16, 2023
  - [x] Fixed password not showing in admin manage page
  - [x] Added Portfolio for Cielo and Jomari

- ### January 17, 2023
  - [x] Added User Dashboard
  - [x] Added User Donation Page (New Donor, Donate Blood)
  - [x] increased the unit of blood from 6 unit to 8 unit in blood donation page
  - [x] Added User Portfolio for Joseph and Julian

- ### January 18, 2023
  - [x] Added HomePage for the website
  - [x] fixed some alignment of text in HomePage
  - [x] Added User Portfolio for Nico

- ### January 20, 2023
  - [x] Added User Request page
  - [x] Fix Bugs for user dashboard (username keep on changing to root)
  - [x] Added User Handed Page
  - [x] Fix Pigination in Dashboard
  - [x] Added Profile Page for User
------------------------------------------------------------------------------------------------------
