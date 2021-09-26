##  NF PHP Base is an Application framework, that serves as the base for your php application. 




## install the framework

`chmod +x install.sh`

`./install.sh "test-app"`





`docker exec -it --user root test-app_php-apache-test-app_1 /bin/bash`

`docker exec -it --user root mariadb-test-app /bin/bash`

`mysql -utestuser -ptestpassword testdb`



## use the application

- run the app:
`./run.sh "php bin/app.php`

- test routing:
`./run.sh "php bin/ps.php admin:test"`




## Notes






 ## Setup for production
  - Fill out an env.php file
  - ensure `pub` is the document root for apache or nginx


