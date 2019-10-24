# RPGToolkit
INSTALLATION  

## 1. Clone  
Clone repository from [RPG Toolkit](https://github.com/EdgarPsda/RPGToolkit) in your computer.  

`git clone https://github.com/EdgarPsda/RPGToolkit`  

## 2. Pull Branch  
Create a local branch with name you want I recommend name it *development*.  

`git branch -b [branch name]`  

then pull *development* branch with the following command:  

`git pull origin development`  


## 3. Environment  
Make sure you have LAMP stack and Nodejs installed on yout computer and create a DB with name *rpg_toolkit*.

## 4. Setting up .env  
Copy the file *.env.example* located in root folder and paste it in same root folder changing name with *.env*.  

Put the following settings:  
* DB_CONNECTION=mysql
* DB_HOST=127.0.0.1
* DB_PORT=3306
* DB_DATABASE=rpg_toolkit
* DB_USERNAME=[your mysql user]
* DB_PASSWORD=[your mysql password]  

## 5. Prepare the project  
Open the project terminal and execute the following command:  

`composer install`  

then  

`php artisan key:generate`  

then  

`php artisan migrate`  

then  

`npm install`   

## 6. Running the project  

To run the project activate the laravel server and compile node with the following commands:  

`php artisan serve`  

`npm run dev`   

> If you want make changes on the project I recommend use this command:  
`npm run watch`   


Finally follow de URL: *localhost:8000/dashboard*  


# Usage  

Click on *Hero* in top menu and will show a table with heros in DB, click in *Create Hero* button and a modal will show with the form to create a new hero with some validations.  
  


