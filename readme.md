Animal Sanctuary Manager
===================
This web application was written as part of a university project for a Internet Applications and Techniques module. The aim of the project was to provide an animal sanctuary with a system they could utilise to help manage requests for adoptions of animals.

----------
Features Implemented
-------------
 - User registration
 - Submission of adoption requests
 - Viewing of animals
 - Searching of animals based on an animal's attributes
 - Admin panel to manage adoption requests and animals

Potential Improvements
-------------
 - Improving JOIN statements to only select columns that are needed
 - Introducing routing and/or controllers as to better separate out the responsibilities of the system
 - Improving the security of passwords (currently uses md5, a better option could be to use the [password_hash function](http://php.net/manual/en/function.password-hash.php))
 - Removing the passing of animal ids through POST, a better idea would be to use sessions to pass information between pages
 - Use of templating engine (such as [Twig](http://twig.sensiolabs.org/)) in views
 - Use object oriented PHP to better organise data and operations
