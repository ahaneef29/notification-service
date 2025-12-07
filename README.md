## HOW TO SET UP NOTIFICATION SERVICE

1. Clone the git repo
2. CD into the directory
3. composer install
4. npm install
5. php artisan migrate --seed
6. npm run dev


## Open the browser and go to http://notification-service.test
     Note: Im using Laravel Herd.

 - Goto to login page and login with username:`haneef@test.com`  and password: `password`

## Test Offline Assessment using a POSTMAN client   

### To Fire order notification
 -  Call the API `http://notification-service.test/api/test/order-placed`

### To Test Faulty Product Service
 -  Call the API `http://notification-service.test/api/products/faulty`

### To Test Optimized Product Service
-  Call the API `http://notification-service.test/api/products/optimized`

## Problems 1 and 2 question answered.
Please check the `Problem1.md` and `Problem2.md` files which is located at root level. I have updated the with my answers.  
