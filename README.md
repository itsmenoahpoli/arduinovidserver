<h1>ArduinoVids Server</h1>
<hr />

<h4>Installation & setup guide</h4>
<small>Note: XAMPP must be installed first</small>

```bash

https://github.com/itsmenoahpoli/arduinovidserver.git

cd arduinovidsserver

composer install

cp .env.example .env

php artisan key:generate

php artisan migrate --seed

php artisan serve
```
---
After running the command above, the web application should be running and accessible by browser via `http://localhost:8000`
