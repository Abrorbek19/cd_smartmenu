<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('menu/assets/css/404.css')}}" />
    <title>404 Not Found</title>
</head>
<body>

<div class="error-area py-100">
    <div class="container">
        <div class="col-md-6 mx-auto">
            <div class="error-wrapper">
                <div class="error-img">
                    <img src="{{asset('menu/assets/images/error.png')}}" alt="">
                </div>
                <h2>Opos... Sahifa topilmadi!</h2>
                <p>Siz qidirayotgan sahifa topilmadi, u faol emas yoki texnik muammo boʻlishi mumkin.</p>
                <a href="{{route('index')}}" class="theme-btn">Bosh Sahifaga qaytish <i class="far fa-home"></i></a>
            </div>
        </div>
    </div>
</div>

</body>
</html>
