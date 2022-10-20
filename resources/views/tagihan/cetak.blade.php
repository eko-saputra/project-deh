<!DOCTYPE html>
<html>
<head>
    <title>BUKTI PEMBAYARAN</title>
    <style>
        html {
            margin:5px;
        }
        .container {
            border: 1px solid #2d2d2d;
            padding: 5px;
        }
        .title {
            font-size: 15px;
        }
        .subtitle {
            font-size: 10px;
        }
        .tabel {
            border:1px solid #6d6d6d;
            padding: 5px;
            margin-top: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <table cellpadding="0" cellspacing="0" width="100%">
            <tr>
                <td class="title"><b>DUMAI ENGLISH HOUSE</b></td>
            </tr>
            <tr>
                <td class="subtitle"><b>the english skill centre</b></td>
            </tr>
            <tr>
                <td class="subtitle"><b>NIB : 1204000222445</b> - Jl. Inpres II No.2</td>
            </tr>
            <tr>
                <td class="subtitle">Kelurahan Bagan Besar - Dumai Telephone : 0853 7400 8599</td>
            </tr>
            <tr>
                <td class="subtitle">
                    gmail : dumaienglishhouse@gmail.com
                    <hr>
                    <center>
                            <b>BUKTI PEMBAYARAN</b>
                    </center>
                </td>
            </tr>
            <tr>
                <td>
                    <table width="100%">
                        <tr class="subtitle">
                            <td width="17%"><b>Nama</b></td>
                            <td width="3%">:</td>
                            <td><b>{{$nama}}</b></td>
                            <td></td>
                        </tr>
                        <tr class="subtitle">
                            <td>No Registrasi</td>
                            <td>:</td>
                            <td>{{$noreg}}</td>
                            <td align="right">Tahun Ajaran : {{$tahun}}</td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td>
                    <table class="tabel" width="100%">
                        <tr class="subtitle">
                            <td width="25%">Bulan</td>
                            <td width="3%">:</td>
                            <td>{{$bln}}</td>
                        </tr>
                        <tr class="subtitle">
                            <td>Jumlah yang dibayar</td>
                            <td>:</td>
                            <td>Rp <?=number_format($bayar,2,',','.');?></td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr class="subtitle">
                <td align="right">
                    <p>Dumai, <?=date('d F Y');?></p>
                    <br>
                    <p>Gentur Mintorogo</p>
                </td>
            </tr>
        </table>
    </div>
</body>
</html>
