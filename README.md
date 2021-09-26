##  NF PHP Base is an Application framework, that serves as the base for your php application. 


 - This repo is both an example and a work in progress.  Its recommended only for example purposes rather then a production application.

 - Also, Its poorly documented.



## install the framework

`chmod +x install.sh`

`./install.sh test-app`

`docker-compose  --project-name 'test-app' up -d`


test website:  http://localhost/test/index




`docker exec -it --user root test-app_php-apache-test-app_1 /bin/bash`

`docker exec -it --user root mariadb-test-app /bin/bash`

`mysql -utestuser -ptestpassword testdb`


- Turn off docker environment
`docker-compose -p test-app stop`

- Turn env back on:
`docker-compose -p test-app start`



## use the application

- run the app:
`./run.sh "php bin/app.php"`

- test routing:
`./run.sh "php bin/app.php admin:test"`




## Notes



 ## Setup for production
  - Fill out an env.php file
  - ensure `pub` is the document root for apache or nginx


