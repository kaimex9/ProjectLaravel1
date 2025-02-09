<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<style>
    body{
    margin: 0px!important;
}

h1{
    text-align: center;
    margin: 20px 0px 20px 0px;
}

.header {
    width: 99vw;
    /* 100% del ancho de la pantalla */
    overflow: hidden;
    /* Evita que la imagen se desborde */
}

.header-img {
    width: 100%;
    /* Ocupar todo el ancho */
    height: 300px;
    /* Ajusta la altura a tu gusto */
    object-fit: cover;
    /* Evita distorsión y recorta si es necesario */
}

.footer {
    width: 99vw;
    /* 100% del ancho de la pantalla */
    overflow: hidden;
    /* Evita que la imagen se desborde */
}

.footer-img {
    width: 100%;
    /* Ocupar todo el ancho */
    height: 300px;
    /* Ajusta la altura a tu gusto */
    object-fit: cover;
    /* Evita distorsión y recorta si es necesario */
}

.content{
    display: flex;
    width: 100%;
    margin: 0px!important;
    justify-content: center;
    align-items: center;
    flex-direction: column;
}
</style>

<body>
    @section('header')
    <h1>HEADER DE LA WEB</h1>
    <header class="header">
        <img src="{{asset('img/header_img.jpg')}}" class="header-img">
    </header>

    @show
    <hr>
    <div class="content">
        @yield('content')
    </div>
    <hr>
    @section('footer')
    <h1>FOOTER DE LA WEB</h1>
    <footer class="footer">
        <img src="{{asset('img/footer_img.jpg')}}" class="footer-img">
    </footer>
</body>

</html>