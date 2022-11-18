public => everything based on the public folder.
core => this contains things that to be always loaded, when the website is running.
    1.DB required
    2. some functions always needed

** usually controller files has multiple individual files.
** usually there is no folders inside the controller folder.

** but view folder has multiple folders inside it.



--------- Model.php & models folder ---------

1. Inside the Model.php, we create all the functions that are common to every tables.

2. When we are adding the individual models inside the models folder,
   then we can reuse the common functionalities inside the model folder.

3. Most of the time, Model.php has public functions, because we use have to use outside the Model.php file.