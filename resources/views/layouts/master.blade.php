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
    <style>
        /* تحسين تخطيط الجدول */
        .table {
            margin: 20px 0;
            font-size: 16px;
        }

        .table thead th {
            background-color: #e52b18; /* لون الخلفية للرأس */
            color: #fff; /* لون النص للرأس */
            border-bottom: 2px solid #d4d4d4; /* تحديث لون الحدود */
            padding: 15px;
            text-transform: uppercase; /* تحويل النص إلى أحرف كبيرة */
            letter-spacing: 1px; /* تباعد الأحرف */
        }

        .table tbody td {
            padding: 12px;
            vertical-align: middle;
            text-align: center;
            border-top: 1px solid #dee2e6;
        }

        /* تظليل عند التمرير فوق الصف */
        .table tbody tr:hover {
            background-color: #f9f9f9; /* لون أكثر نعومة عند التمرير */
            transition: background-color 0.3s ease;
        }

        /* تصميم زر التقديم */
        .btn-primary {
            background-color: #007BFF; /* تحديث لون الخلفية للأزرار */
            border-color: #007BFF;
            color: #fff; /* لون النص للأزرار */
            padding: 8px 16px; /* تكبير حجم الأزرار قليلاً */
            font-size: 14px;
            border-radius: 5px; /* جعل الزر دائري الأطراف */
            transition: background-color 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        /* تصميم الروابط */
        .table a.nav-link {
            color: #007BFF;
            text-decoration: none;
            font-weight: bold;
        }

        .table a.nav-link:hover {
            text-decoration: underline;
            color: #0056b3;
        }

        /* تحسين النص */
        .table-responsive {
            overflow-x: auto;
        }

        /* تحسين رأس الصفحة */
        h1 {
            font-size: 36px;
            margin-bottom: 10px;
            color: #333;
            font-weight: bold;
            position: relative;
        }

        h1::after {
            content: "";
            width: 100px;
            height: 4px;
            background-color: #e52b18;
            display: block;
            margin: 10px auto 0;
            border-radius: 2px;
        }

        h2 {
            font-size: 24px;
            margin-bottom: 20px;
            color: #555;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        h2 a {
            color: #007BFF;
            text-decoration: none;
        }

        h2 a:hover {
            color: #0056b3;
            text-decoration: underline;
        }

        h3 {
            font-size: 22px;
            margin-bottom: 20px;
            color: #444;
            font-weight: 500;
            border-bottom: 2px solid #e52b18;
            display: inline-block;
            padding-bottom: 5px;
            text-transform: uppercase;
        }

        @media (max-width: 768px) {
            .table {
                font-size: 14px;
            }

            .table thead th, .table tbody td {
                padding: 10px;
            }

            .btn-primary {
                padding: 5px;
                font-size: 12px;
            }

            h1 {
                font-size: 28px;
            }

            h2 {
                font-size: 20px;
            }

            h3 {
                font-size: 18px;
            }
            }
       </style>
</head>
<body>
<div id="liveToast" class="toast align-items-center @if(session()->has('success')) text-bg-primary @elseif(session()->has('error')) text-bg-danger @endif border-0" role="alert" aria-live="assertive" aria-atomic="true">
    <div class="d-flex justify-content-between">
        <div class="toast-body">
            {{session()->get('success')}}
            {{session()->get('error')}}
        </div>
        <button type="button" class="btn-close btn-close-white me-2 m-auto" data-bs-dismiss="toast" aria-label="Close"></button>
    </div>
</div>



@yield('content')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>
@if(session()->has('success') || session()->has('error'))
    <script>

        const toastLiveExample = document.getElementById('liveToast')


        const toastBootstrap = bootstrap.Toast.getOrCreateInstance(toastLiveExample)

        toastBootstrap.show()


    </script>
@endif

</body>
</html>
