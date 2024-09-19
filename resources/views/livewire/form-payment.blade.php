<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Slip Verification</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <style>
        .upload-container {
            display: flex;
            align-items: center;
        }

        .upload-success {
            color: #28a745;
            margin-left: 10px;
            display: none;
        }

        .form-control.is-valid,
        .was-validated .form-control:valid {
            border-color: #28a745;
            padding-right: calc(1.5em + .75rem);
            background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 8 8'%3e%3cpath fill='%2328a745' d='M2.3 6.73L.6 4.53c-.4-1.04.46-1.4 1.1-.8l1.1 1.4 3.4-3.8c.6-.63 1.6-.27 1.2.7l-4 4.6c-.43.5-.8.4-1.1.1z'/%3e%3c/svg%3e);
            background-repeat: no-repeat;
            background-position: center right calc(.375em + .1875rem);
            background-size: calc(.75em + .375rem) calc(.75em + .375rem);
        }

        .submit-button {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }

        .submit-button:disabled {
            background-color: #d3d3d3;
            cursor: not-allowed;
        }

        .card-header {
            background-color: #6caceb;
            border-bottom: 1px solid #e3e6f0;
            color: white;
        }

        .card-body p {
            margin-bottom: 0.5rem;
            text-align: center;
        }
    </style>
</head>

