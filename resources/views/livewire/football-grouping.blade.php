<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการแบ่งกลุ่มฟุตบอล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .container {
            padding: 20px;
            border-radius: 8px;
            background-color: #fff;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .table th,
        .table td {
            vertical-align: middle;
        }

        .form-select,
        .form-control {
            display: none;
        }

        .edit-mode .form-select,
        .edit-mode .form-control {
            display: block;
        }

        .edit-mode .text-content {
            display: none;
        }

        .btn-success,
        .btn-warning {
            margin-top: 5px;
        }
    </style>
    <script>
        function toggleEditMode(rowId) {
            const row = document.getElementById(rowId);
            row.classList.toggle('edit-mode');
        }

        function saveGroup(rowId) {
            const row = document.getElementById(rowId);
            const select = row.querySelector('select');
            const groupCell = row.querySelector('.group-cell .text-content');
            groupCell.textContent = select.value;
            row.classList.remove('edit-mode');
        }
    </script>
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">จัดการแบ่งกลุ่มฟุตบอล</h1>
        <form method="POST" action="update_teams_group.php">
            <div class="table-responsive">
                <table class="table table-bordered table-hover">
                    <thead class="thead-light">
                        <tr class="text-center">
                            <th scope="col">ลำดับ</th>
                            <th scope="col">ชื่อทีม</th>
                            <th scope="col">กลุ่ม</th>
                            <th scope="col">การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- วนลูปแสดงรายชื่อทีม -->
                        @foreach ($teams as $index => $team)
                        <tr id="row{{ $team->id }}">
                            <td class="text-center">{{ $index + 1 }}</td> <!-- ลำดับจากตัวแปร $index -->
                            <td>ทีม {{ $team->team_name }}</td>
                            <td class="group-cell text-center">
                                <span class="text-content">{{ $team->group }}</span>
                                <select class="form-select" name="group[{{ $team->id }}]">
                                    <option value="A" {{ $team->group == 'A' ? 'selected' : '' }}>A</option>
                                    <option value="B" {{ $team->group == 'B' ? 'selected' : '' }}>B</option>
                                    <option value="C" {{ $team->group == 'C' ? 'selected' : '' }}>C</option>
                                    <option value="D" {{ $team->group == 'D' ? 'selected' : '' }}>D</option>
                                    <option value="E" {{ $team->group == 'E' ? 'selected' : '' }}>E</option>
                                    <option value="F" {{ $team->group == 'F' ? 'selected' : '' }}>F</option>
                                    <option value="G" {{ $team->group == 'G' ? 'selected' : '' }}>G</option>
                                    <option value="H" {{ $team->group == 'H' ? 'selected' : '' }}>H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row{{ $team->id }}')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row{{ $team->id }}')">บันทึก</button>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <button type="submit" class="btn btn-primary">บันทึกการแบ่งกลุ่ม</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
