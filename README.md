SampleWebArchitecturePHP
========================

Sample PHP Web Architecture demonstration for code layout using PHP version 5.4

This solution uses a custom programmed MVC pattern and Smarty templates for the presentation layer.

dbmodel.php is responsible for providing a database layer and uses PHP PDO and ensures all SQL statements
are generated using parameterised queries to prevent SQL injection attacks. This is an abstract class which
uses OOP reflection techniques to generated basic create, read, update, delete queries. dbmodel.php is something
I wrote for my last few PHP projects.

HTML5/JavaScript
I decided to use jQuery for basic dom events and backbone.js as a client layer to retrieve data from the
web services provided. I am using uncompressed js files on purpose in case there is a bug in of the libraries
which may effect the application down the road.

A deployment script could minify js and css files when deploying to production. I am using capistrano http://capistranorb.com/
which of version 3.0 is language agnostic.
