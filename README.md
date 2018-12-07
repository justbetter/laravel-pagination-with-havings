# Laravel Pagination with Havings

This Laravel package makes it possible to use Laravel's pagination with queries which are using havings. Without it you probably get "Column not found" MySQL errors. For more information see:

- https://github.com/laravel/framework/issues/3105
- https://github.com/laravel/framework/pull/5515

## Installation

```
composer require justbetter/laravel-pagination-with-havings
```

## Usage

Just use the trait on the model.

### Example

```
use JustBetter\PaginationWithHavings\PaginationWithHavings;

class MyModel extends Eloquent
{
    use PaginationWithHavings;

    ...
}
```

## Ideas, bugs or suggestions?
Please create a [issue](https://github.com/justbetter/laravel-pagination-with-havings/issues) or a [pull request](https://github.com/justbetter/laravel-pagination-with-havings/pulls).

## License
[MIT](LICENSE.md)

## About us
We’re a innovative development agency from The Netherlands building awesome websites, webshops and web applications with Laravel and Magento. Check out our website [justbetter.nl](https://justbetter.nl) and our [open source projects](https://github.com/justbetter).

---

<a href="https://justbetter.nl" title="JustBetter"><img src="https://raw.githubusercontent.com/justbetter/art/master/justbetter-logo.png" width="200px" alt="JustBetter logo"></a>
