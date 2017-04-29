
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="/css/apartments.css">
        <link href="https://fonts.googleapis.com/css?family=Raleway:200,200i,400,500,700,800,900" rel="stylesheet">

        <title>Stephanie's Apartment API</title>
    </head>
    <body>
      <div id="app"></div>
      <script>
          window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
          ]) !!};
      </script>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <link rel="stylesheet" href="css/apartments.css">
      <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
