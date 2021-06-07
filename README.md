# 🚧 WIP - A Nova field to replace BelongsTo field for on the go resource creation.

[![Latest Version on Packagist](https://img.shields.io/packagist/v/denisjunio/nova-create-or-add.svg?style=flat-square)](https://packagist.org/packages/denisjunio/nova-create-or-add)
![CircleCI branch](https://img.shields.io/circleci/project/github/DenisJunio/nova-create-or-add/master.svg?style=flat-square)
[![Build Status](https://img.shields.io/travis/denisjunio/nova-create-or-add/master.svg?style=flat-square)](https://travis-ci.org/denisjunio/nova-create-or-add)
[![Quality Score](https://img.shields.io/scrutinizer/g/denisjunio/nova-create-or-add.svg?style=flat-square)](https://scrutinizer-ci.com/g/denisjunio/nova-create-or-add)
[![Total Downloads](https://img.shields.io/packagist/dt/denisjunio/nova-create-or-add.svg?style=flat-square)](https://packagist.org/packages/denisjunio/nova-create-or-add)

Form Field 
![Screenshot Field](https://github.com/DenisJunio/nova-create-or-add/raw/master/nova-create-or-add-form.png)

Form Expanded
![Screenshot Form Open](https://github.com/DenisJunio/nova-create-or-add/raw/master/nova-create-or-add-form-open.png)

## Installation

You can install the package in to a Laravel app that uses [Nova](https://nova.laravel.com) via composer:

```bash
composer require denisjunio/nova-create-or-add
```

## Usage

```php
// in Resource File
use DenisJunio\NovaCreateOrAdd\NovaCreateOrAdd;

// ...

NovaCreateOrAdd::make('Manufacturer')
  ->searchable()
  ->required(),
```

## Credits

- [Abhi0725](https://github.com/Abhi0725)
- [DenisJunio](https://github.com/DenisJunio)
- [shivanshrajpoot](https://github.com/shivanshrajpoot)
- [spatie](https://github.com/spatie)
- [TappNetwork](https://github.com/TappNetwork)

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
