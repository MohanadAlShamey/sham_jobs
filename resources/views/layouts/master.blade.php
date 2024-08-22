<!doctype html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>مؤسسة شام للدعاية والإعلان</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Alexandria:wght@100..900&family=Almarai:wght@300;400;700;800&display=swap" rel="stylesheet">
    <style>
        *{
            font-family: "Almarai", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        label{
            margin-block: 3px;
        }
        .info{
            border: 1px solid gray;
            padding-block: 10px;
            padding-inline: 20px;
            background-color: #d4d4d4;
        }
        .required:after {
            content: "*";
            color: red;
        }

    </style>
</head>
<body>
<div id="liveToast" class="toast align-items-center text-bg-primary border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex justify-content-between">
        <div class="toast-body">
            {{session()->get('success')}}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>



@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@if(session()->has('success'))
    <script>

        const toastLiveExample = document.getElementById('liveToast')


        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

        toastBootstrap.show()


    </script>
@endif

</body>
</html>
