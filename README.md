# DatabaseFinal
Garrison Ballam
  pawprint: gbb6g3,
Skyler Gunn
pawprint: sig972
Description: 
This application is a small, universal forum-type template application. Right now, it does not have a major theme, but it could be easily changed to add css to become something like a stack overflow application. In any case, the application starts where the user can log in or register a username and password set, which will either check the existing username and password to find a match, and depending if they want to register, will add it to the users_table if there is not a match, or if they want to log in and it does find a match, will log the user in, and store it in a session variable. Upon being logged in, they are prompted to the home page of the application. The home page of the application displays a list of the questions as found in the question table in the database, will display their username. They also have an option to use a html form to view a specific question. From there, there is also a response_table which corresponds to the question they are viewing and displays the responses. They have an option to create a new response, a new question, or edit or delete a response. They can only edit/delete a response if either a) they are a moderator, which is to be manually put into the database by a sysadmin, or b)their username is the same as the username of the response they are trying to edit/delete. Finnally, we implemented a very simple like system. When the main page loads, the user can like a question if they choose too, by pressing a button in the elements, and it will display the likes as well. Once clicked, it executes a javascript function that redirects to a php page that increments the likes of that question ID, and then redirects to the main page. Due to time constraints, we were unable to implement another table with a list of users that liked that question, so there is no limit to how many times a user can like a question. As far as CRUD goes, our application does each part of CRUD. We create when a user creates a new account, with a username and password by registering. We also create entries into the databases when we add a new question or add a new response. As far as reading, we definitely did that the most. We check databases if they try to log in or if they try to register a new username password set. We check the databases when we load in question elements with php and load in response elements the same way. We implement updating when a user likes a question, and when they want to edit a response. We implement deleting only when a user wishes to delete a response. 

Database Schema: 

Users table:

 username (text)    | Password (text)   | isMod  (tinyInt)
 
 
 questions_table: 
 
 question_id(int(11)) (autoincrement) | question_username (varchar(35)) | question_title (varchar(255)) | question_body (text) | question_score (int(11)) | question_date (datetime) 
 
 response_table:
 
 response_id(int(11)) (autoincrement) | question_id (int(11)) | responding_user (varchar(35)) | response_date (datetime) | response_body (text)
 
 Video URL: https://youtu.be/21sDoT4LWVY
 
 Entity Relationship Diagram (ERD): https://www.instagram.com/p/BcdFOy5jyp8OwoRuQjA7HP1YY1eQlRVVHWL6d80/?taken-by=gballam


