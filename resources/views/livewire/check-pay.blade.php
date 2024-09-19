<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>อนุมัติการชำระเงิน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
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
                    @foreach ($payments as $payment)
                    <tr>
                        <td>{{ $payment->id }}</td>
                        <td>{{ $payment->payment_date }}</td>
                        <td>{{ $payment->payment_time }}</td>
                        <td>{{ $payment->team_name }}</td>
                        <td><img class="proof-img" src="{{ asset('storage/' . $payment->payment_files) }}" alt="หลักฐานการชำระเงิน" width="100px"/></td>
                        <td>
                            @if ($payment->payment_status == 'อนุมัติ')
                                <span class="text-success"><i class="fas fa-check-circle"></i> อนุมัติแล้ว</span>
                            @elseif ($payment->payment_status == 'ไม่อนุมัติ')
                                <span class="text-danger"><i class="fas fa-times-circle"></i> ไม่อนุมัติ</span>
                            @else
                                <span class="text-warning"><i class="fas fa-hourglass-half"></i> รอการดำเนินการ</span>
                            @endif
                        </td>
                        <td class="buttons">
                            <button class="btn btn-success" wire:click="approve({{ $payment->id }})">อนุมัติ</button>
                            <button class="btn btn-danger"  wire:click="deny({{ $payment->id }})">ไม่อนุมัติ</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div id="message" class="message">
            @if (session()->has('message'))
                {{session('message')}}
            @endif
        </div>
    </div>
</body>
{{-- <script>
    function approvePayment(id) {
        fetch(`/payments/approve/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => showMessage(data.message, 'success'))
        .catch(error => showMessage('เกิดข้อผิดพลาด', 'error'));
    }

    function denyPayment(id) {
        fetch(`/payments/deny/${id}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                'Content-Type': 'application/json',
            },
        })
        .then(response => response.json())
        .then(data => showMessage(data.message, 'error'))
        .catch(error => showMessage('เกิดข้อผิดพลาด', 'error'));
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
</script> --}}
</html>
