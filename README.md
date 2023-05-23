<p align="center">
    <a href="https://github.com/MasumBhai?tab=repositories" target="_blank">
        <img src="https://avatars0.githubusercontent.com/u/993323" height="100px">
    </a>
    <h1 align="center">PHP Yii2 Framework REST API</h1>
</p>

DIRECTORY STRUCTURE
-------------------

      assets/             contains assets definition
      commands/           contains console commands (controllers)
      config/             contains application configurations
      controllers/        contains Web controller classes
      mail/               contains view files for e-mails
      models/             contains model classes
      modules/            contains rest api logic (controllers, view, model)
      migrations/         contains database schema
      runtime/            contains files generated during runtime
      tests/              contains various tests for the basic application
      vendor/             contains dependent 3rd-party packages
      views/              contains view files for the Web application
      web/                contains the entry script and Web resources


CONFIGURATION
-------------

### Database Schema I designed for this product catalogue api:

1. **User Table:**<br/>
    Columns: user_id (primary key), username, email, password (hashed)

2. **Product Table:**<br/>
    Columns: product_id (primary key), product_name, product_price, product_description

3. **Cart Table:**<br/>
    Columns: cart_id (primary key), customer_id (foreign key)

4. **CartItem Table:**<br/>
    Columns: cart_item_id (primary key), cart_id (foreign key), product_id (foreign key), quantity
### Commands I used:
```bash
   php --version
   composer self-update
   composer require "yiisoft/yii2-gii:*"
   php requirements.php
   
   php ./init
   php yii migrate
   php yii migrate/create product_catalogue_schema
   php yii serve

```
#### - Used xampp for apache server & phpMyAdmin for viewing MySQL database
#### - Used MySQL database
#### - Used PostMan Tool for API Testing

API References
-------------
#### Api Endpoints for Cart-Item model:
```json
{
    "cart_id" : "",
    "product_id" : "",
    "product_quantity" : ""
}
```
```http
  POST http://localhost/php_yii2_framework_rest_api/web/api/cart-item/create
  GET http://localhost/php_yii2_framework_rest_api/web/api/cart-item/view?id=1
  PUT http://localhost/php_yii2_framework_rest_api/web/api/cart-item/update?id=1
  PATCH http://localhost/php_yii2_framework_rest_api/web/api/cart-item/update?id=1
  DELETE http://localhost/php_yii2_framework_rest_api/web/api/cart-item/delete?id=1
```

#### Api Endpoints for Cart model:
```json
{
  "user_id" : ""
}
```
```http
  POST http://localhost/php_yii2_framework_rest_api/web/api/cart/create
  GET http://localhost/php_yii2_framework_rest_api/web/api/cart/view?id=1
  PUT http://localhost/php_yii2_framework_rest_api/web/api/cart/update?id=1
  PATCH http://localhost/php_yii2_framework_rest_api/web/api/cart/update?id=1
  DELETE http://localhost/php_yii2_framework_rest_api/web/api/cart/delete?id=1
```

#### Api Endpoints for Product model:
```json
{
  "product_name" : "",
  "product_description" : "",
  "product_price" : ""
}
```
```http
  POST http://localhost/php_yii2_framework_rest_api/web/api/product/create
  GET http://localhost/php_yii2_framework_rest_api/web/api/product/view?id=1
  PUT http://localhost/php_yii2_framework_rest_api/web/api/product/update?id=1
  PATCH http://localhost/php_yii2_framework_rest_api/web/api/product/update?id=1
  DELETE http://localhost/php_yii2_framework_rest_api/web/api/product/delete?id=1
```

#### Api Endpoints for User model:
```json
{
  "username" : "",
  "email" : "",
  "password_hash" : "",
  "access_token" : ""
}
```
```http
  POST http://localhost/php_yii2_framework_rest_api/web/api/user/create
  GET http://localhost/php_yii2_framework_rest_api/web/api/user/view?id=1
  PUT http://localhost/php_yii2_framework_rest_api/web/api/user/update?id=1
  PATCH http://localhost/php_yii2_framework_rest_api/web/api/user/update?id=1
  DELETE http://localhost/php_yii2_framework_rest_api/web/api/user/delete?id=1
```

### REQUIREMENTS

The minimum requirement by this project template that your Web server supports PHP 7.4.

## Feedback

If you have any feedback, please reach out to me at abdullahmasum6035@gmail.com