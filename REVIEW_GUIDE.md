# Review Guide

## Mapping đề bài → mã nguồn

1. **Nhập số đến 0** → `exercises/bai1.php` (sử dụng `$_SESSION`)
2. **Số hoàn hảo** → `exercises/bai2.php` + hàm `kiemTraSoHoanHao()` trong `functions.php`
3. **Giai thừa** → `exercises/bai3.php` + hàm `tinhGiaiThua()` trong `functions.php`
4. **Ước số** → `exercises/bai4.php` + hàm `timUocSo()` trong `functions.php`
5. **Mảng 10 phần tử** → `exercises/bai5.php` + hàm `phanLoaiMang()` trong `functions.php`
6. **Giây → HH:MM:SS** → `exercises/bai6.php` + hàm `doiGiaySangGio()` trong `functions.php`
7. **PERSON/SINHVIEN** → `exercises/bai7.php` + class `Person`, `SinhVien` trong `functions.php`

## Test case nhanh khi demo

| Bài | Input | Kết quả mong đợi |
|---|---|---|
| 1 | `5`, `-2`, `0` | Dãy dừng sau `0` |
| 2 | `28` | Là số hoàn hảo |
| 3 | `5` | `120` |
| 4 | `12` | `1, 2, 3, 4, 6, 12` |
| 5 | `-12, 7, 0, 3, -4, 18, -1, 6, 0, 9` | 3 âm, 5 dương, 2 số 0 |
| 6 | `3769` | `01:02:49` |
| 7 | Nhập đủ 4 trường | Tạo và hiển thị thẻ SINHVIEN |

## Luồng review gợi ý

`index.php` (Router + Layout) → `functions.php` (Logic tính toán & OOP) → `exercises/bai1.php..bai7.php` (Xử lý form & hiển thị) → `assets/css/style.css` (Giao diện) → `tests/smoke.php`.
