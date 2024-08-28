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
            background-color: #f8f9fa;

        }

        .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 15px rgba(0, 0, 0, 0.1);
        }

        .add-btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-btn-group .btn {
            margin-top: 10px;
        }

        .form-control-custom {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="text-center py-2">ใบสมัครเข้าร่วมการแข่งขัน</h3>
        <h3 class="text-center py-2">ฟุตบอลคณะเกษตรศาสตร์และเทคโนโลยีต้านภัยยาเสพติด</h3>
        <h3 class="text-center py-2">ครั้งที่ 17 “17th Agri-Tech CUP Anti Drugs”</h3>

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data" id="teamForm">
            @csrf
            <div class="table-responsive">
                <div class="row">
                    <div class="col-md-4 form-control-custom">
                        <label for="team-name">ชื่อทีม</label>
                        <input type="text" class="form-control" id="team-name" name="team_name" placeholder="กรุณากรอกชื่อทีม">
                        @error('team_name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                        @error('department')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-4 form-control-custom">
                        <label for="type">ประเภท</label>
                        <select id="type" name="type" class="form-control">
                            <option value="" disabled selected>เลือกประเภท</option>
                            <option value="ชาย">ชาย</option>
                            <option value="หญิง">หญิง</option>
                        </select>
                        @error('type')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
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
                            </td>
                            <td><input type="text" name="players[0][name]" class="form-control" placeholder="ชื่อ"></td>
                            <td><input type="text" name="players[0][lastname]" class="form-control" placeholder="นามสกุล"></td>
                            <td><input type="text" name="players[0][student_code]" class="form-control" maxlength="13" oninput="formatStudentCode(0)" placeholder="กรุณากรอกรหัสนักศึกษา" id="student_code_0"></td>
                            <td><input type="text" name="players[0][jersey_number]" class="form-control" placeholder="เบอร์เสื้อ"></td>
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
                <button type="button" class="btn btn-primary add-row-btn">เพิ่มแถว</button>
                <button type="submit" class="btn btn-success">บันทึก</button>
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
        }

        // ฟังก์ชันสำหรับจัดรูปแบบรหัสนักศึกษา
        function formatStudentCode(index) {
            const studentCodeInput = document.getElementById('student_code_' + index);
            let studentCodeValue = studentCodeInput.value.replace(/-/g, ''); // ลบ "-" ที่มีอยู่ก่อนหน้าออก
            if (studentCodeValue.length > 11) {
                studentCodeValue = studentCodeValue.slice(0, 11) + '-' + studentCodeValue.slice(11);
            }
            studentCodeInput.value = studentCodeValue;
        }

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
                    </td>
                    <td><input type="text" name="players[${index}][name]" class="form-control" placeholder="ชื่อ"></td>
                    <td><input type="text" name="players[${index}][lastname]" class="form-control" placeholder="นามสกุล"></td>
                    <td><input type="text" name="players[${index}][student_code]" class="form-control" maxlength="13" oninput="formatStudentCode(${index})" placeholder="กรุณากรอกรหัสนักศึกษา" id="student_code_${index}"></td>
                    <td><input type="text" name="players[${index}][jersey_number]" class="form-control" placeholder="เบอร์เสื้อ"></td>
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
