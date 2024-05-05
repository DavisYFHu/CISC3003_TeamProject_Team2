# CISC3003_TeamProject
The source code are tested, if the configuration of the error, please check the database configuration, such as database password, port number and operating environment.
Suggested running environment version: PHP8.3.4 MYSQL: 8.0.36

Configuration details
1. Import the sql file in the database folder into the database to create the database automatically.
2. Move the entire source code into the running directory
3. modify the database configuration. The default database password is 123456, if your database password is not 123456, please go to conn.php file to modify the database password.

Test account for student could be register by yourselves
Test account for teacher:
User Name: 10001
Passwords: 123456

About CAPTCHA can not display correctly:

This error indicates that your PHP environment is missing the GD library, a PHP extension for image processing that provides a set of functions for creating and processing images.

To fix this issue, you need to enable the GD library in your PHP environment. The exact steps depend on the operating system and web server you are using. Here are some common steps:

For Apache server:
1. Enable the GD library in your php.ini file: Open your php.ini file, find the following line and remove the leading comment (;):
;extension=gd

2. Restart the Apache server: After saving the php.ini file, restart the Apache server for the changes to take effect.

---------------------------------------------------------------------------------

Using XAMPP or WAMP on Windows:
If you are using XAMPP or WAMP in your local development environment, you can enable the GD library by following these steps:

1. Open the XAMPP or WAMP control panel. 2.
2. Find PHP Configuration or Extension Management in the menu. 3.
3. Find and check the GD library. 4.
4. Save your changes and restart your Apache server.
After completing these steps, re-run your code and the error should no longer occur.
