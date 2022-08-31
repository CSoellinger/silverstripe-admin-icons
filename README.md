# SilverStripe Admin Icons

Little helper classes to get SilverStripe admin icon names easily.

1. [Requirements](#requirements)
2. [Installation](#installation)
3. [License](#license)
4. [Documentation](#documentation)
   1. [Csoellinger\Silverstripe\AdminIcons\AdminIcon](#csoellingersilverstripeadminiconsadminicon)
   2. [Csoellinger\Silverstripe\AdminIcons\AdminIconCss](#csoellingersilverstripeadminiconsadminiconcss)
   3. [Csoellinger\Silverstripe\AdminIcons\AdminIconUnicode](#csoellingersilverstripeadminiconsadminiconunicode)
5. [Maintainers](#maintainers)
6. [Bugtracker](#bugtracker)
7. [Development and contribution](#development-and-contribution)
   1. [(Re-)Generate classes](#re-generate-classes)
   2. [Icon Preview](#icon-preview)

## Requirements

* PHP 7.* or PHP 8.0
* SilverStripe ^4
* SilverStripe Admin ^1

## Installation

Just install it with composer. Major and minor versions should be equal to [SilverStripe Admin](https://github.com/silverstripe/silverstripe-admin).

```bash
composer require csoellinger/silverstripe-admin-icons
```

## License
See [License](license.md)

## Documentation

The package generates three classes for all Icons.

### Csoellinger\Silverstripe\AdminIcons\AdminIcon

Held the icon names as class constants. [Source](./src/AdminIcon.php)

```php
<?php

use Csoellinger\Silverstripe\AdminIcons\AdminIcon;

echo AdminIcon::SEARCH; // Output: search
```

### Csoellinger\Silverstripe\AdminIcons\AdminIconCss

Held the icon names prefixed with "font-icon-" as class constants. [Source](./src/AdminIconCss.php)

```php
<?php

use Csoellinger\Silverstripe\AdminIcons\AdminIconCss;

echo AdminIconCss::SEARCH; // Output: font-icon-search
```

### Csoellinger\Silverstripe\AdminIcons\AdminIconUnicode

Held the icon unicode characters as class constants. [Source](./src/AdminIconUnicode.php)

```php
<?php

use Csoellinger\Silverstripe\AdminIcons\AdminIconUnicode;

echo AdminIconUnicode::SEARCH; // Output: s
```

## Maintainers

 * Christopher Söllinger <christopher.soellinger@gmail.com>

## Bugtracker

Bugs are tracked in the issues section of this repository. Before submitting an issue please read over
existing issues to ensure yours is unique.

If the issue does look like a new bug:

 - Create a new issue
 - Describe the steps required to reproduce your issue, and the expected outcome. Unit tests, screenshots
 and screencasts can help here.
 - Describe your environment as detailed as possible: SilverStripe version, Browser, PHP version,
 Operating System, any installed SilverStripe modules.

Please report security issues to the module maintainers directly. Please don't file security issues in the bugtracker.

## Development and contribution

If you would like to make contributions to the module please ensure you raise a pull request and discuss with the module maintainers.

### (Re-)Generate classes

The package provide a composer script which handles the class generation. It uses the SilverStripe font svg directly from the vendor directoryto get only necessary icons. To (re)generate the classes run the following command:

```bash
composer run generate-constant-class
```
### Icon Preview

There is a small script included which allows you to see all included icons. The easiest way to start this is by running a composer script:

```bash
composer run serve
```
