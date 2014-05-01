SampleWebArchitecturePHP
========================

Sample PHP Web Architecture demonstration for code layout.

This solution uses a custom programmed MVC pattern and Smarty templates for the presentation layer.

dbmodel.php is responsible for providing a database layer and uses PHP PDO and ensures all SQL statements
are generated using parameterised queries to prevent SQL injection attacks. This is an abstract class which
uses OOP reflection techniques to generated basic create, read, update, delete queries.

HTML5/JavaScript
I decided to create a responsive layout by using bootstrap so the page renders nicely on mobile devices.
jQuery was used to assist with basic dom manipulation and bootstrap to create javascript models which
synchronize data from the backend database models.