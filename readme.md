# Action Log

A package to log user activity

## Installation

#### Composer Require

```sh
"selectamark/action-log": "dev-master"
```

#### Composer Repositories

```sh
"repositories": [
  {
	"type": "vcs",
	"url":  "https://github.com/selectamark/action-log.git"
  }
]
```

#### Service Provider
Add the following to the providers array in app/config/app.php

```sh
'Selectamark\ActionLog\ActionLogServiceProvider',
```

#### Migrations
Run the following from the command line in the root of your project

```sh
php artisan migrate --package="selectamark/action-log"
```

#### Config
Now run the following from the command line in the root of your project to publish the assets

```sh
php artisan config:publish "selectamark/action-log"
```