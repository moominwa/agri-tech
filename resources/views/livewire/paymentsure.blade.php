<div>
    <h1>dadad</h1>
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

            .form-control.is-valid, .was-validated .form-control:valid {
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
                    <div class="css-15dv7dt">
                        <div class="css-165casq">
                            <p class="css-3nmobs">ธนาคารกสิกรไทย (KBANK)</p>
                            <p class="css-usiivr">999-9999-999-9</p>
                        </div>
                        <div class="css-165casq">
                            <p class="css-3nmobs">ชื่อบัญชี</p>
                            <p class="css-usiivr">วีระพล จันทร์สว่าง</p>
                        </div>
                        <p class="css-3nmobs">ใช้แอพธนาคารโอนเงินบัญชีดังกล่าว แล้วนำสลิปมาแนบที่ช่องด้านล่างเพื่อชำระเงิน</p>
                    </div>
                    <div class="row mt-4">
                        <div class="form-group col-sm-12">
                            <label for="payment_files">ไฟล์ภาพหลักฐาน (png, jpg, jpeg)</label>
                            <div class="upload-container">
                                <input class="form-control fill" id="payment_files" name="payment_files" type="file" accept="image/jpeg,image/png,image/jpg" aria-invalid="false">
                                <span id="upload-success" class="upload-success"><i class="fas fa-check-circle"></i></span>
                            </div>
                            <canvas id="payment_decode_image" style="display: none;" width="480" height="585"></canvas>
                            <input id="payment_bank_codefull" name="payment_bank_codefull" type="hidden" value="">
                            <input id="payment_bank_code" name="payment_bank_code" type="hidden" value="">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="form-group col-sm-12 text-center">
                            <button id="submit-button" class="submit-button" disabled>ส่ง</button>
                        </div>
                    </div>
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

            document.getElementById('submit-button').addEventListener('click', function() {
                if (confirm('คุณต้องการยืนยันการส่งหรือไม่?')) {
                    window.location.href = 'nextpage.html'; // Replace 'nextpage.html' with the desired URL
                }
            });
        </script>
    </body>

    </html>
    </div>
