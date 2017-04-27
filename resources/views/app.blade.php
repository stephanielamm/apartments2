
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Seths Important Contacts</title>
    </head>
    <body>
      <div id="app"></div>
      <script>
          window.Laravel = {!! json_encode([
              'csrfToken' => csrf_token(),
          ]) !!};
      </script>
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
      <script src="{{ mix('js/app.js') }}"></script>
    </body>
</html>
