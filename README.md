## Fit app

clone the repo and plaese run next commands in your terminal

```sh
- composer install
- php artisan migrate --seed
- php artisan serve
```
- .env is provided in root of project please change to your credential DB_DATABASE, DB_USERNAME, DB_PASSWORD
- postmen collection is in the root of project

Project should be found on route http://127.0.0.1:8000

Project has one route
```sh
- GET route http://127.0.0.1:8000/reception
- it takes two parameters object_uuid and card_uuid
- find object_uuid in DB under table uuids , field uuid  where  model_type 'App\Models\Facility'
- find card_uuid in DB under table uuids , field uuid  where  model_type 'App\Models\User'
```

