TV Shows web app
================

Requirements
------------

- PHP 5.4
- MySQL 5.5.29
- Symfony 1.4.20
- Backbone 1.0.0

Set-up
------

Create a database named `tvshows`.

Edit `config/databases.yml`

-> replace `dsn: 'mysql:host=localhost;port=8889;dbname=tvshows'` by `dsn: 'mysql:host=localhost:8889;port=8889;dbname=tvshows'`

Run `php symfony propel:build --all --and-load --no-confirmation`

Revert your change in `config/databases.yml`

URIs
----

/show

- list all shows
- add a new show
- edit a show
- delete a show (no confirmation)

/show/show/id/1

- one show details
- edit possible via standard form and post

/genre

- list all genres
- hard coded list of genres

/genre/show/id/10

- list all shows with genre 10 (fantasy)

/person

- list all persons
- add a new person
- edit a person profile
- delete a person (no confirmation)
