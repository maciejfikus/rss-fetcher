Fetch RSS to CSV
================

CLI Tool for fetching articles from given RSS feed and transforming it into .csv file.

- [Installation](#installation)
- [Usage](#usage)
- [Testing](#testing)


Installation
------------

Package is not (yet) available via composer. Please download as .zip file and check out available commands below.

Usage
-----

#### Available commands:

Fetch RSS feed into .csv file. File will be overwritten if its already exists.
``` bash
php src/console.php csv:simple <URL> <PATH>
```

Fetch RSS feed into .csv file. If file already exists, new data will be appended to the file.
``` bash
php src/console.php csv:extended <URL> <PATH>
```

Files are stored in `/storage/` by default. 

#### Example:
``` bash
php src/console.php csv:extended "http://www.nationalgeographic.it/rss/natura/animali/rss2.0.xml" sample.csv
```




Testing
-------

``` bash
$ ./vendor/bin/phpunit
```

License
-------

The MIT License (MIT).