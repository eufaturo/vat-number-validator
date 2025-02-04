## PHP Vat Number Validator

[![GitHub Tests Action Status][icon-action-tests]][url-action-tests]
[![GitHub Code Analysis Action Status][icon-action-analysis]][url-action-analysis]
[![Software License][icon-license]][url-license]
[![Latest Version on Packagist][icon-packagist-version]][url-packagist]
[![Total Downloads][icon-packagist-downloads]][url-packagist]

This is a simple yet modern PHP library to validate VAT numbers.

#### Usage

```php
$validator = new VatNumberValidator();
$check = $validator->validate('PT513662065'); // true
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

This package is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

[url-action-tests]: https://github.com/eufaturo/vat-number-validator/actions?query=workflow%3Atests
[url-action-analysis]: https://github.com/eufaturo/vat-number-validator/actions?query=workflow%3Acode-analysis
[url-packagist]: https://github.com/eufaturo/vat-number-validator
[url-license]: https://opensource.org/licenses/MIT

[icon-action-tests]: https://github.com/eufaturo/vat-number-validator/actions/workflows/tests.yml/badge.svg?branch=main
[icon-action-analysis]: https://github.com/eufaturo/vat-number-validator/actions/workflows/code-analysis.yml/badge.svg?branch=main
[icon-license]: https://img.shields.io/github/license/eufaturo/vat-number-validator?label=License
[icon-packagist-version]: https://img.shields.io/packagist/v/eufaturo/vat-number-validator.svg?label=Packagist
[icon-packagist-downloads]: https://img.shields.io/packagist/dt/eufaturo/vat-number-validator.svg?label=Downloads
