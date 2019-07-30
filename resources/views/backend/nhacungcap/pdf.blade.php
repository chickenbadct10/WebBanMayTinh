<!DOCTYPE html>
<html>
<head>
        <title>Danh sách nhà cung cấp</title>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <style type="text/css">
            * {
                font-family: DejaVu Sans, sans-serif;
            }
            body {
                font-size: 10px;
            }
            table {
                border-collapse: collapse;
            }
            td {
                vertical-align: middle;
            }
            caption {
                font-size: 20px;
                font-weight: bold;
                text-align: center;
            }
            .hinhSanPham {
                width: 100px;
                height: 100px;
            }
            .companyInfo {
                font-size: 13px;
                font-weight: bold;
                text-align: center;
            }
            .companyImg {
                width: 200px;
                height: 200px;
            }
            .page-break {
                page-break-after: always;
            }
            .sanpham-thumbnail{
                width: 100px;
                height: 100px;
            }
        </style>
</head>
<body>
    <div class="row">
            <table border="0" align="center" cellspacing="0">
                    <tr>
                        <td class="companyInfo" align="center">
                            Công ty TNHH Sunshine<br />
                            http://sunshine.com/<br />
                            (0292)3.888.999 # 01.222.888.999<br />
                            <img src="{{ asset('img/logo-nentang.jpg') }}" class="logo" />
                        </td>
                    </tr>
                </table>
                <br />
                <br />
                <?php
                $tongSoTrang = ceil(count($nhacungcap)/5);
                    ?>
                <table border="1" align="center" cellpadding="5">
                    <caption>Danh sách nhà cung cấp</caption>
                    <tr>
                        <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
                    </tr>
                    <tr>
                        <th>STT</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Người đại diện</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Xuất xứ</th>
                    </tr>
                    @foreach ($nhacungcap as $ncc)
                    <tr>
                        <td align="center">{{ $loop->index + 1 }}</td>
                        <td align="left">{{ $ncc->ncc_ten }}</td>
                        <td align="right">{{ $ncc->ncc_daiDien }}</td>
                        <td align="right">{{ $ncc->ncc_diaChi }}</td>
                        <td align="right">{{ $ncc->ncc_dienThoai }}</td>
                        <td align="right">{{ $ncc->ncc_email }}</td>
                        @foreach ($xuatxu as $xx)
                        @if ($ncc->xx_ma == $xx->xx_ma)
                        <td align="left">{{ $xx->xx_ten }}</td>
                        @endif
                        @endforeach
                    </tr>
                    @if (($loop->index + 1) % 5 == 0)
                </table>
                <div class="page-break"></div>
                <table border="1" align="center" cellpadding="5">
                    <tr>
                        <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
                    </tr>
                    <tr>
                        <th>STT</th>
                        <th>Tên nhà cung cấp</th>
                        <th>Người đại diện</th>
                        <th>Địa chỉ</th>
                        <th>Điện thoại</th>
                        <th>Email</th>
                        <th>Xuất xứ</th>
                    </tr>
                    @endif
                    @endforeach
                </table>
    </div>
</body>
</html>
