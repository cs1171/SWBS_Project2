# SWBS_Project2
The goal of this project is to create a very basic (but secure) website with several pages,
some of which require user authentication to reach. Authentication will be done through
a MySQL database that the page will connect to. PHP sessions are used for logins.

mainpage and signin can be accessed by anyone. user can be accessed only by admin and users.
admin can only be accessed by administrators. Sign in links will be available on any page
unless they are signed in - in that case it will be a sign out link.

User page will display basic user information. Admin page will have a form to add additional
users or administrators (connect to database to update). Can also view a list of users.

The MySQL database has a single table for all users. A field will indicate whether a user
has administrator access or not. Each entry in the table will also have their first/last name,
username, time of account creation, and last login time. All usernames are required to be
unique.

Password security will be handled using salt and hash. Salt will be set up to concatenate
a random string of numbers, the username, and the password. Since this is not a critical
application, MD5 hashing will be used.
