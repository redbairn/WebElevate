# :school: Industry Partner Project :school:
## Website and Development for the game.

### The Industry Partner Project (IPP)
This module consolidates the learning and skills development of the shared and specialist modules undertaken by students in the course such as myself. Our (online/remote) cross-functional team was made up of two coders, one designer and two project managers. The project was coordinated through online team meet ups with team members, mentors and advisors. A client had approached the Digital Skills Academy about a digital product and our team was assigned to the client who we were quite happy to work with.

**The following were the learning outcomes:**

- Conducted a product design team-based workshop and agreed and presented a final concept design.
- Produced a digital prototype that demonstrates a user-centric approach toward design and development.
- Demonstrated research and data-gathering capabilities by creating personas, scenarios and use cases.
- Produced a complete set of UX design documentation, including functional and design specifications, wireframes and application flow charts.
- Created a set of production sprint plans and demonstrated the results of each sprint.

### About the Client
The client was a school teacher that approached the Digital Skills Academy with an app that she would like developed. She was considering on getting a book produced however due to the amount of content the publishers advised her on getting an app created instead.

>**Due to a NDA we have in place with the client I can't provide further information or show more files.**

>**When the client has their app/website fully produced I will probably update this repository with the additional files from the project**

### About the Project
The website, which was built using WordPress, is built using HTML, CSS, JavaScript, jQuery, PHP and MySQL.  The presentation for the main parts of the website being in HTML, CSS and JavaScript with animations in jQuery. Due to a NDA and permission from the client that we worked with I can only include the parts from the Game and Topic pages.

### The Team Tools
The following were the tools that we used during our Industry Partner Project:-

- GMail (Detailed threads)
- Google Calendar (Organising recurring Team Meeting, IT Meetings, Ad hoc meetings and Face-to-Face meetings)
- Skype (Group Meetings, IT Meetings)
- Google Hangouts (for the Mentor Meeting; Quick chat)
- Google Drive (Storage of assets, code, files from client, media files created for assignments, etc)

>**We tried testing Slack but this wasn't really used by all the team members in the end (all the conversations were in GMail and Hangouts mainly).**

>**We also tried using BitBucket however we weren't allowed GIT on the shared hosting platform for the server so we had to dump the idea of using a proper VCS.**

#### Topics Page
From the [topic-logic.php] (https://github.com/redbairn/WebElevate/blob/master/IPP/Topics/topics-logic.php) you will see that I selected the topic name and subtopic name from the questions2 table and ordered them by the topic name. These populated the topics list and were embedded in an Accordion (Bootstrap was chosen framework for this feature). I had added a link to a modal which would display the difficulty level window.  This window would bring the user into the Game page once the difficulty was chosen.  I created the form that was in the difficulty level window and I passed the value of the chosen subtopic (from the list on the page) using jQuery to this form.  This was submitted across with other values to use on the game-logic.php thereafter.

#### Game Page
Similar to the Topics Page, the Game Page ([Game/index.php] (https://github.com/redbairn/WebElevate/blob/master/IPP/Game/index.php)) was also a template for WordPress and follows the Parent (Topics) in the breadcrumbs. In this index.php I have the success and failure messages appearing after a submitted answer is processed. Going over the page, I display various pieces of data from the database or pass through values using hidden input fields.  These values are passed through to be used after the submitted answer is checked. For example, we can pass through the text of the current question or the equation (difficulty level equation) to appear above the submission box.
The boards were to show the current difficulty level, current question number, attempts, etc.


In the [game-logic.php] (https://github.com/redbairn/WebElevate/blob/master/IPP/Game/game-logic.php) file the following steps are happening:

1. The users submitted difficulty level and the chosen subtopic name stored in variables.
2. A temporary database table created for the user logged in.
3. A trigger that ensures only 10 rows are in the new temporary table.
4. The new temporary table is populated with the 10 random questions.
5. We select the first question and display it with the (difficulty level) equation.
6. After the submitted answer is set we use another trigger to make sure only 3 submitted answers are in the submitted_answers table.
7. The submitted answer is inserted into the database and we check this answer against the correct one from the questions2 table.
8. We count the overall attempts made and this is displayed on the frontend.


#### Recommendations for further development
The following were items which we included in our Technical Guide for any developer that would be taking over the project for the client:

1. Save the tries/attempts or retries in a table in the database but restrict the user from going passed 3 attempts (block submit button).
2. Change the difficulty level to a lower lever after 2nd failed attempts (notify the user when dropping down).
3. Restrict the user from trying to answer after the 2nd attempt if only on the Easy level (because they can't drop any lower).
4. After completed all the questions show all the questions and their answers?
5. After the main app questions load up the Revision questions (need to store the results of the correct answers on a table and make sure 3 of 5 correct).
6. Mark the subtopic (100%) complete after they have got the (minimum of) 60% in the Revision section.
7. Delete (Drop) the *current\_user\_[USERNAME_HERE]* table when the subtopic is complete and details stored in History table.
8. User can now select a new subtopic to work on.
9. Inform user on the Topics page that they currently have a game saved (if still in the middle of a game). Prompt asking them if they want to continue.
10. Percentage of the Game play to be stored for the statistics section in the Assessment/Performance area.
11. Progress per difficulty (how many questions completed using 'Easy'?).
The additional sections for Revision and Assessment/Performance Area.
