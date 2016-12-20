# manualdate
A demo project created with CakePHP 3 as a way to demonstrate my coding ability. This project is used to calculate the difference between 2 dates without using the building function of the PHP language.

##Features of this project
 - PHP
 - SQLite
 - PHP UnitTest
 - JavaScript/jQuery
 - jQuery UI
 - Ajax
 - Bootstrap
 - CSS
 - HTML5

##CakePHP 3 Features
By going to the home page, an UI is presented where the user is able to select a start and end date. 
The date is calculated with a model by making a AJAX call.
A shell interface was also creates which uses the same model to do calculations.

See below for more documentation on the shell UI.

You can also run the date difference from the command line in the root of the web application by doing the following:
```sh
bin\cake calcs <startdate> <enddate>
```

An example running the command can be seen below.
```sh
bin\cake calcs 2016-01-01 2016-01-21