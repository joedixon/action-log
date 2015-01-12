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

Open the config file and, in the relations array, list all of the models that you wish to log along with the full namespaced class name as a key => value array.

#### Creating relations
For each of the relations that you have specified in the config file, you will need to add the relevant relation method to the model. For instance, for users, you would add the following:

```sh
public function logs()
{
    return $this->morphMany('Selectamark\ActionLog\Models\Log', 'loggable');
}
```

This will allow you to load the logs related to a user directly from Eloquent like so: 

```sh
User::find(1)->with('logs');
```

## Usage

In order to log and action, use the following code:

```sh
Action::log('action', 'type', 'id', 'content');
```
#### Parameters

```sh
action:     the action being carried out (e.g. login, logout, account_update)
type:       relates to the relations setup in the config (e.g. users, items, etc)
id:         the id of the resource (e.g. user account id)
content:    any additional information (e.g. search parameters, updated details)
```

The only required field is action. If the action doesn't already exist, it will be created the first time that action is carried out.

## Extending

Should you need to add addtional methods to the "Log" model, simply extend "Selectamark/ActionLog/Models/Log" and update the "log" parameter in the config file.