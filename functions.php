<?php

function escape($value)
{
    return htmlspecialchars((string) ($value ?? ''), ENT_QUOTES, 'UTF-8');
}

function kiemTraSoHoanHao($n)
{
    if ($n <= 1) {
        return false;
    }

    $tongUoc = 1;
    $canBacHai = (int) sqrt($n);

    for ($i = 2; $i <= $canBacHai; $i++) {
        if ($n % $i == 0) {
            $tongUoc += $i;
            $uocCap = $n / $i;
            if ($uocCap != $i) {
                $tongUoc += $uocCap;
            }
        }
    }

    return $tongUoc == $n;
}

function tinhGiaiThua($n)
{
    if ($n <= 1) {
        return 1;
    }
    return $n * tinhGiaiThua($n - 1);
}

function timUocSo($n)
{
    if ($n <= 0) {
        return [];
    }

    $danhSachUoc = [];
    $canBacHai = (int) sqrt($n);

    for ($i = 1; $i <= $canBacHai; $i++) {
        if ($n % $i == 0) {
            $danhSachUoc[] = $i;
            $uocCap = $n / $i;
            if ($uocCap != $i) {
                $danhSachUoc[] = $uocCap;
            }
        }
    }

    sort($danhSachUoc);
    return $danhSachUoc;
}

function phanLoaiMang($mangSo)
{
    $am = [];
    $duong = [];
    $khong = [];

    foreach ($mangSo as $so) {
        if ($so < 0) {
            $am[] = $so;
        } elseif ($so > 0) {
            $duong[] = $so;
        } else {
            $khong[] = $so;
        }
    }

    return [
        'am' => $am,
        'duong' => $duong,
        'khong' => $khong,
    ];
}

function doiGiaySangGio($tongGiay)
{
    $gio = (int) ($tongGiay / 3600);
    $phut = (int) (($tongGiay % 3600) / 60);
    $giay = $tongGiay % 60;

    return sprintf('%02d:%02d:%02d', $gio, $phut, $giay);
}

class Person
{
    protected $hoTen;
    protected $ngaySinh;
    protected $queQuan;

    public function __construct($hoTen, $ngaySinh, $queQuan)
    {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
    }

    public function getHoTen()
    {
        return $this->hoTen;
    }

    public function getNgaySinh()
    {
        return $this->ngaySinh;
    }

    public function getQueQuan()
    {
        return $this->queQuan;
    }
}

class SinhVien extends Person
{
    private $lop;

    public function __construct($hoTen, $ngaySinh, $queQuan, $lop)
    {
        parent::__construct($hoTen, $ngaySinh, $queQuan);
        $this->lop = $lop;
    }

    public function getLop()
    {
        return $this->lop;
    }
}
