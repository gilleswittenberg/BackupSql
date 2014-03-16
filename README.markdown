[![Build Status](https://travis-ci.org/gilleswittenberg/BackupSql.png?branch=master)](https://travis-ci.org/gilleswittenberg/BackupSql) [![Coverage Status](https://coveralls.io/repos/gilleswittenberg/BackupSql/badge.png?branch=master)](https://coveralls.io/r/gilleswittenberg/BackupSql?branch=master) [![Total Downloads](https://poser.pugx.org/gilleswittenberg/BackupSql/d/total.png)](https://packagist.org/packages/gilleswittenberg/BackupSql) [![Latest Stable Version](https://poser.pugx.org/gilleswittenberg/BackupSql/v/stable.png)](https://packagist.org/packages/gilleswittenberg/BackupSql)

# BackupSqlShell

Runs mysqldump on a database.

## Requirements

* CakePHP 2.x
* PHP 5.3

## Installation

_[Using [Composer](http://getcomposer.org/)]_

Add the plugin to your project's `composer.json` - something like this:

```composer
	{
		"require": {
			"gilleswittenberg/backup-sql": "dev-master"
		}
	}
```

Because this plugin has the type `cakephp-plugin` set in its own `composer.json`, Composer will install it inside your `/Plugins` directory, rather than in the usual vendors file. It is recommended that you add `/Plugins/BackupSql` to your .gitignore file. (Why? [read this](http://getcomposer.org/doc/faqs/should-i-commit-the-dependencies-in-my-vendor-directory.md).)

_[Manual]_

* Download this: [http://github.com/gilleswittenberg/BackupSql/zipball/master](http://github.com/gilleswittenberg/BackupSql/zipball/master)
* Unzip that download.
* Copy the resulting folder to `app/Plugin`
* Rename the folder you just copied to `BackupSql`

_[GIT Submodule]_

In your app directory type:

```bash
	git submodule add -b master git://github.com/gilleswittenberg/BackupSql.git Plugin/BackupSql
	git submodule init
	git submodule update
```

_[GIT Clone]_

In your `Plugin` directory type:

		git clone -b master git://github.com/gilleswittenberg/BackupSql.git BackupSql

### Enable plugin

In 2.0 you need to enable the plugin in your `app/Config/bootstrap.php` file:

		CakePlugin::load('BackupSql');

If you are already using `CakePlugin::loadAll();`, then this is not necessary.

## Usage

Run the shell on your cli:

```bash
Console/cake BackupSql.backup_sql default backup.sql
```

This will create a backup of the mysql data configured in your `default` database connection in the `app/tmp/backups` directory named `backup.sql`.

## License

The MIT License (MIT)

Copyright (c) 2014 Gilles Wittenberg

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in
all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
THE SOFTWARE.
