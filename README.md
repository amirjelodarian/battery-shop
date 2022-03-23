## About Milad Battery

Milad Battery is a place for CRUD product (battery) and show to users , at first we don't have electronic pay , however when our site come up and terended , so we add electronic pay ;)

Site Utilities

- Add Product
- Edit Product
- Delete Product
- Show Product Page With Ajax Search By Category And Product Brand
- Autentication
- Authorize With Role And Permission
------------------------------------------------------------------------------
Guide

- cd project directory 
- compser install
- npm install
- (linux os) chmod -R 777 .
- php artisan migrate:fresh
- php artisan db:seed --class=PermissionSeeder
- php artisan db:seed --class=RoleSeeder
- php artisan serve 
- ;)

if you want have all permission for example
add delete edit product
you should open
app/Listener/AssignRoleByGmailWhenRegistered.php
change or add

$userRole = [
    'amirjelodarian@gmail.com' => 'administrator'
]

instead (amirjelodarian@gmail.com) this mail you can replace yor gmail

this for before register

if you registered and want have all permission ,
open this file 
app/Listener/AssignRoleByGmail.php
and do same up and add you mail
