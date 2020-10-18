Habits API catalog by Tim Ermilov (driven by Laravel 8)
-

Clone repo and run 

> composer install
>
> php artisan migrate
>
> php artisan db:seed
>

Make a get request at /api/habits to see the catalog

Params available:
- 

- title (string) = search by habit title %Breath% 
- page (int) = number of page (default = 1)

Example:

> /api/habits?page=1&title=fr
