# `mb_trim`, `mb_ltrim`, and `mb_rtrim` polyfills

[![Latest Stable Version](http://poser.pugx.org/phpwatch/mb-trim-polyfill/v)](https://packagist.org/packages/phpwatch/mb-trim-polyfill) [![License](http://poser.pugx.org/phpwatch/mb-trim-polyfill/license)](https://packagist.org/packages/phpwatch/mb-trim-polyfill) [![PHP Version Require](http://poser.pugx.org/phpwatch/mb-trim-polyfill/require/php)](https://packagist.org/packages/phpwatch/mb-trim-polyfill)

Provides user-land PHP polyfills for the [`mb_trim`, `mb_ltrim`, and `mb_rtrim` functions added in PHP 8.4](https://php.watch/versions/8.4/mb_trim-mb_ltrim-mb_rtrim).

Requires PHP 8,1, 8.2 or PHP 8.3 with `mbstring` extension. Not supported on PHP 8.4 because these functions are natively implemented in PHP 8.4.

## Installation

```bash
composer require phpwatch/mb-trim-polyfill
```

## Usage

Simply use the `mb_trim`, `'mb_ltrim`, and `mb_rtrim` functions as if they were declared already.

## Contributions

Contributions are welcome either as a GitHub issue or a PR to this repo.

