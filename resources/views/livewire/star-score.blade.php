<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<style>
    .carousel-item img {
        width: 100%;
        height: 100vh;
        object-fit: cover;
        border: none;
    }

    .rounded-circle {
        width: 200px;
        /* ปรับขนาดภาพตามที่คุณต้องการ */
        height: 200px;
        object-fit: cover;
        border: none;
    }

    .center-content {
        display: flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        text-align: center;
    }
</style>
<body>
    <div class="container my-4">
        <h1 class="mb-4">ดาวซัลโว</h1>
        <!-- Table for Top Scorers -->
        <div class="card">
            <div class="card-header">
                รายชื่อผู้ทำประตูสูงสุด
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>ชื่อผู้เล่น</th>
                            <th>จำนวนประตู</th>
                            <th>ทีม</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>สมชาย ใจดี</td>
                            <td>15</td>
                            <td>ทีม A</td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>สมหญิง เก่งดี</td>
                            <td>12</td>
                            <td>ทีม B</td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>สมศักดิ์ ลำพอง</td>
                            <td>10</td>
                            <td>ทีม C</td>
                        </tr>
                        <!-- เพิ่มข้อมูลอื่น ๆ ที่ต้องการ -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>
</html>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
