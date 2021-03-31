# Lumen API

API has 4 routes for cron management

## Installation

All we have to do is
- Setup php and database
- Rename `.env.example` to `.env`
- Edit `.env` for database
- Run `composer install`
- Run `php artisan migrate`
- Add `* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1` to your crontab

## API Routes
### `GET /api/v1/cron`
~~~~~~
Response will be:
[
    {
        "id": string,
        "command": string,
        "time": string,
        "created_at": string,
        "updated_at": string
    }
]



Example:
[
    {
        "id": 1,
        "command": "Rmdir D:\\OSPanel\\domains\\localhost\\storage\\folder",
        "time": "* * * * *",
        "created_at": "2021-03-31T18:13:50.000000Z",
        "updated_at": "2021-03-31T15:57:02.000000Z"
    },
    {
        "id": 3,
        "command": "Rmdir D:\\OSPanel\\domains\\localhost\\storage\\folder",
        "time": "* * * * *",
        "created_at": "2021-03-31T15:57:59.000000Z",
        "updated_at": "2021-03-31T15:57:59.000000Z"
    }
]
~~~~~~


### `GET /api/v1/cron/{id}`
~~~~~~
Response will be:
{
    "id": string,
    "command": string,
    "time": string,
    "created_at": string,
    "updated_at": string
}


Example:
{
    "id": 3,
    "command": "Rmdir D:\\OSPanel\\domains\\localhost\\storage\\folder",
    "time": "* * * * *",
    "created_at": "2021-03-31T15:57:59.000000Z",
    "updated_at": "2021-03-31T15:57:59.000000Z"
}
~~~~~~

### `POST /api/v1/cron`
~~~~~~
Request will be:
{
    "cron": string
}

Example of request:
{
    "cron": "* * * * * rm -rf /var/www/dir"
}

=======================================================

Response will be:
{
    "id": string,
    "command": string,
    "time": string,
    "created_at": string,
    "updated_at": string
}


Example of response:
{
    "id": 4,
    "command": "rm -rf /var/www/dir",
    "time": "* * * * *",
    "created_at": "2021-03-31T15:57:59.000000Z",
    "updated_at": "2021-03-31T15:57:59.000000Z"
}
~~~~~~

### `PUT /api/v1/cron/{id}`
~~~~~~
Request will be:
{
    "cron": string
}

Example of request:
{
    "cron": "* * * * * rm -rf /var/www/blablabla"
}

=======================================================

Response will be:
{
    "id": string,
    "command": string,
    "time": string,
    "created_at": string,
    "updated_at": string
}


Example of response:
{
    "id": 4,
    "command": "rm -rf /var/www/blablabla",
    "time": "* * * * *",
    "created_at": "2021-03-31T15:57:59.000000Z",
    "updated_at": "2021-03-31T15:57:59.000000Z"
}
~~~~~~

### `PUT /api/v1/cron/{id}`
~~~~~~
Resopnse will be with status code 204
~~~~~~

### Errors
~~~~~~
422 error wil; be:
{
    "ok": false,
    "message": "The given data was invalid",
    "error": {
        "message": "The given data was invalid",
        "errors": {
            "cron": [
                "The cron field is required."
            ]
        },
        "status_code": 422
    }
}

404 error will be:
{
    "message": "No query results for model [...] {id}"
}

~~~~~~


# License
The Lumen framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
