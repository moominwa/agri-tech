<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ตรวจสอบข้อมูลทีม</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container my-4">
      <h1 class="mb-4">รายชื่อทีมสมัครเข้าร่วมแข่งขัน</h1>
      <table class="table table-striped">
        <thead>
          <tr>
            <th>ลำดับที่</th>
            <th>วันที่</th>
            <th>เวลา</th>
            <th>ชื่อทีม</th>
            <th>ประเภท</th>
            <th>สาขา</th>
            <th>หัวหน้าทีม</th>
            <th>เบอร์โทร</th>
            <th>ตรวจสอบ</th>
            <th>อนุมัติ</th>
            <th>ไม่อนุมัติ</th>
          </tr>
        </thead>
        <tbody>
          <!-- ลำดับที่ 1 -->
          <tr>
            <td>1</td>
            <td>1 กุมภาพันธ์ 2567</td>
            <td>16:30</td>
            <td>หมาหยอกไก่</td>
            <td>ชาย</td>
            <td>คอมพิวเตอร์</td>
            <td>ต่าย</td>
            <td>0959013482</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 2 -->
          <tr>
            <td>2</td>
            <td>2 กุมภาพันธ์ 2567</td>
            <td>14:20</td>
            <td>สิงห์โตคำราม</td>
            <td>ชาย</td>
            <td>วิทยาศาสตร์</td>
            <td>โต</td>
            <td>0959013483</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 3 -->
          <tr>
            <td>3</td>
            <td>3 กุมภาพันธ์ 2567</td>
            <td>10:15</td>
            <td>นกอินทรี</td>
            <td>ชาย</td>
            <td>วิศวกรรม</td>
            <td>นก</td>
            <td>0959013484</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 4 -->
          <tr>
            <td>4</td>
            <td>4 กุมภาพันธ์ 2567</td>
            <td>09:45</td>
            <td>งูเห่า</td>
            <td>ชาย</td>
            <td>เกษตร</td>
            <td>งู</td>
            <td>0959013485</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 5 -->
          <tr>
            <td>5</td>
            <td>5 กุมภาพันธ์ 2567</td>
            <td>11:30</td>
            <td>เสือดาว</td>
            <td>ชาย</td>
            <td>ศิลปศาสตร์</td>
            <td>เสือ</td>
            <td>0959013486</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 6 -->
          <tr>
            <td>6</td>
            <td>6 กุมภาพันธ์ 2567</td>
            <td>13:50</td>
            <td>จระเข้</td>
            <td>ชาย</td>
            <td>การแพทย์</td>
            <td>เข้</td>
            <td>0959013487</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 7 -->
          <tr>
            <td>7</td>
            <td>7 กุมภาพันธ์ 2567</td>
            <td>15:00</td>
            <td>ช้าง</td>
            <td>ชาย</td>
            <td>ทันตแพทย์</td>
            <td>ช้าง</td>
            <td>0959013488</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 8 -->
          <tr>
            <td>8</td>
            <td>8 กุมภาพันธ์ 2567</td>
            <td>16:40</td>
            <td>ม้า</td>
            <td>ชาย</td>
            <td>นิติศาสตร์</td>
            <td>ม้า</td>
            <td>0959013489</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank" " >ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 9 -->
          <tr>
            <td>9</td>
            <td>9 กุมภาพันธ์ 2567</td>
            <td>09:30</td>
            <td>ปลาวาฬ</td>
            <td>ชาย</td>
            <td>สัตวแพทย์</td>
            <td>ปลาวาฬ</td>
            <td>0959013490</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
              <button class="btn btn-success">อนุมัติ</button>
            </td>
            <td>
              <button class="btn btn-danger">ไม่อนุมัติ</button>
            </td>
          </tr>
          <!-- ลำดับที่ 10 -->
          <tr>
            <td>10</td>
            <td>10 กุมภาพันธ์ 2567</td>
            <td>10:00</td>
            <td>สุนัข</td>
            <td>ชาย</td>
            <td>บริหารธุรกิจ</td>
            <td>สุนัข</td>
            <td>0959013491</td>
            <td>
              <a href="{{ route('check_player') }}" class="btn btn-primary " target="_blank"">ตรวจสอบผู้เล่น</a>
            </td>
            <td>
                <button class="btn btn-success" onclick="approve(this.parentNode.parentNode)">อนุมัติ</button>
              </td>
              <td>
                <button class="btn btn-danger" onclick="disapprove(this.parentNode.parentNode)">ไม่อนุมัติ</button>
              </td>

          </tr>
        </tbody>
      </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <script>
        function approve(row) {
          row.style.backgroundColor = "#d4edda"; // สีเขียวสำหรับการอนุมัติ
        }

        function disapprove(row) {
          row.style.backgroundColor = "#f8d7da"; // สีแดงสำหรับไม่อนุมัติ
        }
      </script>

</body>
</html>
