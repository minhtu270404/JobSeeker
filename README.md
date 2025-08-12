<p align="center">
  <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
</p>

<p align="center">
  <a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
  <a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# JobSeeker

## Giới thiệu

**JobSeeker** là một nền tảng tìm kiếm việc làm trực tuyến cho phép:
- Nhà tuyển dụng đăng tin tuyển dụng cho các vị trí **toàn thời gian** và **bán thời gian**.
- Ứng viên tìm kiếm, ứng tuyển vào các công việc phù hợp.
- Khách hàng có thể đăng **việc làm thuê ngắn hạn** (freelance/giao vặt) ví dụ: "Nhận viết báo cáo - 200k".
- Thanh toán được thực hiện thông qua nền tảng để đảm bảo an toàn giao dịch.

Dự án được xây dựng bằng **Laravel** với kiến trúc chuẩn MVC, tuân thủ clean code, áp dụng chuẩn thiết kế database 3NF và tích hợp unit test.

## Tính năng chính

- Đăng ký/Đăng nhập cho ứng viên và nhà tuyển dụng.
- Đăng và quản lý tin tuyển dụng.
- Tìm kiếm, lọc việc làm theo tiêu chí.
- Hệ thống thanh toán và bảo đảm giao dịch.
- Quản trị hệ thống (admin dashboard).

## Thông tin chung

- **Tên dự án:** JobSeeker
- **Framework:** Laravel
- **Ngôn ngữ:** PHP, JavaScript
- **Cơ sở dữ liệu:** MySQL
- **Tác giả:** Nguyễn Minh Tú

## Cài đặt

```bash
# Clone dự án
git clone https://github.com/<username>/JobSeeker.git

# Cài đặt dependencies
composer install
npm install

# Tạo file môi trường
cp .env.example .env

# Generate key
php artisan key:generate

# Chạy migration
php artisan migrate

# Chạy server
php artisan serve
