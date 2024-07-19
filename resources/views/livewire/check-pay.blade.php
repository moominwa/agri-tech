<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติการชำระเงิน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        .container {
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .buttons button {
            margin-right: 5px;
        }
        .proof-img {
            max-width: 300px;
            max-height: 200px;
        }
        .message {
            margin-top: 20px;
            padding: 10px;
            border-radius: 5px;
        }
        .message.success {
            background-color: #d4edda;
            color: #155724;
        }
        .message.error {
            background-color: #f8d7da;
            color: #721c24;
        }
    </style>
    <script>
        function approvePayment(index) {
            showMessage('การชำระเงินได้รับการอนุมัติสำหรับรายการที่ ' + index, 'success');
        }

        function denyPayment(index) {
            showMessage('การชำระเงินไม่ได้รับการอนุมัติสำหรับรายการที่ ' + index, 'error');
        }

        function showMessage(message, type) {
            const messageDiv = document.getElementById('message');
            messageDiv.innerText = message;
            messageDiv.className = 'message ' + type;
            setTimeout(() => {
                messageDiv.innerText = '';
                messageDiv.className = 'message';
            }, 3000);
        }
    </script>
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">อนุมัติการชำระเงิน</h1>
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ลำดับ</th>
                        <th>วันที่</th>
                        <th>เวลา</th>
                        <th>ชื่อทีม</th>
                        <th>หลักฐานการชำระเงิน</th>
                        <th>การดำเนินการ</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- เริ่มจำลองข้อมูล -->
                    <tr>
                        <td>1</td>
                        <td>2024-06-07</td>
                        <td>10:00</td>
                        <td>ทีมตัวอย่าง 1</td>
                        <td>
                            <img class="proof-img" src="https://s359.kapook.com/r/600/auto/pagebuilder/ba154685-db18-4ac7-b318-a4a2b15b9d4c.jpg" alt="หลักฐานการชำระเงิน">
                        </td>
                        <td class="buttons">
                            <button class="btn btn-success" onclick="approvePayment(1)">อนุมัติ</button>
                            <button class="btn btn-danger" onclick="denyPayment(1)">ไม่อนุมัติ</button>
                        </td>
                    </tr>

                    <tr>
                        <td>2</td>
                        <td>2024-06-07</td>
                        <td>10:00</td>
                        <td>ทีมตัวอย่าง 1</td>
                        <td>
                            <img class="proof-img" src="https://s359.kapook.com/r/600/auto/pagebuilder/ba154685-db18-4ac7-b318-a4a2b15b9d4c.jpg" alt="หลักฐานการชำระเงิน">
                        </td>
                        <td class="buttons">
                            <button class="btn btn-success" onclick="approvePayment(2)">อนุมัติ</button>
                            <button class="btn btn-danger" onclick="denyPayment(2)">ไม่อนุมัติ</button>
                        </td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>2024-06-07</td>
                        <td>10:00</td>
                        <td>ทีมตัวอย่าง 1</td>
                        <td>
                            <img class="proof-img" src="https://s359.kapook.com/r/600/auto/pagebuilder/ba154685-db18-4ac7-b318-a4a2b15b9d4c.jpg" alt="หลักฐานการชำระเงิน">
                        </td>
                        <td class="buttons">
                            <button class="btn btn-success" onclick="approvePayment(3)">อนุมัติ</button>
                            <button class="btn btn-danger" onclick="denyPayment(3)">ไม่อนุมัติ</button>
                        </td>
                    </tr>
                    <tr>
                        <td>4</td>
                        <td>2024-06-07</td>
                        <td>10:00</td>
                        <td>ทีมตัวอย่าง 1</td>
                        <td>
                            <img class="proof-img" src="https://s359.kapook.com/r/600/auto/pagebuilder/ba154685-db18-4ac7-b318-a4a2b15b9d4c.jpg" alt="หลักฐานการชำระเงิน">
                        </td>
                        <td class="buttons">
                            <button class="btn btn-success" onclick="approvePayment(4)">อนุมัติ</button>
                            <button class="btn btn-danger" onclick="denyPayment(4)">ไม่อนุมัติ</button>
                        </td>
                    </tr>
                    <tr>
                        <td>5</td>
                        <td>2024-06-07</td>
                        <td>10:00</td>
                        <td>ทีมตัวอย่าง 1</td>
                        <td>
                            <img class="proof-img" src="https://s359.kapook.com/r/600/auto/pagebuilder/ba154685-db18-4ac7-b318-a4a2b15b9d4c.jpg" alt="หลักฐานการชำระเงิน">
                        </td>
                        <td class="buttons">
                            <button class="btn btn-success" onclick="approvePayment(5)">อนุมัติ</button>
                            <button class="btn btn-danger" onclick="denyPayment(5)">ไม่อนุมัติ</button>
                        </td>
                    </tr>
                    <!-- จบจำลองข้อมูล -->
                </tbody>
            </table>
        </div>
        <div id="message" class="message"></div>
    </div>
</body>
</html>
