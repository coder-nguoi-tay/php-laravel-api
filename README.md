
# Task API - Laravel Backend

>Dự án này là một RESTful API quản lý Task sử dụng Laravel.

## Yêu cầu hệ thống
- PHP >= 8.1
- Composer
- SQLite (hoặc MySQL tuỳ chỉnh trong `config/database.php`)

## Hướng dẫn cài đặt
1. Clone project về máy:
	```bash
	git clone <repo-url>
	cd task-api
	```
2. Cài đặt package:
	```bash
	composer install
	```
3. Tạo file `.env` và cấu hình database:
	```bash
	cp .env.example .env
	# Sửa DB_DATABASE=database/database.sqlite hoặc cấu hình MySQL
	```
4. Tạo key ứng dụng:
	```bash
	php artisan key:generate
	```
5. Chạy migrate và seed dữ liệu mẫu:
	```bash
	php artisan migrate:fresh --seed
	```
6. Khởi động server:
	```bash
	php artisan serve --host=127.0.0.1 --port=8000
	```
	Truy cập: [http://127.0.0.1:8000](http://127.0.0.1:8000)

## Cấu trúc thư mục

- `app/Models/`         : Model Eloquent
- `app/Http/Controllers`: Controller cho API
- `app/Repositories/`   : Repository cho truy vấn dữ liệu
- `app/Services/`       : Xử lý nghiệp vụ
- `routes/api.php`      : Định nghĩa route cho API
- `database/migrations/`: Các file migration
- `database/seeders/`   : Seeder dữ liệu mẫu

## Các API chính

### Task
- `GET    /api/tasks`           : Lấy danh sách task
- `POST   /api/tasks`           : Tạo mới task
- `GET    /api/tasks/{id}`      : Xem chi tiết task
- `PUT    /api/tasks/{id}`      : Cập nhật task
- `DELETE /api/tasks/{id}`      : Xoá task

### Auth
- `POST /api/login`             : Đăng nhập
- `POST /api/register`          : Đăng ký

## Kiểm thử
Chạy test bằng lệnh:
```bash
php artisan test
```

## Ghi chú
- Đã tích hợp OAuth2 (Laravel Passport/Sanctum) cho xác thực API.
- Có thể mở rộng thêm các tính năng quản lý User, phân quyền, v.v.

## License
Dự án sử dụng giấy phép MIT.
