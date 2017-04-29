Set Up:
Clone the repository located at https://github.com/stephanielamm/living-large-on-an-intern-salary-api/tree/master/blog
Download composer following the instructions here:
https://getcomposer.org/download/
Download and Launch MAMP following the instructions here:
https://www.mamp.info/en/
In MAMP, go to 'Preferences' >'Web Server' and set the document root to the 'Public' folder within the downloaded repository.
In MAMP's Preferences, go to 'Ports' and set the Apache Port to 8888 and the MySQL Port to 8889.
Start the MAMP server.
From the MAMP landing page, go to phpMyAdmin and create a database called 'app.'
Open the Terminal and CD into the downloaded repository. Once there, run 'php artisan:migrate.' This creates the proper tables in your app database.
Open the browser to localhost:8888.
