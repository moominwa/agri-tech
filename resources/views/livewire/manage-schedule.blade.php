<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการตารางแข่งขัน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <h1 class="text-center">จัดการตารางแข่งขัน</h1>
        <form id="scheduleForm" method="POST" action="save_schedule.php">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ทีมเจ้าบ้าน</th>
                            <th>ทีมเยือน</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>สนาม</th>
                            <th>ประเภทการแข่งขัน</th>
                            <th>รอบ</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- แถวตัวอย่าง -->
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <select class="form-control" name="home_team[1]" disabled>
                                    <option value="ทีม 1">ทีม 1</option>
                                    <option value="ทีม 2">ทีม 2</option>
                                    <option value="ทีม 3">ทีม 3</option>
                                    <option value="ทีม 4">ทีม 4</option>
                                    <!-- เพิ่มทีมตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="away_team[1]" disabled>
                                    <option value="ทีม 1">ทีม 1</option>
                                    <option value="ทีม 2">ทีม 2</option>
                                    <option value="ทีม 3">ทีม 3</option>
                                    <option value="ทีม 4">ทีม 4</option>
                                    <!-- เพิ่มทีมตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <input type="date" class="form-control" name="date[1]" value="2024-06-07" disabled>
                            </td>
                            <td>
                                <input type="time" class="form-control" name="time[1]" value="10:00" disabled>
                            </td>
                            <td>
                                <select class="form-control" name="venue[1]" disabled>
                                    <option value="สนาม 1">สนาม 1</option>
                                    <option value="สนาม 2">สนาม 2</option>
                                    <!-- เพิ่มสนามตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="competition_type[1]" disabled>
                                    <option value="ชาย">ชาย</option>
                                    <option value="หญิง">หญิง</option>
                                    <!-- เพิ่มประเภทการแข่งขันตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <select class="form-control" name="round[]" disabled>
                                    <option value="แบ่งกลุ่ม">แบ่งกลุ่ม</option>
                                    <option value="รอบ 16 ทีม">รอบ 16 ทีม</option>
                                    <option value="รอบก่อนรองชนะเลิศ">รอบก่อนรองชนะเลิศ</option>
                                    <option value="รอบรองชนะเลิศ">รอบรองชนะเลิศ</option>
                                    <option value="รอบชิงอันดับ 3">รอบชิงอันดับ 3</option>
                                    <option value="รอบชิงชนะเลิศ">รอบชิงชนะเลิศ</option>
                                </select>
                            </td>


                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        <!-- เพิ่มแถวตารางแข่งขันตามต้องการ -->
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn btn-success add-row-btn">เพิ่มแถว</button>
                <button type="submit" class="btn btn-primary">บันทึกตารางแข่งขัน</button>
            </div>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const editButtons = document.querySelectorAll('.edit-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const saveButtons = document.querySelectorAll('.save-btn');
            const addRowButton = document.querySelector('.add-row-btn');

            // Function to handle edit button click
            editButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const row = button.closest('tr');
                    const selectElements = row.querySelectorAll(
                        'select, input[type="date"], input[type="time"]');
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
                        'select, input[type="date"], input[type="time"]');
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
                    row.remove();
                    updateRowNumbers(); // Update row numbers after deletion
                });
            });

            // Function to handle add row button click
            addRowButton.addEventListener('click', () => {
                const tableBody = document.querySelector('tbody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                    <td class="text-center">${tableBody.rows.length + 1}</td>
                    <td>
                        <select class="form-control" name="home_team[]" disabled>
                            <option value="ทีม 1">ทีม 1</option>

                            <option value="ทีม 2">ทีม 2</option>
                            <option value="ทีม 3">ทีม 3</option>
                            <option value="ทีม 4">ทีม 4</option>
                            <!-- เพิ่มทีมตามต้องการ -->
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="away_team[]" disabled>
                            <option value="ทีม 1">ทีม 1</option>
                            <option value="ทีม 2">ทีม 2</option>
                            <option value="ทีม 3">ทีม 3</option>
                            <option value="ทีม 4">ทีม 4</option>
                            <!-- เพิ่มทีมตามต้องการ -->
                        </select>
                    </td>
                    <td>
                        <input type="date" class="form-control" name="date[]" value="2024-06-07" disabled>
                    </td>
                    <td>
                        <input type="time" class="form-control" name="time[]" value="10:00" disabled>
                    </td>
                    <td>
                        <select class="form-control" name="venue[]" disabled>
                            <option value="สนาม 1">สนาม 1</option>
                            <option value="สนาม 2">สนาม 2</option>
                            <!-- เพิ่มสนามตามต้องการ -->
                        </select>
                    </td>
                    <td>
                        <select class="form-control" name="competition_type[]" disabled>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                            <!-- เพิ่มประเภทการแข่งขันตามต้องการ -->
                        </select>
                    </td>
                    <td>
    <select class="form-control" name="round[]" disabled>
        <option value="แบ่งกลุ่ม">แบ่งกลุ่ม</option>
        <option value="รอบ 16 ทีม">รอบ 16 ทีม</option>
        <option value="รอบก่อนรองชนะเลิศ">รอบก่อนรองชนะเลิศ</option>
        <option value="รอบรองชนะเลิศ">รอบรองชนะเลิศ</option>
        <option value="รอบชิงอันดับ 3">รอบชิงอันดับ 3</option>
        <option value="รอบชิงชนะเลิศ">รอบชิงชนะเลิศ</option>
    </select>
</td>

                    <td class="text-center">
                        <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                        <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                        <button type="button" class="btn btn-primary save-btn"
                            style="display: none;">บันทึก</button>
                    </td>
                `;
                tableBody.appendChild(newRow);

                const editButton = newRow.querySelector('.edit-btn');
                const deleteButton = newRow.querySelector('.delete-btn');
                const saveButton = newRow.querySelector('.save-btn');

                // Function to handle edit button click for new row
                editButton.addEventListener('click', () => {
                    const selectElements = newRow.querySelectorAll(
                        'select, input[type="date"], input[type="time"]');
                    selectElements.forEach((select) => {
                        select.removeAttribute('disabled');
                    });
                    editButton.style.display = 'none';
                    newRow.querySelector('.save-btn').style.display = 'inline-block';
                });

                // Function to handle save button click for new row
                saveButton.addEventListener('click', () => {
                    const selectElements = newRow.querySelectorAll(
                        'select, input[type="date"], input[type="time"]');
                    selectElements.forEach((select) => {
                        select.setAttribute('disabled', 'disabled');
                    });
                    saveButton.style.display = 'none';
                    newRow.querySelector('.edit-btn').style.display = 'inline-block';
                });

                // Function to handle delete button click for new row
                deleteButton.addEventListener('click', () => {
                    newRow.remove();
                    updateRowNumbers(); // Update row numbers after deletion
                });
            });

            // Function to update row numbers
            function updateRowNumbers() {
                const rows = document.querySelectorAll('tbody tr');
                rows.forEach((row, index) => {
                    const rowNumCell = row.querySelector('td:first-child');
                    rowNumCell.textContent = index + 1;
                });
            }
        });
    </script>
</body>

</html>
