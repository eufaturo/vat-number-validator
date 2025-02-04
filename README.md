## PHP Vat Number Validator

[![GitHub Tests Action Status][icon-action-tests]][url-action-tests]
[![GitHub Code Analysis Action Status][icon-action-analysis]][url-action-analysis]
[![Software License][icon-license]][url-license]
[![Latest Version on Packagist][icon-packagist-version]][url-packagist]
[![Total Downloads][icon-packagist-downloads]][url-packagist]

## Introduction

This is a simple yet modern PHP library to validate VAT numbers.

The API is overall simple and returns a `true` or `false` boolean.

## Code Samples

In order to use this library, you simply need to import and initialize the `VatNumberValidator` class. 

Then just call the `validate` method and pass the VAT number you want to validate as it's sole argument.

```php
<?php

use Eufaturo\VatNumberValidator\VatNumberValidator;

$validator = new VatNumberValidator();

$isValid = $validator->validate(
    vatNumber: 'PT100000010',
);
```

## Installation

This library is installed via [Composer](https://getcomposer.org/) and to install, run the following command.

```bash
composer require eufaturo/vat-number-validator
```

## Testing

```shell
composer test
```

## Contributing

Thank you for your interest. Here are some of the many ways to contribute.

- Check out our [contributing guide](/.github/CONTRIBUTING.md)
- Look at our [code of conduct](/.github/CODE_OF_CONDUCT.md)

## License

This library is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Inspiration

This library was inspired by https://github.com/antalaron/vat-number-validator.

[url-action-tests]: https://github.com/eufaturo/vat-number-validator/actions?query=workflow%3Atests
[url-action-analysis]: https://github.com/eufaturo/vat-number-validator/actions?query=workflow%3Acode-analysis
[url-packagist]: https://packagist.org/packages/eufaturo/vat-number-validator
[url-license]: https://opensource.org/licenses/MIT

[icon-action-tests]: https://github.com/eufaturo/vat-number-validator/actions/workflows/tests.yml/badge.svg?branch=main
[icon-action-analysis]: https://github.com/eufaturo/vat-number-validator/actions/workflows/code-analysis.yml/badge.svg?branch=main
[icon-license]: https://img.shields.io/github/license/eufaturo/vat-number-validator?label=License
[icon-packagist-version]: https://img.shields.io/packagist/v/eufaturo/vat-number-validator.svg?label=Packagist
[icon-packagist-downloads]: https://img.shields.io/packagist/dt/eufaturo/vat-number-validator.svg?label=Downloads
