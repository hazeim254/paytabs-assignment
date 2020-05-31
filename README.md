# Paytabs Assignment Solution

This repo is a demo made for Paytabs interview assignment.

## How to run this demo
Clone or download the repo then run composer to install dependencies

```bash
git clone https://github.com/hazeim254/paytabs-assignment
cd paytabs-assignment
composer install
```

Then configure the database either through `app/Config/Database.php` or through `.env`. Then run migrate command:
```bash
php spark migrate 
```

You can edit `app/Database/Seeds/CategorySeeder.php` to included required categories then run seed command:
```bash 
php spark db:seed CategorySeeder
```

Run the development server:
 ```bash
 php spark serve
```

Then open the browser at `http://localhost:8080` to find the demo page.

## Where to check my code:
- `app/Database/Migrations/2020-05-30-133803_create_categories.php`
- `app/Database/Seeds/CategorySeeder.php`
- `app/Models/CategoryModel.php`
- `app/Controllers/Categories.php`
- `app/Views/categories/index.php`