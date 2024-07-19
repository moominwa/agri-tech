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
                            <th>ทีม</th>
                            <th>เสื้อเลข</th>
                            <th>ใบเหลือง</th>
                            <th>ใบแดง</th>
                            <th>ประตู</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody id="matchResultsBody">
                        <!-- แถวตัวอย่าง -->
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <select class="form-control team-select" name="team[1]">
                                    <option value="ทีม A">ทีม A</option>
                                    <option value="ทีม B">ทีม B</option>
                                    <!-- เพิ่มทีมตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <select class="form-control shirt-number-select" name="shirt_number[1]">
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <!-- เพิ่มหมายเลขเสื้อตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control yellow-card" name="yellow_card[1]" value="0">
                            </td>
                            <td>
                                <input type="number" class="form-control red-card" name="red_card[1]" value="0">
                            </td>
                            <td>
                                <input type="number" class="form-control goals" name="goals[1]" value="0">
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
        document.addEventListener
        ("DOMContentLoaded", function () {
            const editButtons = document.querySelectorAll('.edit-btn');
            const deleteButtons = document.querySelectorAll('.delete-btn');
            const saveButtons = document.querySelectorAll('.save-btn');
            const addRowButton = document.querySelector('.add-row-btn');

            // Function to handle edit button click
            editButtons.forEach((button) => {
                button.addEventListener('click', () => {
                    const row = button.closest('tr');
                    const selectElements = row.querySelectorAll(
                        'select, input[type="number"]');
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
                        'select, input[type="number"]');
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
                });
            });

            // Function to handle add row button click
            addRowButton.addEventListener('click', () => {
                const tableBody = document.querySelector('#matchResultsBody');
                const newRow = document.createElement('tr');
                newRow.innerHTML = `
                            <td class="text-center">${tableBody.rows.length + 1}</td>
                            <td>
                                <select class="form-control team-select" name="team[]">
                                    <option value="ทีม A">ทีม A</option>
                                    <option value="ทีม B">ทีม B</option>
                                    <!-- เพิ่มทีมตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <select class="form-control shirt-number-select" name="shirt_number[]">
                                    <option value="10">10</option>
                                    <option value="11">11</option>
                                    <!-- เพิ่มหมายเลขเสื้อตามต้องการ -->
                                </select>
                            </td>
                            <td>
                                <input type="number" class="form-control yellow-card" name="yellow_card[]" value="0">
                            </td>
                            <td>
                                <input type="number" class="form-control red-card" name="red_card[]" value="0">
                            </td>
                            <td>
                                <input type="number" class="form-control goals" name="goals[]" value="0">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn" style="display: none;">บันทึก</button>
                            </td>
                        `;
                tableBody.appendChild(newRow);

                const editButton = newRow.querySelector('.edit-btn');
                const deleteButton = newRow.querySelector('.delete-btn');
                const saveButton = newRow.querySelector('.save-btn');

                // Function to handle edit button click for new row
                editButton.addEventListener('click', () => {
                    const selectElements = newRow.querySelectorAll(
                        'select, input[type="number"]');
                    selectElements.forEach((select) => {
                        select.removeAttribute('disabled');
                    });
                    editButton.style.display = 'none';
                    newRow.querySelector('.save-btn').style.display = 'inline-block';
                });

                // Function to handle save button click for new row
                saveButton.addEventListener('click', () => {
                    const selectElements = newRow.querySelectorAll(
                        'select, input[type="number"]');
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
