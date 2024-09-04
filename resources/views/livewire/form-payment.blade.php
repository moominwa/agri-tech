<!DOCTYPE html>
<html lang="en">

<head>
    <livewire:styles />
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

                <form wire:submit.prevent="submit">
                    <div class="form-group">
                        <label for="team_name">ชื่อทีม</label>
                        <input type="text" id="team_name" wire:model="team_name" class="form-control" required>
                    </div>


                    <div class="row">
                        <div class="form-group col-12">
                            <label for="bank_id">บัญชีธนาคารของมหาลัยฯ</label>
                            <select class="form-control " id="bank_id" name="bank_id" required="">
                                <option value="">-</option>
                                <option value="1">
                                    กรุงไทย 3100808290 (
                                    มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน วิทยาเขตสุรินทร์ )
                                </option>
                                <option value="2">
                                    กรุงไทย 3016100053 (
                                    มหาวิทยาลัยเทคโนโลยีราชมงคลอีสาน )
                                </option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-lg-3   col-sm-6">
                            <label for="bank_repay_id">โอนจากธนาคาร</label>
                            <select class="form-control" id="bank_repay_id" name="bank_repay_id" required="">
                                <option value="">-</option>
                                <option value="1">
                                    กรุงเทพ Bangkok Bank
                                </option>
                                <option value="2">
                                    กรุงไทย Krung Thai Bank
                                </option>
                                <option value="3">
                                    กรุงศรีอยุธยา Bank of Ayudhaya
                                </option>
                                <option value="4">
                                    กสิกรไทย KasikornBank
                                </option>
                                <option value="5">
                                    เกียรตินาคิน Kiatnakin Bank
                                </option>
                                <option value="6">
                                    ซิติแบงก์ Citibank
                                </option>
                                <option value="7">
                                    ทหารไทย Thai Military Bank
                                </option>
                                <option value="8">
                                    ทิสโก้ Thai Investment and Securities Company Bank
                                </option>
                                <option value="9">
                                    ไทย BankThai
                                </option>
                                <option value="10">
                                    ไทยพาณิชย์ Siam Commercial Bank
                                </option>
                                <option value="11">
                                    ธนชาต Thanachart Bank
                                </option>
                                <option value="12">
                                    นครหลวงไทย Siam City Bank
                                </option>
                                <option value="13">
                                    ยูโอบี United Overseas Bank, Thailand
                                </option>
                                <option value="14">
                                    สแตนดาร์ดชาร์เตอร์ด Standard Chartered Bank Thai
                                </option>
                                <option value="15">
                                    เมกะสากลพาณิชย์ Mega International Commercial Bank
                                </option>
                                <option value="16">
                                    สินเอเชีย Asia Credit Limited Bank
                                </option>
                                <option value="17">
                                    เอสเอ็มอี (SME) SME Bank of Thailand
                                </option>
                                <option value="18">
                                    ธกส. Bank for Agriculture and Agricultural Cooperatives
                                </option>
                                <option value="19">
                                    เพื่อการส่งออกและนำเข้า Export-Import Bank of Thailand
                                </option>
                                <option value="20">
                                    ออมสิน Government Saving Bank
                                </option>
                                <option value="21">
                                    อาคารสงเคราะห์ Government Housing Bank
                                </option>
                                <option value="22">
                                    อิสลามแห่งประเทศไทย Islamic Bank of Thailand
                                </option>
                            </select>
                        </div>

                        <div class="form-group col-lg-3  col-sm-6">
                            <label for="payment_date">วันที่ชำระ</label>
                            <input class="form-control" id="payment_date" name="payment_date" type="date"
                                value="">
                        </div>
                        <div class="form-group col-lg-3  col-sm-6">
                            <label for="payment_time">เวลาที่ชำระ</label>
                            <input class="form-control" id="payment_time" name="payment_time" type="time"
                                value="">
                        </div>
                        <div class="form-group col-lg-3  col-sm-6">
                            <label for="payment_money">ยอดโอน(บาท)</label>
                            <input class="form-control" id="payment_money" name="payment_money" type="number"
                                step="0.01" value="">
                        </div>
                        <div class="form-group">
                            <label for="payment_files">ไฟล์ภาพหลักฐาน (png, jpg, jpeg)</label>
                            <div class="upload-container">
                                <input class="form-control fill" id="payment_files" name="payment_files" type="file"
                                    accept="image/jpeg,image/png,image/jpg" aria-invalid="false">
                                <span id="upload-success" class="upload-success"><i
                                        class="fas fa-check-circle"></i></span>
                            </div>
                            <canvas id="payment_decode_image" style="display: none;" width="480"
                                height="585"></canvas>
                            <input id="payment_bank_codefull" name="payment_bank_codefull" type="hidden"
                                value="">
                            <input id="payment_bank_code" name="payment_bank_code" type="hidden" value="">
                        </div>

                        <div class="form-group text-center">
                            <button id="submit-button" class="submit-button" type="submit" disabled>ส่ง</button>
                        </div>
                        @if (session()->has('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    @if (session()->has('error'))
                        <div class="alert alert-danger">
                            {{ session('error') }}
                        </div>
                    @endif

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
