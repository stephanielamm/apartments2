# Subletr API
This application allows users to store information such as name, location, price, bedrooms, and bathrooms and in one database.

Users may interact with Subletr through a REST client such as Advanced REST Client, or by adding property information through the web application.

## Getting started
- Clone the repository located at https://github.com/stephanielamm/living-large-on-an-intern-salary-api/tree/master/blog
- Download composer following the instructions here:
https://getcomposer.org/download/
- Download and Launch MAMP following the instructions here:
https://www.mamp.info/en/
- In MAMP, go to 'Preferences' >'Web Server' and set the document root to the 'Public' folder within the downloaded repository.
- In MAMP's Preferences, go to 'Ports' and set the Apache Port to 8888 and the MySQL Port to 8889.
- Start the MAMP server.
- From the MAMP landing page, go to phpMyAdmin and create a database called 'app.'
- Open the Terminal and CD into the downloaded repository. Once there, run 'php artisan:migrate.' This creates the proper tables in your app database.
- Open the browser to localhost:8888. You should see the screen below:

<p align="center"><img src="subletr.png" height="300" width="auto"></p>


## Documentation

Read the Subletr API Documentation at https://www.gitbook.com/book/stephanielamm/subletr/details.
