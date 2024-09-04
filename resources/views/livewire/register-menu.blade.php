<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการตารางแข่งขัน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        /* Custom CSS */
        body {
            background-color: #f0f2f5;
        }

        .container {
            background-color: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        }

        .form-control-custom {
            margin-top: 10px;
        }

        .text-danger {
            color: #dc3545;
            font-size: 0.875rem;
            margin-top: 5px;
            display: block;
        }

        h3 {
            color: #2c3e50;
        }

        .table th, .table td {
            vertical-align: middle;
            text-align: center;
        }

        .table thead th {
            background-color: #f7f7f7;
            color: #333;
        }

        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
        }

        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }

        .btn-danger {
            background-color: #dc3545;
            border-color: #dc3545;
        }

        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }

        .btn-secondary {
            background-color: #6c757d;
            border-color: #6c757d;
        }

        .btn-secondary:hover {
            background-color: #5a6268;
            border-color: #545b62;
        }

        .table-responsive {
            margin-top: 20px;
        }

        .add-row-btn {
            margin-bottom: 20px;
        }

        .delete-btn {
            margin-left: 5px;
        }

        .edit-btn {
            margin-right: 5px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center py-3">ใบสมัครเข้าร่วมการแข่งขัน</h3>
        <h3 class="text-center py-3">ฟุตบอลคณะเกษตรศาสตร์และเทคโนโลยีต้านภัยยาเสพติด</h3>
        <h3 class="text-center py-3">ครั้งที่ 17 “17th Agri-Tech CUP Anti Drugs”</h3>

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data" id="teamForm">
            @csrf
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4 form-control-custom">
                        <label for="team-name">ชื่อทีม</label>
                        <input type="text" class="form-control" id="team-name" name="team_name" placeholder="กรุณากรอกชื่อทีม">
                        <span class="text-danger" id="team-name-error"></span>
                    </div>
                    <div class="col-md-4 form-control-custom">
                        <label for="department">สังกัดสาขา</label>
                        <select id="department" name="department" class="form-control">
                            <option value="" disabled selected>เลือกสาขา</option>
                            <option value="ประมง">ประมง</option>
                            <option value="สัตวศาสตร์">สัตวศาสตร์</option>
                            <option value="พืชศาสตร์ สิ่งทอและการออกแบบ">พืชศาสตร์ สิ่งทอและการออกแบบ</option>
                            <option value="เครื่องจักรกลเกษตร">เครื่องจักรกลเกษตร</option>
                            <option value="อุตสาหกรรมเกษตร">อุตสาหกรรมเกษตร</option>
                            <option value="วิศวกรรมเครื่องกล">วิศวกรรมเครื่องกล</option>
                            <option value="เทคโนโลยีไฟฟ้า">เทคโนโลยีไฟฟ้า</option>
                            <option value="เทคโนโลยีคอมพิวเตอร์">เทคโนโลยีคอมพิวเตอร์</option>
                            <option value="วิทยาศาสตร์และคณิตศาสตร์">วิทยาศาสตร์และคณิตศาสตร์</option>
                        </select>
                        <span class="text-danger" id="department-error"></span>
                    </div>
                    <div class="col-md-4 form-control-custom">
                        <label for="type">ประเภท</label>
                        <select id="type" name="type" class="form-control">
                            <option value="" disabled selected>เลือกประเภท</option>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                        </select>
                        <span class="text-danger" id="type-error"></span>
                    </div>
                </div>

                <table class="table table-bordered mt-4">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อ</th>
                            <th>นามสกุล</th>
                            <th>รหัสนักศึกษา</th>
                            <th>เบอร์เสื้อ</th>
                            <th>รูปภาพผู้เล่น</th>
                            <th>หลักฐานยืนยันการเป็นนักศึกษา</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody id="playerTable">
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <select name="players[0][prefix]" class="form-control prefix-select" onchange="checkPrefix(this, 0)">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                                <input type="text" name="players[0][custom_prefix]" class="form-control mt-2 d-none"
                                    placeholder="กรุณาระบุคำนำหน้า" id="custom_prefix_0">
                                <span class="text-danger"></span>
                            </td>
                            <td><input type="text" name="players[0][name]" class="form-control" placeholder="ชื่อ"><span class="text-danger"></span></td>
                            <td><input type="text" name="players[0][lastname]" class="form-control" placeholder="นามสกุล"><span class="text-danger"></span></td>
                            <td><input type="text" name="players[0][student_code]" class="form-control" maxlength="13" oninput="formatStudentCode(0)" placeholder="กรุณากรอกรหัสนักศึกษา" id="student_code_0"><span class="text-danger"></span></td>
                            <td><input type="text" name="players[0][jersey_number]" class="form-control" oninput="validateJerseyNumber(0)" placeholder="เบอร์เสื้อ"><span class="text-danger"></span></td>
                            <td><input type="file" name="players[0][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[0][student_proof]" class="form-control-file"></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn" style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-4">
                <button type="button" class="btn btn-primary add-row-btn">เพิ่มผู้เล่น</button>
                <button type="submit" class="btn btn-danger">ส่ง</button>
                <a href="/" class="btn btn-secondary">กลับหน้าหลัก</a>
            </div>
        </form>
    </div>

    <script>
        // ตรวจสอบคำนำหน้า ถ้าเลือก "อื่นๆ" จะสามารถกรอกคำนำหน้าเองได้
        function checkPrefix(selectElement, index) {
            const customPrefixInput = document.getElementById('custom_prefix_' + index);
            if (selectElement.value === 'อื่นๆ') {
                customPrefixInput.classList.remove('d-none');
                customPrefixInput.required = true;
            } else {
                customPrefixInput.classList.add('d-none');
                customPrefixInput.required = false;
            }

            // ลบข้อความแจ้งเตือนเมื่อเลือกคำนำหน้าแล้ว
            const prefixError = selectElement.parentElement.querySelector('span.text-danger');
            if (selectElement.value !== '') {
                prefixError.textContent = '';
            }
        }

        // ฟังก์ชันสำหรับจัดรูปแบบรหัสนักศึกษา
        function formatStudentCode(index) {
            const studentCodeInput = document.getElementById('student_code_' + index);
            let studentCodeValue = studentCodeInput.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลขออก

            // เพิ่มเครื่องหมาย "-" หลังจากกรอก 11 ตัว
            if (studentCodeValue.length > 11) {
                studentCodeValue = studentCodeValue.slice(0, 11) + '-' + studentCodeValue.slice(11, 12);
            }

            // จำกัดความยาวให้ไม่เกิน 13 ตัว (รวม "-" ด้วย)
            studentCodeInput.value = studentCodeValue.slice(0, 13);

            // ลบข้อความแจ้งเตือนถ้ากรอกรหัสนักศึกษาอย่างถูกต้อง
            const errorSpan = studentCodeInput.nextElementSibling;
            if (studentCodeInput.value.length === 13 && studentCodeInput.value.indexOf('-') === 11) {
                errorSpan.textContent = '';
            }
        }

        // ฟังก์ชันสำหรับตรวจสอบหมายเลขเสื้อ
        function validateJerseyNumber(index) {
            const jerseyInput = document.querySelector(`input[name="players[${index}][jersey_number]"]`);
            jerseyInput.value = jerseyInput.value.replace(/[^0-9]/g, ''); // ลบอักขระที่ไม่ใช่ตัวเลขออก

            // จำกัดความยาวของหมายเลขเสื้อไม่เกิน 3 ตัว
            jerseyInput.value = jerseyInput.value.slice(0, 3);

            // ลบข้อความแจ้งเตือนเมื่อกรอกหมายเลขเสื้อ
            const errorSpan = jerseyInput.nextElementSibling;
            if (jerseyInput.value.trim() !== '') {
                errorSpan.textContent = '';
            }
        }

        // ตรวจสอบข้อมูลแบบเรียลไทม์
        document.getElementById('team-name').addEventListener('input', function() {
            const errorSpan = document.getElementById('team-name-error');
            if (this.value.trim() !== '') {
                errorSpan.textContent = '';
            }
        });

        document.getElementById('department').addEventListener('change', function() {
            const errorSpan = document.getElementById('department-error');
            if (this.value !== '') {
                errorSpan.textContent = '';
            }
        });

        document.getElementById('type').addEventListener('change', function() {
            const errorSpan = document.getElementById('type-error');
            if (this.value !== '') {
                errorSpan.textContent = '';
            }
        });

        // ตรวจสอบข้อมูลผู้เล่นแบบเรียลไทม์
        document.querySelectorAll('input[name^="players["][name]').forEach(input => {
            input.addEventListener('input', function() {
                const errorSpan = this.nextElementSibling;
                if (this.value.trim() !== '') {
                    errorSpan.textContent = ''; // ลบข้อความแจ้งเตือนถ้ามีการกรอกข้อมูล
                }
            });
        });

        document.querySelectorAll('input[name^="players["][lastname]').forEach(input => {
            input.addEventListener('input', function() {
                const errorSpan = this.nextElementSibling;
                if (this.value.trim() !== '') {
                    errorSpan.textContent = ''; // ลบข้อความแจ้งเตือนถ้ามีการกรอกข้อมูล
                }
            });
        });

        // ตรวจสอบความถูกต้องของข้อมูลก่อนส่ง
        function validateForm() {
            let isValid = true;

            // ตรวจสอบข้อมูลทีม
            const teamName = document.getElementById('team-name');
            const department = document.getElementById('department');
            const type = document.getElementById('type');

            if (teamName.value.trim() === '') {
                document.getElementById('team-name-error').textContent = 'กรุณากรอกชื่อทีม';
                isValid = false;
            }

            if (department.value === '') {
                document.getElementById('department-error').textContent = 'กรุณาเลือกสาขา';
                isValid = false;
            }

            if (type.value === '') {
                document.getElementById('type-error').textContent = 'กรุณาเลือกประเภท';
                isValid = false;
            }

            // ตรวจสอบข้อมูลผู้เล่น
            const players = document.querySelectorAll('#playerTable tr');
            players.forEach((row, index) => {
                const prefixSelect = row.querySelector(`select[name="players[${index}][prefix]"]`);
                const customPrefixInput = row.querySelector(`input[name="players[${index}][custom_prefix]"]`);
                const nameInput = row.querySelector(`input[name="players[${index}][name]"]`);
                const lastnameInput = row.querySelector(`input[name="players[${index}][lastname]"]`);
                const studentCodeInput = row.querySelector(`input[name="players[${index}][student_code]"]`);
                const jerseyNumberInput = row.querySelector(`input[name="players[${index}][jersey_number]"]`);

                const prefixError = row.querySelector('td:nth-child(2) span.text-danger');
                const nameError = nameInput.nextElementSibling;
                const lastnameError = lastnameInput.nextElementSibling;
                const studentCodeError = studentCodeInput.nextElementSibling;
                const jerseyNumberError = jerseyNumberInput.nextElementSibling;

                if (prefixSelect.value === '' || (prefixSelect.value === 'อื่นๆ' && customPrefixInput.value.trim() === '')) {
                    prefixError.textContent = 'กรุณาเลือกหรือระบุคำนำหน้า';
                    isValid = false;
                }

                if (nameInput.value.trim() === '') {
                    nameError.textContent = 'กรุณากรอกชื่อ';
                    isValid = false;
                } else {
                    nameError.textContent = '';
                }

                if (lastnameInput.value.trim() === '') {
                    lastnameError.textContent = 'กรุณากรอกนามสกุล';
                    isValid = false;
                } else {
                    lastnameError.textContent = '';
                }

                if (studentCodeInput.value.length !== 13 || studentCodeInput.value.indexOf('-') !== 11) {
                    studentCodeError.textContent = 'กรุณากรอกรหัสนักศึกษาให้ครบถ้วน';
                    isValid = false;
                } else {
                    studentCodeError.textContent = '';
                }

                if (jerseyNumberInput.value.trim() === '') {
                    jerseyNumberError.textContent = 'กรุณากรอกหมายเลขเสื้อ';
                    isValid = false;
                } else {
                    jerseyNumberError.textContent = '';
                }
            });

            if (isValid) {
                alert('ส่งข้อมูลสำเร็จ');
            }

            return isValid;
        }

        // ผูกฟังก์ชัน validateForm กับการส่งฟอร์ม
        document.getElementById('teamForm').addEventListener('submit', function (event) {
            if (!validateForm()) {
                event.preventDefault(); // ป้องกันการส่งฟอร์มถ้าข้อมูลไม่ถูกต้อง
            }
        });

        // เพิ่มแถวใหม่ในตาราง
        document.querySelector('.add-row-btn').addEventListener('click', function () {
            let tbody = document.querySelector('#playerTable');
            let index = tbody.querySelectorAll('tr').length;
            let newRow = `
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td>
                        <select name="players[${index}][prefix]" class="form-control prefix-select" onchange="checkPrefix(this, ${index})">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <option value="อื่นๆ">อื่นๆ</option>
                        </select>
                        <input type="text" name="players[${index}][custom_prefix]" class="form-control mt-2 d-none" placeholder="กรุณาระบุคำนำหน้า" id="custom_prefix_${index}">
                        <span class="text-danger"></span>
                    </td>
                    <td><input type="text" name="players[${index}][name]" class="form-control" placeholder="ชื่อ"><span class="text-danger"></span></td>
                    <td><input type="text" name="players[${index}][lastname]" class="form-control" placeholder="นามสกุล"><span class="text-danger"></span></td>
                    <td><input type="text" name="players[${index}][student_code]" class="form-control" maxlength="13" oninput="formatStudentCode(${index})" placeholder="กรุณากรอกรหัสนักศึกษา" id="student_code_${index}"><span class="text-danger"></span></td>
                    <td><input type="text" name="players[${index}][jersey_number]" class="form-control" oninput="validateJerseyNumber(${index})" placeholder="เบอร์เสื้อ"><span class="text-danger"></span></td>
                    <td><input type="file" name="players[${index}][player_image]" class="form-control-file"></td>
                    <td><input type="file" name="players[${index}][student_proof]" class="form-control-file"></td>
                    <td class="text-center">
                        <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                        <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                        <button type="button" class="btn btn-primary save-btn" style="display: none;">บันทึก</button>
                    </td>
                </tr>
            `;
            tbody.insertAdjacentHTML('beforeend', newRow);
        });
    </script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous">
    </script>
</body>

</html>
