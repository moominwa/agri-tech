<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>จัดการตารางแข่งขัน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
        rel="stylesheet"integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
        crossorigin="anonymous">
    <style>
        /* Custom CSS */
        .add-btn-group {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .add-btn-group .btn {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <h3 class="text text-center py-2">ใบสมัครเข้าร่วมการแข่งขัน </h3>
        <h3 class="text text-center py-2"> ฟุตบอลคณะเกษตรศาสตร์และเทคโนโลยีต้านภัยยาเสพติด </h3>
        <h3 class="text text-center py-2">ครั้งที่ 17 “17th Agri-Tech CUP Anti Drugs” </h3>

        <form action="{{ route('teams.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="table-responsive">
                <div class="row">
                    <div class="col-xs-12 col-md-3">
                        <div class="form-group">
                            <label for="team-name">ชื่อทีม</label>
                            <input type="text" class="form-control" id="team-name" name="team_name"
                                placeholder="team">
                            @error('team_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-5">
                        <div class="form-group">
                            <label for="department">สังกัดสาขา</label>
                            <select id="department" name="department" class="form-control">
                                <option value="" disabled selected>เลือกสาขา</option>
                                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                <option value="สัตวศาสตร์">สัตวศาสตร์</option>
                                <!-- Add more options as needed -->
                            </select>
                            @error('department')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-xs-12 col-md-4">
                        <div class="form-group">
                            <label for="type">ประเภท</label>
                            <select id="type" name="type" class="form-control">
                                <option value="" disabled selected>เลือกประเภท</option>
                                <option value="ชาย">ชาย</option>
                                <option value="หญิง">หญิง</option>
                                <!-- Add more options as needed -->
                            </select>
                            @error('type')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>คำนำหน้า</th>
                            <th>ชื่อ-นามสกุล</th>
                            <th>รหัสนักศึกษา</th>
                            <th>เบอร์เสื้อ</th>
                            <th>รูปภาพผู้เล่น</th>
                            <th>หลักฐานยืนยันการเป็นนักศึกษา</th>
                            <th>การดำเนินการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">1</td>
                            <td>
                                <select id="prefix" name="players[0][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td><input type="text" name="players[0][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[0][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[0][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[0][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[0][student_proof]" class="form-control-file"></td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        {{-- <tr>
                            <td class="text-center">2</td>
                            <td>
                                <select id="prefix" name="players[1][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                             <td><input type="text" name="players[1][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[1][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[1][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[1][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[1][student_proof]" class="form-control-file">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">3</td>
                            <td>
                                <select id="prefix" name="players[3][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td><input type="text" name="players[3][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[3][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[3][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[3][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[3][student_proof]" class="form-control-file">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">4</td>
                            <td>
                                <select id="prefix" name="players[4][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td><input type="text" name="players[4][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[4][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[4][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[4][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[4][student_proof]" class="form-control-file">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">5</td>
                            <td>
                                <select id="prefix" name="players[5][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td><input type="text" name="players[5][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[5][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[5][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[5][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[5][student_proof]" class="form-control-file">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">6</td>
                            <td>
                                <select id="prefix" name="players[6][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td><input type="text" name="players[6][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[6][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[6][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[6][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[6][student_proof]" class="form-control-file">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-center">7</td>
                            <td>
                                <select id="prefix" name="players[7][prefix]" class="form-control">
                                    <option value="" disabled selected>คำนำหน้า</option>
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <!-- Add more options as needed -->
                                </select>
                            </td>
                            <td><input type="text" name="players[7][name]" class="form-control"
                                    placeholder="ชื่อ-นามสกุล"></td>
                            <td><input type="text" name="players[7][student_code]" class="form-control"
                                    placeholder="รหัสนักศึกษา"></td>
                            <td><input type="text" name="players[7][jersey_number]" class="form-control"
                                    placeholder="เบอร์เสื้อ"></td>
                            <td><input type="file" name="players[7][player_image]" class="form-control-file"></td>
                            <td><input type="file" name="players[7][student_proof]" class="form-control-file">
                            </td>
                            <td class="text-center">
                                <button type="button" class="btn btn-warning edit-btn">แก้ไข</button>
                                <button type="button" class="btn btn-danger delete-btn">ลบ</button>
                                <button type="button" class="btn btn-primary save-btn"
                                    style="display: none;">บันทึก</button>
                            </td>
                        </tr> --}}
                        <!-- Add more rows as needed -->
                    </tbody>
                </table>
            </div>
            <div class="text-center mt-4">
                <button type="button" class="btn btn-success add-row-btn">เพิ่มแถว</button>
                <button type="submit" class="btn btn-primary" onclick="submitForm()">บันทึกตารางแข่งขัน</button>
                <a href="/" class="btn btn-secondary">กลับหน้าหลัก</a>
            </div>
        </form>
    </div>

    <script>
       document.querySelector('form').addEventListener('submit', function(event) {
    event.preventDefault(); // หยุดการส่งฟอร์มแบบปกติ

    // ตรวจสอบว่ามีการกรอกข้อมูลครบถ้วนหรือไม่
    let errors = false;
    document.querySelectorAll('.form-control').forEach(function(input) {
        if (!input.value.trim()) {
            errors = true;
        }
    });

    if (errors) {
        alert('กรุณากรอกข้อมูลให้ครบทุกช่อง');
    } else {
        // แสดง confirm dialog เมื่อกดปุ่ม "บันทึกตารางแข่งขัน"
        let confirmed = confirm('คุณต้องการบันทึกตารางแข่งขันใช่หรือไม่?');
        if (confirmed) {
            // ถ้าต้องการบันทึก ให้ส่งฟอร์มไปยัง URL ที่กำหนดใน action attribute ของ <form> tag
            let form = event.target;
            fetch(form.action, {
                method: form.method,
                body: new FormData(form)
            })
            .then(response => {
                if (response.ok) {
                    // บันทึกเรียบร้อยแล้ว ทำการ redirect ไปยัง URL ที่ต้องการ
                    alert('บันทึกข้อมูลเรียบร้อยแล้ว');
                    window.location.href = '/'; // เปลี่ยนเส้นทางไปยังหน้าหลักหรือ URL ที่ต้องการ
                } else {
                    // กรณีเกิดข้อผิดพลาดในการบันทึก
                    alert('เกิดข้อผิดพลาดในการบันทึก');
                }
            })
            .catch(error => {
                console.error('เกิดข้อผิดพลาดในการส่งคำขอ:', error);
            });
        } else {
            // ถ้าไม่ต้องการบันทึก ไม่ต้องทำอะไร
            return;
        }
    }
});

        // Script to dynamically add new rows to the table
        document.querySelector('.add-row-btn').addEventListener('click', function() {
            let tbody = document.querySelector('tbody');
            let index = tbody.querySelectorAll('tr').length;
            let newRow = `
                <tr>
                    <td class="text-center">${index + 1}</td>
                    <td>
                        <select name="players[${index}][prefix]" class="form-control">
                            <option value="" disabled selected>คำนำหน้า</option>
                            <option value="นาย">นาย</option>
                            <option value="นาง">นาง</option>
                            <option value="นางสาว">นางสาว</option>
                            <!-- Add more options as needed -->
                        </select>
                    </td>
                    <td><input type="text" name="players[${index}][name]" class="form-control" placeholder="ชื่อ-นามสกุล"></td>
                    <td><input type="text" name="players[${index}][student_code]" class="form-control" placeholder="รหัสนักศึกษา"></td>
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
</body>

</html>
