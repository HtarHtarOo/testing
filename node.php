// Main Functions

-Item Management
	-Brand/Category/Subcategory

-Sell/Shopping

-Order Management
	-items/customer
	-orders/order_detail

-Customer Manage
	-Reports

-brands
=> 1 | b1 | photo
=> 2 | b2 | photo

-categories<!-- no depend -->
=> 1 |fashion |photo
=> 2 |electronic |photo

-subcategories
=> 1 |baby wear |1

Model Relationship
-------------------
-one-to-one
	-hasOne(p)
	-belongsTo(c)

-one-to-many
	-hasMany(p)
	-belongsto(c)

-many-to-many
	-belongdToMany
	-pivot table

-Homework(using backend template)
--------------------
 -create route for dashboard page(get)
 -create master blade (view/backendtemplate.blade.php)
 -create child blade(views/backend/dashboard.blade.php)
 -create controller BackendController
 	-create method dashboardfun()
 	-call view(backend.dashboard)

Item(CRUD)
-----------
create-show form, store data
retrieve-display data (all, one row)
update-show form with old value, update data
delete-delete data

Authentication
--------------
-installtion
	-nodejs (call npm in terminal)
-Docs 
	-Security/Authentication
-Commands
	-composer require laravel/ui
	-php artisan ui bootstrap --auth
	-npm install
	-npm run dev
-Routes
	-localhost::8000/login
	-localhost::8000/register


Get
---------
-git init
-git add.
-git commit -m "message"
-git remote add origin url
-git push -u origin master
-git pull


Spatie
----------
Spatie Laravel Documentation
-composer require(3)
-public(5)
Terminal
-