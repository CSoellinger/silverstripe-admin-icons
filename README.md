# SilverStripe Admin Icons

This is a small utility package for the included SilverStripe icons. This package reads the svg font and
generate some classes with constants for easily accessing the icon names.

The icon names will be generated from the SilverStripe font svg which can be found inside the silverstripe/admin module.

## Installation

```bash
composer require csoellinger/silverstripe-admin-icons
```

## Usage

```php
<?php

use Csoellinger\Silverstripe\AdminIcons\AdminIcon;
use Csoellinger\Silverstripe\AdminIcons\AdminIconCss;
use Csoellinger\Silverstripe\AdminIcons\AdminIconUnicode;

echo AdminIcon::SEARCH; // Output: search
echo AdminIconCss::SEARCH; // Output: font-icon-search
echo AdminIconUnicode::SEARCH; // Output: s
```
## Icon Preview

There is a small script included which allows you to see all included icons. The easiest way to start this is by running a composer script:

```bash
composer run serve
```

## Contribute

The only thing you can contribute is to regenerate the classes if new icons are included. This can be done easily. Just update the silverstripe/admin package. An after update and install hook is there, however you can regenerate it manually:

```bash
composer run generate-constant-class
```
