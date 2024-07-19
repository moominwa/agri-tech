<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
        @livewireStyles
        <title>หน้าแรกของเว็บ</title>
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Agriddd</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Home</a>
                    </li>

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            สมัคร
                        </a>
                        <ul class="dropdown-menu" >
                            <li><a class="dropdown-item" href="">สมาชิก</a></li>
                            <li><a class="dropdown-item" href="/register-menu">เข้าร่วมแข่งขัน</a></li>
                            <li><a class="dropdown-item" href="/paymentsure">ชำระเงิน</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ตาราง
                        </a>
                        <div class="dropdown-menu text-dark" id="account">
                            <a class="dropdown-item" href="/score">ตารางแข่งขัน</a>
                            <a class="dropdown-item" href="/score_team">ผลการแข่งขัน</a>
                            <a class="dropdown-item" href="/score_table">คะแนน</a>
                            <a class="dropdown-item" href="/star_score">ดาวซัลโว</a>
                            <a class="dropdown-item" href="/team_information">ข้อมูลทีม</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            ตรวจสอบ
                        </a>
                        <div class="dropdown-menu text-dark" id="account">
                            <a class="dropdown-item" href="/player_information">รายชื่อทีมที่สมัคร</a>
                            <a class="dropdown-item" href="">รายชื่อทีมที่ได้รับการอนุมัติ</a>
                            <a class="dropdown-item" href="">รายชื่อทีมที่ชำระเงินแล้ว</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="">ล็อกอิน</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-dark" href="">logout</a>
                    </li>

                </ul>
            </div>
        </div>
    </nav>
    @yield('content')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
    @livewireScripts
</body>

</html>
