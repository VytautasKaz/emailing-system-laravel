## Launch instructions:

-   If you do not have composer installed on your system, install it (installation instructions [here](https://getcomposer.org/download)).
-   Clone this repository or download it as a ZIP package.
-   Open it with Visual Studio Code or your preferred code editor.
-   Create a fresh schema in your MySQL server.
-   Rename **'.env.example'** file to **'.env'** inside of the project's root directory and configure the database information.
-   Using GitBash, CMD or other terminal in your code editor:
    -   if composer is installed locally: run **php <'path to composer.phar file location'>/composer.phar install**
    -   if composer is installed on your system globally: run **composer install**
-   Run **php artisan key:generate**
-   Run **php artisan migrate** to create tables.
-   Run **php artisan db:seed** to fill tables with data.
-   Run **php artisan serve**
-   Follow the link that appears in the terminal after running 'php artisan serve'.

## Test login details:

E-mail: admin@admin.com <br>
Password: 123456789

Only works if **php artisan db:seed** step was not skipped.

## Notes:

-   E-mail sending functionality tested with [mailtrap](https://mailtrap.io/).
-   Checkboxes and "Send To Selected" button in the customers page do not function at the moment.
-   Date and time selection of e-mail delivery in e-mail preview page is only visual (non-functioning) at the moment.

## Author:

[Vytautas K.](https://github.com/VytautasKaz)
