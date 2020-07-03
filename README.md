# eCampus Portal

- [eCampus Portal](#ecampus-portal)
  - [Getting Started](#getting-started)
    - [Setup Configuration](#setup-configuration)
    - [Database migration](#database-migration)
    - [Running the Web](#running-the-web)
  - [Further Resource](#further-resource)
  - [License](#license)

## Getting Started

Run `composer install` to install the dependencies

**TODO** Should be using dotenv

### Setup Configuration

Setup the database on `app/Config/Database.php` on the `$default`

### Database migration

Run the command below to migrate the database. This will import all of the database

```
php spark migrate
```

### Running the Web

Serve the web under `public/` directory.

For example, if you would like to run the web using **PHP Built-in** server, you can run the command below

```
cd public/
php -S 127.0.0.1:8080
```

And you can now access the website on [127.0.0.1:8080](http://127.0.0.1:8080)

## Further Resource

- https://codeigniter4.github.io/
- https://github.com/codeigniter4/appstarter (The base of this project)

## License

Licensed under [BSD License](LICENSE).
