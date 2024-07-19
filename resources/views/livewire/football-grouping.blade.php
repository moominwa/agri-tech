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
                        <!-- ตัวอย่างรายชื่อทีม -->
                        <tr id="row1">
                            <td class="text-center">1</td>
                            <td>ทีม A</td>
                            <td class="group-cell text-center">
                                <span class="text-content">A</span>
                                <select class="form-select" name="group[1]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row1')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row1')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row2">
                            <td class="text-center">2</td>
                            <td>ทีม B</td>
                            <td class="group-cell text-center">
                                <span class="text-content">B</span>
                                <select class="form-select" name="group[2]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row2')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row2')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row3">
                            <td class="text-center">3</td>
                            <td>ทีม C</td>
                            <td class="group-cell text-center">
                                <span class="text-content">C</span>
                                <select class="form-select" name="group[3]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row3')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row3')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row4">
                            <td class="text-center">4</td>
                            <td>ทีม D</td>
                            <td class="group-cell text-center">
                                <span class="text-content">D</span>
                                <select class="form-select" name="group[4]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row4')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row4')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row5">
                            <td class="text-center">5</td>
                            <td>ทีม E</td>
                            <td class="group-cell text-center">
                                <span class="text-content">E</span>
                                <select class="form-select" name="group[5]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row5')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row5')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row6">
                            <td class="text-center">6</td>
                            <td>ทีม F</td>
                            <td class="group-cell text-center">
                                <span class="text-content">F</span>
                                <select class="form-select" name="group[6]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row6')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row6')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row7">
                            <td class="text-center">7</td>
                            <td>ทีม G</td>
                            <td class="group-cell text-center">
                                <span class="text-content">G</span>
                                <select class="form-select" name="group[7]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row7')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row7')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row8">
                            <td class="text-center">8</td>
                            <td>ทีม H</td>
                            <td class="group-cell text-center">
                                <span class="text-content">H</span>
                                <select class="form-select" name="group[8]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row8')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row8')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row9">
                            <td class="text-center">9</td>
                            <td>ทีม I</td>
                            <td class="group-cell text-center">
                                <span class="text-content">I</span>
                                <select class="form-select" name="group[9]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row9')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row9')">บันทึก</button>
                            </td>
                        </tr>
                        <tr id="row10">
                            <td class="text-center">10</td>
                            <td>ทีม J</td>
                            <td class="group-cell text-center">
                                <span class="text-content">J</span>
                                <select class="form-select" name="group[10]">
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                    <option value="D">D</option>
                                    <option value="E">E</option>
                                    <option value="F">F</option>
                                    <option value="G">G</option>
                                    <option value="H">H</option>
                                </select>
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning" onclick="toggleEditMode('row10')">แก้ไข</button>
                                <button type="button" class="btn btn-success" onclick="saveGroup('row10')">บันทึก</button>
                            </td>
                        </tr>
                        <!-- สามารถเพิ่มแถวสำหรับทีมเพิ่มเติมได้ตามต้องการ -->
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
