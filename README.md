## Laravel CMS and API with Laravel Generator
=======
Admin Panel or Web CMS

Laravel Boilerplate with [AdminLTE](https://adminlte.io/) Theme with [InfyOm Laravel Generator](https://github.com/InfyOmLabs/laravel-generator).
Following things are ready to be used directly with AdminLTE Theme.

- Signup
- Login
- Forgot Password
- Password Reset
- Home Layout with Sidebar
- 
# Laravel API Backend

Feature :
1. Register\
2. Login\
3. Add Company\
4. List Company\
5. Mark as Favourite\
6. UnMark as Favourite\
7. List Favourite\
## Packages Installed

- InfyOm Laravel Generator
- AdminLTE Templates
- Laravel UI
- Laravel Collective

## Usage

1. Clone/Download a repo.
2. Copy `.env.example` file to `.env` & Setup your environment variables
3. Run `composer install`
4. Generate application key by running `php artisan key:generate`

Once everything is installed, you are ready to go with generator.

## Running with Artisan
php artisan infyom:api_scaffold User --fromTable --tableName=users --datatables=true --prefix=admin

## Deploy with Gitlab CI
-  setting the Gitlab and install Gitlab Runner
(https://docs.gitlab.com/runner/install/linux-repository.html)
