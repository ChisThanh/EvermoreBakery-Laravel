``` Tất cả đều ở terminal của ctrl + ` ở vscode


``` 1. git clone https://github.com/ChisThanh/EvermoreBakery-Laravel.git -b dev EvermoreBakery


``` 2. cd EvermoreBakery


``` 3. cp .env.example .env và điển pass db vào 


``` 4. lần đầu chạy bằng ``` docker docker compose up -d --build


``` 5. docker exec -it evermorebakery-laravel-php-1 bash


``` 6. composer install


``` 7. exit


``` Tất cả các lần sau ``` docker docker compose up -d


``` Kiểm tra docker  --> docker ps