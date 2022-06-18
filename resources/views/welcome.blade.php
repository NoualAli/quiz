<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <title>Quiz</title>
</head>

<body>
    <div class="container is-fluid" id="quiz-container">
        <Quiz />
    </div>
    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
