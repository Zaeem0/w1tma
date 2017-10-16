Name:Zaeem Qadeer
ID:13205032

Building Web Applications using MySQL and PHP - W1 TMA

URL: http://titan.dcs.bbk.ac.uk/~zqadee01/w1tma/index.php

Description:
W1 Music displays the queried data from two tables artist and song from the mySQL database.
A summary of active artists and number of songs appear on each page
The app provides multiple views Home gives the user basic text as a welcome and instruction to the app.
The artist view displays the list of arists who have songs in the database with the number of songs they have,
artists with no songs are not displayed and the artist names are sorted in ascending order.
The songs view displays all the available songs with the artist name and song duration in mm:ss format.


Installation & Configuration:
Only run the SQL file(setup/w1tma_tables.sql) to create the necessary tables in your database if you haven't already, 
make sure you havent created a duplicate.

Copy The files in this zip directly to your root directory where you will be deploying your app,
so that you can view the app on /your_root_folder/index.php
Folder structure should remain the same

Modify the config.inc.php file so you may login to your database

The application should contain the following files 4 folders and 13 files:

index.php
readme.txt
views
  -404.php
  -artists.php
  -home.php
  -songs.php
templates
  -artistRow.html
  -artistTable.html
  -songsRow.html
  -songsTable.html
  -tableEnd.html
includes
  -config.inc.php
  -functions.php
setup
  -w1tma_tables.sql



