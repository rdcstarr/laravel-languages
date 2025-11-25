# Laravel Languages

[![Latest Version on Packagist](https://img.shields.io/packagist/v/rdcstarr/laravel-languages.svg?style=flat-square)](https://packagist.org/packages/rdcstarr/laravel-languages)
[![GitHub Tests Action Status](https://img.shields.io/github/actions/workflow/status/rdcstarr/laravel-languages/run-tests.yml?branch=main&label=tests&style=flat-square)](https://github.com/rdcstarr/laravel-languages/actions?query=workflow%3Arun-tests+branch%3Amain)
[![GitHub Code Style Action Status](https://img.shields.io/github/actions/workflow/status/rdcstarr/laravel-languages/fix-php-code-style-issues.yml?branch=main&label=code%20style&style=flat-square)](https://github.com/rdcstarr/laravel-languages/actions?query=workflow%3A"Fix+PHP+code+style+issues"+branch%3Amain)
[![Total Downloads](https://img.shields.io/packagist/dt/rdcstarr/laravel-languages.svg?style=flat-square)](https://packagist.org/packages/rdcstarr/laravel-languages)

## Installation

You can install the package via composer:

```bash
composer require rdcstarr/laravel-languages
```

### Automatic Installation (Recommended)

Run the install command to publish the migrations, run the migrations, and seed the languages table:

```bash
php artisan languages:install
```

### Manual Installation

Alternatively, you can install manually:

1. Publish the migrations:

```bash
php artisan vendor:publish --provider="Rdcstarr\Languages\LanguagesServiceProvider" --tag="laravel-languages-migrations"
```

2. Run the migrations:

```bash
php artisan migrate
```

3. Seed the languages table:

```bash
php artisan db:seed --class="Rdcstarr\Languages\Database\Seeders\LanguagesSeeder"
```

## 📖 Resources

-   [Changelog](CHANGELOG.md) for more information on what has changed recently. ✍️

## 👥 Credits

-   [Rdcstarr](https://github.com/rdcstarr) 🙌

## 📜 License

-   [License](LICENSE.md) for more information. ⚖️
