<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/gh/rastikerdar/vazir-font@v30.1.0/dist/font-face.css" rel="stylesheet" type="text/css" />
    <title>صفحه بیو مهتاب</title>
    <style>
        body{
            padding: 0;
            margin: 0;
            font-family: Vazir;
        }
        .contanier{
            background: linear-gradient( #BBD2C5 ,#536976 );
            height: 100vh;

            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;

        }
        .logo{
            width: 25rem;
            height: 20rem;
        }
        .btn{
           width: 80vw;
            height: 3rem;
            border-radius: 1rem;
border: none;
        }
        .section{
            margin-bottom: .5rem;
        }
        .b1{
            background-color: rgba(28, 12, 129, 0.8);
        }
        a{
            text-decoration: none;
            color: #fff;
            font-size: 1rem;
            font-weight: 400;
            font-family: Vazir;
        }
        .b2{
            background-color: #4286f4;

        }
        .b3{
            background-color: rgba(186, 4, 113, 0.8);
        }
        .b4{
            background-color: rgba(50, 159, 10, 0.8);
        }

    </style>
</head>
<body>
    <div class="contanier">
        <div class="section">
            <img src="{{option()->image}}" alt="" class="logo">
        </div>
        <h2 style="text-align:  center;color: #fff ; letter-spacing: 2px;font-family: Vazir">خانه مهتاب</h2>
        <div class="section">
            <button class="btn b1"><a href="https://mahtab-villa.ir/">ورود به سایت رسمی خانه مهتاب</a></button>
        </div>
        <div class="section">
            <button class="btn b2"><a href="https://app.mahtab-villa.ir/">ورود به نسخه موبایلی خانه مهتاب</a></button>
        </div>
        <div class="section">
            <button class="btn b3"><a href="app.apk">دانلود اپلیکشن اندرویدی خانه مهتاب</a></button>
        </div>
        <div class="section" style="margin-bottom: 15rem">
            <button class="btn b4"><a href="{{option()->whatsup}}">واتساپ خانه مهتاب</a></button>
        </div>

    </div>

</body>
</html>
