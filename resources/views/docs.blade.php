<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/swagger-ui/3.18.1/swagger-ui.css">
    <title>{{ config('app.name') }}</title>
</head>
<body>
<div id="app"></div>
<script src="{{ mix('js/app.js') }}" type='text/javascript'></script>
<script>
  SwaggerUI({
    url: "/swagger.yaml",
    dom_id: '#app'
  })
</script>
</body>
</html>
