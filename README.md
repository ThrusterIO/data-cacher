# DataCacher Component

[![Latest Version](https://img.shields.io/github/release/ThrusterIO/data-cacher.svg?style=flat-square)]
(https://github.com/ThrusterIO/data-cacher/releases)
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)]
(LICENSE)
[![Build Status](https://img.shields.io/travis/ThrusterIO/data-cacher.svg?style=flat-square)]
(https://travis-ci.org/ThrusterIO/data-cacher)
[![Code Coverage](https://img.shields.io/scrutinizer/coverage/g/ThrusterIO/data-cacher.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/data-cacher)
[![Quality Score](https://img.shields.io/scrutinizer/g/ThrusterIO/data-cacher.svg?style=flat-square)]
(https://scrutinizer-ci.com/g/ThrusterIO/data-cacher)
[![Total Downloads](https://img.shields.io/packagist/dt/thruster/data-cacher.svg?style=flat-square)]
(https://packagist.org/packages/thruster/data-cacher)

[![Email](https://img.shields.io/badge/email-team@thruster.io-blue.svg?style=flat-square)]
(mailto:team@thruster.io)

The Thruster DataCacher Component.


## Install

Via Composer

``` bash
$ composer require thruster/data-cacher
```


## Usage

```php
$someCacher = new class extends BaseDataCacher
{
    public static function getName() : string
    {
        return 'some_cacher';
    }
    
    public function getKey($keyData) : array
    {
        return ['some', $keyData];
    }
    
    public function getTTL() : int
    {
        return 60 * 60 * 24 * 7
    }
};

$dataCacher = new DataCacher($driver, $someCacher);

$dataCacher->cache($object->getId(), $object);
$dataCacher->get(101);
```

## Testing

``` bash
$ composer test
```


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.


## License

Please see [License File](LICENSE) for more information.
