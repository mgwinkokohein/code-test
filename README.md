### Demo Credentials

**Admin:** admin@admin.com  
**Password:** secret

**User:** user@user.com  
**Password:** secret

### Documentation

Replace `module-name` with the actual name of the module you're working with.

php artisan module:make module-name

php artisan module:migrate module-name

To seed the module's database with sample data:

php artisan module:seed module-name


### Cache

In this system i use `Laravel's` Built-in Cache [cache docs](https://laravel.com/docs/8.x/cache)

## Advantages of Cache

Performance: Caching helps store frequently used data in memory, reducing the need to fetch it from slower data sources such as databases or APIs. This leads to faster response times and improved application performance

Reduced Database Load: By caching database query results, the load on the database server can decrease.
Faster response times lead to a better user experience


## Disadvantages of Cache

Outdated Data: Cached data might not always reflect the most recent changes in the underlying data source.
Memory Usage: Caching requires memory resources, and caching too much data could potentially lead to increased memory usage, affecting the overall server performance.

