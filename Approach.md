## General setup

1.Create new git repository
2.Organise folders for additional php/js files
3.Create files for main front end functionality (script.js)
4.Create files for backend (store them in php folder)
5.Include bootstrap and jquery cdn`s in the <head> element
6. Setup new database using MySQL

## Front End
1. Create functionality to show login modal window on load
2. Create functionality to switch between login and register window
3. Setup ajax requests for both windows
4. Add additional functionality (close window/show database) on ajax.success

## Back End
1. In config.php file declare new variables that are going to contain database settings
2. Create new connection with an existing database using mysqli object (applies for login.php, addUser.php,getUsers.php)
3. Setup password / email validation in addUser.php/login.php
4. Add new functionality in order to retrieve all data from users database (inside getUsers.php)

## Deployment
1. Upload all the files into hosting
2. Upload database and change configurations inside config.php in order to match them with new database settings
