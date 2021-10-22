# PHP_SandBox
Một repos phục vụ cho quá trình làm bài tập lý thuyết PHP và luyện tập sử dụng [Git](https://git-scm.com/)/[GitHub](https://github.com/)

## Yêu cầu cài đặt
- [Laragon](https://laragon.org/) hoặc [Xampp](https://www.apachefriends.org/download.html)
- MySQL
- PHP >= 7.0
## Cơ sở dữ liệu
### Yêu cầu chung
- Chạy trên `localhost`
- Tên người dùng csdl là `root`
- **Không sử dụng mật khẩu** cho csdl
- Sử dụng duy nhất một database là `ltmt` trong suốt quá trình phát triển
### Yêu cầu table cơ sở dữ liệu
- Sử dụng query có sẵn trong thư mục `PHP/LT2/setup/db.sql` để khởi tạo database trên MySql server
- **user**

| Field|Type |Length |Allow Null |Default Value |
|------|:---|:-----|:----------|:------------|
| id | INT | 11 | No | AUTO_INCREMENT |
| username | VARCHAR | 50 | No | No default |
| password | VARCHAR | 255 | No | No default |
| birth | DATE | Không | No | No default |
| gender | VARCHAR | 10 | Yes | NULL |
| hobbies | VARCHAR | 255 | Yes | NULL |
| address_id | INT | 11 | Yes | No default |

- **address**

| Field|Type |Length |Allow Null |Default Value |
|------|:---|:-----|:----------|:------------|
| id | INT | 11 | No | AUTO_INCREMENT |
| province | VARCHAR | 255 | No | No default |

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.
