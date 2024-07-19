<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการผลการแข่งขันฟุตบอล</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">จัดการผลการแข่งขันฟุตบอล</h1>
        <form id="matchResultForm">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>คู่ที่</th>
                            <th>ทีมเหย้า</th>
                            <th style="width: 80px;">ประตู</th>
                            <th>ผลการแข่งขัน</th>
                            <th style="width: 80px;">ประตู</th>
                            <th>ทีมเยือน</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>รอบ</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody id="matchResultsBody">
                        <!-- แถวตัวอย่าง -->
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <select class="form-control" name="home_team[1]">
                                    <option value="ทีม 1">ทีม 1</option>
                                    <option value="ทีม 2">ทีม 2</option>
                                    <option value="ทีม 3">ทีม 3</option>
                                    <option value="ทีม 4">ทีม 4</option>
                                    <!-- เพิ่มทีมตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="home_goals[1]">
                            </td>
                            <td>
                                <select class="form-control" name="result[1]">
                                    <option value="ชนะ">ชนะ</option>
                                    <option value="แพ้">แพ้</option>
                                    <option value="เสมอ">เสมอ</option>
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control" name="away_goals[1]">
                            </td>
                            <td>
                                <select class="form-control" name="away_team[1]">
                                    <option value="ทีม 1">ทีม 1</option>
                                    <option value="ทีม 2">ทีม 2</option>
                                    <option value="ทีม 3">ทีม 3</option>
                                    <option value="ทีม 4">ทีม 4</option>
                                    <!-- เพิ่มทีมตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="date[1]" value="2024-06-07">
                            </td>
                            <td>
                                <input type="time" class="form-control" name="time[1]" value="10:00">
                            </td>
                            <td>
                                <select class="form-control" name="round[1]">
                                    <option value="แบ่งกลุ่ม">แบ่งกลุ่ม</option>
                                    <option value="รอบ 16 ทีม">รอบ 16 ทีม</option>
                                    <option value="รอบก่อนรองชนะเลิศ">รอบก่อนรองชนะเลิศ</option>
                                    <option value="รอบรองชนะเลิศ">รอบรองชนะเลิศ</option>
                                    <option value="รอบชิงอันดับ 3">รอบชิงอันดับ 3</option>
                                    <option value="รอบชิงชนะเลิศ">รอบชิงชนะเลิศ</option>
                                    <!-- เพิ่มรอบตามต้องการ -->
                                    </select>
                                    </td>
                                    <td class="text-center">
                                    <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                    <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                    <button type="button" class="btn btn-primary save-btn" style="display: none;">บันทึก</button>
                                    </td>
                                    </tr>
                                    <!-- เพิ่มแถวตารางผลการแข่งขันตามต้องการ -->
                                    </tbody>
                                    </table>
                                    </div>
                                    <div class="text-center mt-4">
                                        <button type="button" class="btn btn-success add-row-btn">เพิ่มแถว</button>
                                        <button type="button" class="btn btn-primary" onclick="saveMatchResults()">บันทึกผลการแข่งขัน</button>
                                    </div>
                                </form>
                            </div>

                            <!-- Bootstrap JS -->
                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
                            <script>
                                document.addEventListener("DOMContentLoaded", function () {
                                    const editButtons = document.querySelectorAll('.edit-btn');
                                    const deleteButtons = document.querySelectorAll('.delete-btn');
                                    const saveButtons = document.querySelectorAll('.save-btn');
                                    const addRowButton = document.querySelector('.add-row-btn');

                                    // Function to handle edit button click
                                    editButtons.forEach((button) => {
                                        button.addEventListener('click', () => {
                                            const row = button.closest('tr');
                                            const selectElements = row.querySelectorAll(
                                                'select, input[type="date"], input[type="time"], input[type="number"]');
                                            selectElements.forEach((select) => {
                                                select.removeAttribute('disabled');
                                            });
                                            button.style.display = 'none';
                                            row.querySelector('.save-btn').style.display = 'inline-block';
                                        });
                                    });

                                    // Function to handle save button click
                                    saveButtons.forEach((button) => {
                                        button.addEventListener('click', () => {
                                            const row = button.closest('tr');
                                            const selectElements = row.querySelectorAll(
                                                'select, input[type="date"], input[type="time"], input[type="number"]');
                                            selectElements.forEach((select) => {
                                                select.setAttribute('disabled', 'disabled');
                                            });
                                            button.style.display = 'none';
                                            row.querySelector('.edit-btn').style.display = 'inline-block';
                                        });
                                    });

                                    // Function to handle delete button click
                                    deleteButtons.forEach((button) => {
                                        button.addEventListener('click', () => {
                                            const row = button.closest('tr');
                                            if (confirm("คุณต้องการลบแถวนี้หรือไม่?")) {
                                                row.remove();
                                                updateRowNumbers(); // Update row numbers after deletion
                                            }
                                        });
                                    });

                                    // Function to handle add row button click
                                    addRowButton.addEventListener('click', () => {
                                        const tableBody = document.querySelector('#matchResultsBody');
                                        const newRow = document.createElement('tr');
                                        newRow.innerHTML = `
                                            <td class="text-center">${tableBody.rows.length + 1}</td>
                                            <td>
                                                <select class="form-control" name="home_team[]">
                                                    <option value="ทีม 1">ทีม 1</option>
                                                    <option value="ทีม 2">ทีม 2</option>
                                                    <option value="ทีม 3">ทีม 3</option>
                                                    <option value="ทีม 4">ทีม 4</option>
                                                    <!-- เพิ่มทีมตามต้องการ -->
                                                </select>
                                            </td>
                                            <td>
                                                <input type="number" class="form-control" name="home_goals[]">
                                            </td>
                                            <td>
                                                <select class="form-control" name="result[]">
                                                    <option value="ชนะ">ชนะ</option>
                                                    <option value="แพ้">แพ้</option>
                                                    <option value="เสมอ">เสมอ</option>
                                                </select>
                </td>
                <td>
                    <input type="number" class="form-control" name="away_goals[]">
                </td>
                <td>
                    <select class="form-control" name="away_team[]">
                        <option value="ทีม 1">ทีม 1</option>
                        <option value="ทีม 2">ทีม 2</option>
                        <option value="ทีม 3">ทีม 3</option>
                        <option value="ทีม 4">ทีม 4</option>
                        <!-- เพิ่มทีมตามต้องการ -->
                    </select>
                </td>
                <td>
                    <input type="date" class="form-control" name="date[]" value="2024-06-07">
                </td>
                <td>
                    <input type="time" class="form-control" name="time[]" value="10:00">
                </td>
                <td>
                    <select class="form-control" name="round[]">
                        <option value="แบ่งกลุ่ม">แบ่งกลุ่ม</option>
                        <option value="รอบ 16 ทีม">รอบ 16 ทีม</option>
                        <option value="รอบก่อนรองชนะเลิศ">รอบก่อนรองชนะเลิศ</option>
                        <option value="รอบรองชนะเลิศ">รอบรองชนะเลิศ</option>
                        <option value="รอบชิงอันดับ 3">รอบชิงอันดับ 3</option>
                        <option value="รอบชิงชนะเลิศ">รอบชิงชนะเลิศ</option>
                        <!-- เพิ่มรอบตามต้องการ -->
                    </select>
                </td>
                <td class="text-center">
                    <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                    <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                    <button type="button" class="btn btn-primary save-btn" style="display: none;">บันทึก</button>
                </td>
            </tr>
        `;
                tableBody.appendChild(newRow);

                const editButton = newRow.querySelector('.edit-btn');
                const deleteButton = newRow.querySelector('.delete-btn');
                const saveButton = newRow.querySelector('.save-btn');

                // Function to handle edit button click for new row
                editButton.addEventListener('click', () => {
                    const selectElements = newRow.querySelectorAll(
                        'select, input[type="date"], input[type="time"], input[type="number"]');
                    selectElements.forEach((select) => {
                        select.removeAttribute('disabled');
                    });
                    editButton.style.display = 'none';
                    newRow.querySelector('.save-btn').style.display = 'inline-block';
                });

                // Function to handle save button click for new row
                saveButton.addEventListener('click', () => {
                    const selectElements = newRow.querySelectorAll(
                        'select, input[type="date"], input[type="time"], input[type="number"]');
                    selectElements.forEach((select) => {
                        select.setAttribute('disabled', 'disabled');
                    });
                    saveButton.style.display = 'none';
                    newRow.querySelector('.edit-btn').style.display = 'inline-block';
                });

                // Function to handle delete button click for new row
                deleteButton.addEventListener('click', () => {
                    if (confirm("คุณต้องการลบแถวนี้หรือไม่?")) {
                        newRow.remove();
                        updateRowNumbers(); // Update row numbers after deletion
                    }
                });
            });

            // Function to update row numbers
            function updateRowNumbers() {
                const rows = document.querySelectorAll('#matchResultsBody tr');
                rows.forEach((row, index) => {
                    const rowNumCell = row.querySelector('td:first-child');
                    rowNumCell.textContent = index + 1;
                });
            }
        });
    </script>
</body>

</html>

