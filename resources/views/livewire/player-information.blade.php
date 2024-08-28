<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>รายชื่อทีมสมัครเข้าร่วมการแข่งขัน</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .table-wrapper {
            margin: 20px auto;
            width: 100%;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .score-table th {
            background-color: #343a40;
            color: #ffffff;
        }

        .score-table td {
            text-align: center;
            vertical-align: middle;
        }

        .table-header {
            background-color: #b5e8c2;
            color: #ffffff;
            padding: 10px 15px;
            border-radius: 8px 8px 0 0;
            text-align: center;
        }
    </style>

</head>

<body>
    <div class="container">
        <h3 class="text-center py-2">รายชื่อทีมสมัครเข้าร่วมการแข่งขัน</h3>

        <div class="table-wrapper">
            <table class="table table-striped table-hover score-table">
                <div class="table-header">
                    <h4 class="mb-0">ตารางรายชื่อทีม</h4>
                </div>

                <thead>
                    <tr>
                        <th>ลำดับที่</th>
                        <th>ชื่อทีม</th>
                        <th>สาขา</th>
                        <th>ประเภท</th>
                        <th>วันที่สมัคร</th>
                        <th>เวลาที่สมัคร</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($teams as $team)
                        <tr>
                            <td>>{{ $team->id }}</td>
                            <td>{{ $team->team_name }}</td>
                            <td>{{ $team->department }}</td>
                            <td>{{ $team->type }}</td>
                            <td>{{ $team->created_at->format('d-m-Y') }}</td> <!-- เพิ่มแสดงวันที่และเวลาที่สมัคร -->
                            <td>{{ $team->created_at->format('H:i:s') }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
</script>
</body>

</html>