<body>
    <div class="container mt-5">
        <div class="card">
            <div class="card-header text-center">
                <h2 class="css-1509b">Slip Verification</h2>
                <p class="css-1509b">แจ้งชำระด้วยธนาคาร (สลิป)</p>
            </div>

            <div class="card-body">
                {{-- <div class="css-15dv7dt">
                    <div class="css-165casq">
                        <p class="css-3nmobs">ธนาคารกสิกรไทย (KBANK)</p>
                        <p class="css-usiivr">999-9999-999-9</p>
                    </div>
                    <div class="css-165casq">
                        <p class="css-3nmobs">ชื่อบัญชี</p>
                        <p class="css-usiivr">วีระพล จันทร์สว่าง</p>
                    </div>
                    <p class="css-3nmobs">ใช้แอพธนาคารโอนเงินบัญชีดังกล่าว แล้วนำสลิปมาแนบที่ช่องด้านล่างเพื่อชำระเงิน</p>
                </div> --}}
                <div>
                    @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('formpayment.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="team_name">ชื่อทีม</label>
                            <select id="team_name" name="team_name" class="form-control" required>
                                <option value="">-- เลือกทีม --</option>
                                @foreach ($teams as $team)  <!-- เริ่มการวนลูป -->
                                    <option value="{{ $team->team_name }}">{{ $team->team_name }}</option>
                                @endforeach  <!-- ปิดการวนลูป -->
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="bank_id">บัญชีธนาคารของมหาลัยฯ</label>
                            <select name="bank_id" id="bank_id" class="form-control" required>
                             <option value="">-</option>
                                <option value="กรุงไทย 3100808290 (มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตสุรินทร์ )">
กรุงไทย 3100808290มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตสุรินทร์ )
                                </option>
                                <option value="กรุงไทย 3016100053 (มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน )">กรุงไทย 3016100053(มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน )</option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="bank_repay_id">โอนจากธนาคาร</label>
                            <select name="bank_repay_id" id="bank_repay_id" class="form-control" required>
                                <option value="">-</option>
                                <option value="กรุงเทพ Bangkok Bank">
                                    กรุงเทพ Bangkok Bank
                                </option>
                                <option value="กรุงไทย Krung Thai Bank">
                                    กรุงไทย Krung Thai Bank
                                </option>
                            </option>
                            <option value="กรุงศรีอยุธยา Bank of Ayudhaya">
                                กรุงศรีอยุธยา Bank of Ayudhaya
                            </option>
                            <option value=" กสิกรไทย KasikornBank">
                                กสิกรไทย KasikornBank
                            </option>
                            <option value="เกียรตินาคิน Kiatnakin Bank">
                                เกียรตินาคิน Kiatnakin Bank
                            </option>
                            <option value="ซิติแบงก์ Citibank">
                                ซิติแบงก์ Citibank
                            </option>
                            <option value="ทหารไทย Thai Military Bank">
                                ทหารไทย Thai Military Bank
                            </option>
                            <option value="ทิสโก้ Thai Investment and Securities Company Bank">
                                ทิสโก้ Thai Investment and Securities Company Bank
                            </option>
                            <option value="ไทย BankThai">
                                ไทย BankThai
                            </option>
                            <option value="ไทยพาณิชย์ Siam Commercial Bank">
                                ไทยพาณิชย์ Siam Commercial Bank
                            </option>
                            <option value=" ธนชาต Thanachart Bank">
                                ธนชาต Thanachart Bank
                            </option>
                            <option value="นครหลวงไทย Siam City Bank">
                                นครหลวงไทย Siam City Bank
                            </option>
                            <option value="ยูโอบี United Overseas Bank, Thailand">
                                ยูโอบี United Overseas Bank, Thailand
                            </option>
                            <option value="สแตนดาร์ดชาร์เตอร์ด Standard Chartered Bank Thai">
                                สแตนดาร์ดชาร์เตอร์ด Standard Chartered Bank Thai
                            </option>
                            <option value="เมกะสากลพาณิชย์ Mega International Commercial Bank">
                                เมกะสากลพาณิชย์ Mega International Commercial Bank
                            </option>
                            <option value="สินเอเชีย Asia Credit Limited Bank">
                                สินเอเชีย Asia Credit Limited Bank
                            </option>
                            <option value="เอสเอ็มอี (SME) SME Bank of Thailand">
                                เอสเอ็มอี (SME) SME Bank of Thailand
                            </option>
                            <option value="ธกส. Bank for Agriculture and Agricultural Cooperatives">
                                ธกส. Bank for Agriculture and Agricultural Cooperatives
                            </option>
                            <option value=" เพื่อการส่งออกและนำเข้า Export-Import Bank of Thailand">
                                เพื่อการส่งออกและนำเข้า Export-Import Bank of Thailand
                            </option>
                            <option value=" ออมสิน Government Saving Bank">
                                ออมสิน Government Saving Bank
                            </option>
                            <option value="อาคารสงเคราะห์ Government Housing Bank">
                                อาคารสงเคราะห์ Government Housing Bank
                            </option>
                            <option value="อิสลามแห่งประเทศไทย Islamic Bank of Thailand">
                                อิสลามแห่งประเทศไทย Islamic Bank of Thailand
                            </option>
                            </select>
                        </div>

                        <div class="form-group ">
                            <label for="payment_date">วันที่ชำระ</label>
                            <input type="date" name="payment_date" id="payment_date" class="form-control" required>
                        </div>

                        <div class="form-group ">
                            <label for="payment_time">เวลาที่ชำระ</label>
                            <input type="time" name="payment_time" id="payment_time" class="form-control" required>
                        </div>

                        <div class="form-group ">
                            <label for="payment_money">ยอดโอน(บาท)</label>
                            <input type="number" name="payment_money" id="payment_money" step="0.01" class="form-control" required>
                        </div>

                        <div class="form-group ">
                            <label for="payment_files">ไฟล์ภาพหลักฐาน (png, jpg, jpeg)</label>
                            <input type="file" name="payment_files" id="payment_files" class="form-control" required>
                        </div>

                        <button type="submit" class="btn btn-primary mt-3">ส่ง</button>
                    </form>
                </div>



        </div>
    </div>
    <script>
        document.getElementById('payment_files').addEventListener('change', function(event) {
            const fileInput = event.target;
            const files = fileInput.files;
            if (files.length > 0) {
                const file = files[0];
                const reader = new FileReader();
                reader.onload = function(e) {
                    const img = new Image();
                    img.onload = function() {
                        const canvas = document.getElementById('payment_decode_image');
                        const ctx = canvas.getContext('2d');
                        ctx.drawImage(img, 0, 0, canvas.width, canvas.height);
                    };
                    img.src = e.target.result;
                    document.getElementById('upload-success').style.display = 'inline-block';
                    document.getElementById('submit-button').disabled = false;
                };
                reader.readAsDataURL(file);
            } else {
                document.getElementById('upload-success').style.display = 'none';
                document.getElementById('submit-button').disabled = true;
            }
        });

    </script>


</body>

</html>
