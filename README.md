# m-frame
Micro framework built with plain **PHP**

#### Requirements
- PHP v.7.4+
- MySQL v.5.7

#### Installation

Clone the project:

```bash
git clone https://github.com/veljko-d/m-frame.git
```

Install composer dependencies:

```bash
composer install
```

There is no database migrations implemented.

Dump database file `m-frame.sql` is provided inside the `db/dump` folder. This file contains `users` table with several inserted users.
Create `m-frame` schema and import the sql file.

Or you can do it your own way...

#### Dependencies used

- **Twig** as a template engine.
- **Monolog** as a logger.
- **PHP dotenv** as an environment variables loader.

#### Configuring project

Copy the provided `.env.example` file, name it as `.env` and then fill in the required parameters.  

Config file `app.php` is located inside the `config` folder.

Here you can register your **service providers**.

Create your log file (with the **.log** extension) inside the `src/var/log` folder.

#### Usage

###### Routes

Routes file `web.php` is located inside the `routes` folder.

Define your routes as following:

```php
return [
    'get::posts/:slug' => [
        'controller' => PostController::class,
        'method'     => 'show',
        'params'     => [
            'slug' => 'string',
        ],
    ],
];
```

Routes can begin with ``get::`` (**get::route**) or ``post::`` (**post::route**), depending on your HTTP method.

###### Controllers

Controllers are located inside the `src/Controllers` folder. It is recommended to extend the `AbstractController` to get access to the required dependencies.

###### Actions

Add your actions inside the `src/Actions` folder.

###### Models

Models are located inside the `src/Models` folder. It is recommended to extend the `AbstractModel` to get access to the required dependencies.

1. Create a Model class + optionaly a ModelInterface
2. If you choose to create the ModelInterface, then create a ServiceProvider class inside the `src/Core/ServiceProviders` folder
3. Register the ServiceProvider inside the `app.php` file.

###### Domain

Domain files are located inside the `src/Domain` folder.

###### Authentication

Authentication logic is implemented, check the `LoginController` and the `RegisterController`.

###### Service Providers

Add your service providers inside the `src/Core/ServiceProviders` folder and register them inside the `app.php` config file.

###### Validation

Validation fields should be defined like this:

    $validationFields = [
        'title' => [
            'required' => true,
            'min'      => 2,
            'max'      => 255,
        ],
        'content' => [
            'required' => true,
            'min'      => 20,
        ],
    ];
    
Validate defined fields like this:

    $data = $request->validate($this->validationFields);

Validation rules available:

- between
- different
- extension
- max
- min
- required
- same
- size
- type

Available types

- email
- float
- integer
- url
- alpha
- file
- image

###### Tests

Every tests should extend the AbstractTestCase.

There are some tests already implemented.

Attention! Inside `ModelTestCase`, you should insert your DB credentials to be able to connect to your database.
This is a temporary solution and it will be changed in the future.

###### Exceptions

Exceptions are defined inside the `src/Exceptions` folder.

###### Logging

This project is using **Monolog** logger. Log file should be stored inside the `src/var/log` folder.

###### Views

Views are located inside the `resources/views` folder.
Extend the `layouts/app.twig` main template.

###### CSS and JavaScript

**CSS** and **JavaScript** files are located inside the `public/css` and the `public/js` folders.