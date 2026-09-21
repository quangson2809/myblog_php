# PHP Basic Practice — Glass UI (Beginner Friendly)

Bài thực hành HTML, CSS, PHP gồm 7 yêu cầu: nhập số đến 0, số hoàn hảo, giai thừa, ước số, mảng 10 phần tử, đổi giây sang thời gian và kế thừa `PERSON` → `SINHVIEN`.

## Đặc điểm kiến trúc

- **PHP thuần cơ bản:** Dành cho người mới học, không dùng framework, không dùng `namespace` hay các tầng Service phức tạp.
- **Không dùng JavaScript:** Form submit thuần túy (GET/POST), menu điều hướng liên kết trực tiếp không bị chặn bởi JS.
- **Giao diện Glassmorphism:** Giữ nguyên thiết kế Dark Glass đẹp mắt, responsive bằng CSS thuần.
- **Dễ học, dễ review:** Mỗi bài tập là 1 file độc lập trong thư mục `exercises/`. Các hàm tính toán và class OOP tập trung ở `functions.php`.

## Cấu trúc thư mục

```text
php-basic-glass/
├── index.php             # File chính: Khung giao diện (Header, Banner, Sidebar, Footer) & Router ?bai=1..7
├── functions.php         # Các hàm tính toán bài 2..6, class Person & SinhVien (OOP) bài 7
├── exercises/            # Mã nguồn 7 bài tập (nhận form và hiển thị kết quả)
│   ├── bai1.php          # Bài 1: Nhập số đến khi gặp 0 (dùng $_SESSION)
│   ├── bai2.php          # Bài 2: Kiểm tra số hoàn hảo
│   ├── bai3.php          # Bài 3: Tính n giai thừa bằng đệ quy
│   ├── bai4.php          # Bài 4: Liệt kê ước số của n
│   ├── bai5.php          # Bài 5: Mảng 10 phần tử (đếm âm, dương, 0)
│   ├── bai6.php          # Bài 6: Đổi giây sang giờ:phút:giây
│   └── bai7.php          # Bài 7: Hướng đối tượng (Person & SinhVien kế thừa)
├── assets/
│   └── css/style.css     # Giao diện Glassmorphism đen/xanh/vàng, responsive CSS
└── tests/
    └── smoke.php         # Kiểm thử nhanh logic các hàm bằng dòng lệnh
```

## Chạy bằng XAMPP

1. Mở **XAMPP Control Panel** và bật module **Apache**.
2. Đặt thư mục project trong `htdocs` của XAMPP.
3. Mở trình duyệt và truy cập:
   ```text
   http://localhost/php-basic-glass/
   hoặc:
   http://localhost/AssignmentsUTC/php-basic-glass-layout-reference-dark/php-basic-glass/
   ```

## Tùy chỉnh thông tin và liên kết Menu

Mọi cấu hình đều nằm ngay ở đầu file `index.php`:
- Sửa thông tin sinh viên tại mảng `$thongTinSinhVien`.
- Sửa đường dẫn các nút trên thanh Header (C/C++, HTML, JavaScript,...) tại mảng `$menuLinks`:
  ```php
  $menuLinks = [
      'Trang chủ'  => '?bai=1',
      'C/C++'      => '../Module1/index.php', // Link tới thư mục/trang bạn muốn
      'PHP'        => '?bai=1',
      'HTML'       => '../html/index.php',
      'JavaScript' => '../javascript/index.php',
  ];
  ```

## Kiểm tra nhanh

Chạy smoke test để kiểm tra tính đúng đắn của toàn bộ các hàm:

```bash
php tests/smoke.php
```
