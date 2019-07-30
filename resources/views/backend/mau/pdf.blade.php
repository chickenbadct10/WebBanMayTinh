<!DOCTYPE html>
<html>
<head>
        <title>Danh sách Màu</title>
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
                $tongSoTrang = ceil(count($mau)/5);
                    ?>
                <table border="1" align="center" cellpadding="5" style="width:80%">
                    <caption>Danh sách Màu</caption>
                    <tr>
                        <th colspan="6" align="center">Trang 1 / {{ $tongSoTrang }}</th>
                    </tr>
                    <tr>
                        <th style="width:5%">STT</th>
                        <th style="width:15%">Mã Màu</th>
                        <th style="width:90%">Tên Màu</th>
                    </tr>
                    @foreach ($mau as $m)
                    <tr>
                        <td align="center">{{ $loop->index + 1 }}</td>
                        <td align="left">{{ $m->m_ma }}</td>
                        <td align="left">{{ $m->m_ten }}</td>
                    </tr>
                    @if (($loop->index + 1) % 5 == 0)
                </table>
                <div class="page-break"></div>
                <table border="1" align="center" cellpadding="5" style="width:80%">
                    <tr>
                        <th colspan="6" align="center">Trang {{ 1 + floor(($loop->index + 1) / 5) }} / {{ $tongSoTrang }}</th>
                    </tr>
                    <tr>
                        <th style="width:5%">STT</th>
                        <th style="width:15%">Mã Màu</th>
                        <th style="width:90%">Tên Màu</th>
                    </tr>
                    @endif
                    @endforeach
                </table>
    </div>
</body>
</html>
