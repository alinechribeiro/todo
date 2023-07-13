# This project is a Full-stack Recruitment Test for Minesoft

## Requirements
### Task
Create a basic Todo application which satisfies the user stories listed below.

- As a user, I can create a TodoList
- As a user, I can view a list of my TodoLists
- As a user, I can rename my TodoLists
- As a user, I can delete a TodoList
- As a user, I can add a Todo item to a TodoList
- As a user, I can see all the Todo items on my TodoList
- As a user, I can delete Todo items from my TodoList
- As a user, I can mark Todo items as completed

### Tech Stack 
- Laravel 10
- Vue 3
- Vite
- Tailwindcss

### Configuration file
Rename the file `.env.example` to `.env`.

### Database
Create database and add the DB name, user name and password into the `.env` file.

### How to run the application?
To run the application, you need the following commands: <br/>
```
#install dependencies
npm install

#create DB tables
php artisan migrate

#start Frontend services
npm run dev

#start Backend service
php artisan serve
```

Access the application http://localhost:8000