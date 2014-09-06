mvc
===
**Basic MVC pattern for PHP**
```
MVC project File system

mvc/
    |
    ├── app/
    |    |
    |    ├── config/
    |    |    └── config.php
    |    |
    |    ├── controllers/
    |    |    ├── BlogController.php 
    |    |    ├── Controller.php 
    |    |    └── HomeController.php 
    |    |
    |    ├── coreLib/
    |    |    ├── Application.php 
    |    |    ├── Base.php 
    |    |    ├── Factory.php 
    |    |    └── InterfaceAcquire.php
    |    |
    |    ├── models/
    |    |    ├── Blog.php 
    |    |    └── Home.php  
    |    |
    |    └── views/
    |         ├── layouts/ 
    |         |    └── main.view.php  
    |         └── home.view.php
    |
    ├── bootstrap/
    |    ├── autoload.php
    |    └── start.php
    |   
    |
    ├── public/  
    |    ├── css/
    |    |    └── mycss.css
    |    ├── .htaccess
    |    └── index.php
    |
    ├── tests/ 
    |    ├── TestApplication.php
    |    └── autoload.php
    |
    ├── README.md
    |
    └── autoload.php
  
```


