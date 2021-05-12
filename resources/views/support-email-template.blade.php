<!doctype html>
<html lang="en">
<head>
    <title>File Management Service</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-xl-6 col-lg-6 col-sm-12 m-auto">
            <h3> Neue Kunden Support Anfrage</h3>
            <p class="lead"> Anrede: {{ $userdetails[0] }}</p>
            <p class="lead"> Name: {{ $userdetails[1] }}</p>
            <p class="lead"> E-Mail: {{ $userdetails[2] }}</p>
            <p class="lead"> Nachricht: {{ $userdetails[3] }}</p>
        </div>
    </div>
</div>
</body>
</html>
