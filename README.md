# PHP Diff Class

[![SensioLabsInsight](https://insight.sensiolabs.com/projects/aa609edb-cdb1-45cf-ad51-afbdab48f6a1/mini.png)](https://insight.sensiolabs.com/projects/aa609edb-cdb1-45cf-ad51-afbdab48f6a1) [![Codacy Badge](https://api.codacy.com/project/badge/Grade/db5f8d57b1234502aeb852afc87e0dfe)](https://www.codacy.com/app/leet31337/php-diff)

[![Latest Version](https://img.shields.io/github/release/JBlond/php-diff.svg?style=flat-square&label=Release)](https://github.com/JBlond/php-diff/releases) [![Packagist Installs](https://badgen.net/packagist/dt/JBlond/php-diff)](https://packagist.org/packages/jblond/php-diff)

## Introduction

A comprehensive library for generating differences between two hashable objects (strings or arrays).
Generated differences can be rendered in all the standard formats including:

* Unified
* Context
* Inline HTML
* Side by Side HTML
* Unified HTML
* Unified Commandline colored output

The logic behind the core of the diff engine (ie, the sequence matcher) is primarily based on the Python difflib
package. The reason for doing so is primarily because of its high degree of accuracy.

## Install

```shell
composer require jblond/php-diff
```

## Example Use

```PHP
<?php
use jblond\Diff;
use jblond\Diff\Renderer\Html\SideBySide;

// Installed via composer...
require 'vendor/autoload.php';

$sampleA = file_get_contents(dirname(__FILE__).'/a.txt');
$sampleB = file_get_contents(dirname(__FILE__).'/b.txt');

// Options for generating the diff.
$options = [
    'ignoreWhitespace' => true,
    'ignoreCase'       => true,
    'context'          => 2,
    'cliColor'         => 'simple' // for cli output
];

// Initialize the diff class.
$diff = new Diff($sampleA, $sampleB /*, $options */);

// Choose Renderer.
$renderer = new SideBySide([
    'title1' => 'Custom title for sample A',
    'title2' => 'Custom title for sample B',
]);

// Show the output of the difference renderer.
echo $diff->Render($renderer);

// Alternative
// Show the differences or a message.
echo $diff->isIdentical() ? 'No differences found.' : '<pre>' . htmlspecialchars($diff->render($renderer)) . '</pre>' ;

```

### Example Output
File `example.php` contains a quick demo and can be found in the `example/` directory.
Included is a light and a dark theme.

#### HTML Side By Side Example

![HTML Side By Side Example](assets/htmlSideBySide.png "HTML Side By Side Example")

<details><summary>More Example Pictures</summary><br>

#### HTML Inline Example

![HTML Inline Example](assets/htmlInline.png "HTML Inline Example")

#### HTML Unified Example

![HTML Unified Example](assets/htmlUnified.png "HTML Unified Example")

#### Text Unified Example

![Text Unified Example](assets/textUnified.png "Text Unified Example")

#### Text Context Example

![Text Context Example](assets/textContext.png "Text Context Example")

#### Text Unified Console Example

![Text Unified Console Example](assets/textUnifiedCli.png "Text Unified Console Example")

</details>

<details><summary>HTML Side By Side Dark Theme Example</summary><br>


![HTML Side By Side Dark Theme Example](assets/htmlSidebySideDarkTheme.png "HTML Side By Side Dark Theme Example")

</details>

## Requirements

* PHP 7.2 or greater
* PHP Multibyte String
* [jblond/php-cli](https://github.com/jblond/php-cli)

## Merge files using jQuery

Xiphe has build a jQuery plugin with that you can merge the compared files.
Have a look at [jQuery-Merge-for-php-diff](https://github.com/Xiphe/jQuery-Merge-for-php-diff).

## Todo

* Ability to ignore blank line changes
* 3 way diff support

## Contributors

Contributors since I forked the repo.

* maxxer
* Creris
* jfcherng
* DigiLive

### License (BSD License)

see [License](LICENSE)

## Tests

```shell
composer run-script phpunit
composer run-script php_src
composer run-script php_test
```
