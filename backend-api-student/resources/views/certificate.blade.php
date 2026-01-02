<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Sertifikat</title>
    <style>
        @font-face {
            font-family: 'Manrope Regular';
            src: url("{{ storage_path('fonts/Manrope-Regular.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: 'Manrope Medium';
            src: url("{{ storage_path('fonts/Manrope-Medium.ttf') }}") format("truetype");
        }

        @font-face {
            font-family: 'Manrope Extra Bold';
            src: url("{{ storage_path('fonts/Manrope-ExtraBold.ttf') }}") format("truetype");
        }

        * {
            padding: 0;
            margin: 0;
        }

        body {
            font-family: 'Manrope Regular';
            text-align: center;
            padding: 50px;
            font-size: 14px;
        }

        .certificate {
            border: 1px solid #1a202c;
            padding: 50px;
        }

        .head_title {
            font-size: 25px;
            margin-bottom: 25px;
        }

        .user_full_name {
            font-family: 'Manrope Extra Bold';
            font-size: 20px;
            text-transform: capitalize;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        .user_course_name{
            font-family: 'Manrope Medium';
            font-size: 17px;
            margin-top: 25px;
            margin-bottom: 25px;
        }

        table {
            margin-top: 111px;
            width: 100%;
            font-size: 10px;
        }

        .cert-id{
            margin-top: 11px;
            color: rgb(47, 47, 47);
            font-size: 10px;
        }
    </style>
</head>
<body>
<div class="certificate">
    <p class="head_title">Certificate of Completion</p>
    <p>This is to certify that</p>
    <p class="user_full_name">{{ $name }}</p>
    <p>has successfully completed the course:</p>
    <p class="user_course_name">{{ $course }}</p>
    <p>on {{ $date }}</p>
    <p class="cert-id">id: {{$cert_id}}</p>
    <table class="info__box">
        <tr>
            <td class="info__company" style="">
                <p>iamra</p>
                <p>ilhamrhmtkbr © 2025</p>
                <p>Senen, Jakarta Pusat</p>
                <p>ilhamrhmtkbr@gmail.com</p>
            </td>
            <td class="info__founder" style="text-align: center;">
                <img width="45px" height="45px" src="{{ public_path('iamra-logo.png') }}" alt="Logo"
                    style="max-width: 45px; max-height: 45px">
            </td>
            <td class="qr-code" style="text-align: right;">
                <img width="111" height="111" src="data:image/png;base64,{{ $qr_code }}" alt="QR Code">
                <p style="margin-right: 25px">Scan Here</p>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
