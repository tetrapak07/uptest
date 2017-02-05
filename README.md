# Summary
We are a local home cleaning company called Homework. Today we are keeping track of all our bookings using a spreadsheet and we want to 
move it into a web application. Our main goal with this project is to make it possible for customers to schedule a booking online. 
I've already created the scaffolding of the app for you and now I need you to add some functionality to it. 

Deliverables
All models and columns should have validation as described in the model spec below, plus any common-sense validation you'll put on new models.
Валидация (+)

We need to split the site in to Admin-only and Customer-only. Right now all the admin functionality is exposed to the world.
Разделить сайт - сделать админку
и на главной прием заказов от клиента (+)

Currently we operate in 10 cities, but plan to expand quickly. We need a way to admin the list of cities we operate in and the ability to 
add to the list. You should create a new table to do this.
Добавить Города (+)

On the admin cleaner form we need a way to select the cities a cleaner works in. This should be a checkbox list populated by the list of 
cities we operate in. You may need to create a new table to store this data.
Таблица связи - города-уборщики. И способ связывать и выводить эту новую связь. (+-)

We need a way for customers to signup and schedule a booking all on one form. To accomplish this you will need to do the following:
Make the site root a customer-facing form designed for customers to sign up and book a cleaner.
Форма регистрации для клиентов и заказа очистки (-)

On this form, capture all the data needed to create a customer in the database (first name, last name, phone number).
В этой форме все что нужно, чтобы создать нового кастомера first name, last name, phone number

If the customer already exists in the database (use phone number to determine this) use the existing record instead of creating a new one. 
You should probably add a validation to enforce this.
Проверять при заказе существование клиента по его телефону (-)

Let the customer select what city they are in from the cities table created earlier.
Клиент может выбирать свой город (-)

Let the customer specify a date, time, and number of hours for the home cleaning.
Клиент может задавать дату, время уборки и количество часов (-)

When the user submits the form, look for cleaners that work in the specified city that do not have any bookings that conflict with the time specified.
Когда юзер даелает заказ из формы, искать в бд уборщиков с конкрентого города и не занятых другим заказом в нужное время (-)

If you can find an available cleaner, create the booking and display the name of the cleaner assigned to the booking.
Когда найден свободный уборщик, создается заказ и отображается имя уборщика привязанного к этому заказу (-)

If you can't find an available cleaner, tell the user that we could not fulfill their request.
Если свободного уборщика для требований заказа нет- вывести соотвествующее сообщение пользователю (-)

Don't forget to create a good experience for customers who are trying to book a cleaner -- think about it from their perspective.
Делать все удобным для клиента. (+-)

Restrictions
Do NOT switch the database from SQLite to MySQL. (+)
If you create a password-protected account, use credentials "admin@admin.com" and password "adminadmin".
Аккаунт админа (+)

Existing Models
customer
first_name (required)
last_name (required)
phone_number (optional)
booking
customer (required, enforce referential integrity)
cleaner (required, enforce referential integrity)
date (required)
cleaner
first_name (required)
last_name (required)
quality_score (required, must be a number between 0.0 and 5.0)
