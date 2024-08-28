@extends('layouts.login')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-header bg-primary text-white">{{ __('ลงทะเบียน') }}</div>

                <div class="card-body">
                    @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif
                    <form method="POST" action="{{ route('register') }}" id="registrationForm">
                        @csrf

                        <div class="mb-3 row">
                            <label for="prefix" class="col-md-4 col-form-label text-md-end">คำนำหน้า</label>
                            <div class="col-md-6">
                                <select id="prefix" class="form-select" name="prefix" onchange="checkPrefix()">
                                    <option value="นาย">นาย</option>
                                    <option value="นาง">นาง</option>
                                    <option value="นางสาว">นางสาว</option>
                                    <option value="อื่นๆ">อื่นๆ</option>
                                </select>
                                <input type="text" id="custom_prefix" class="form-control mt-2 d-none" name="custom_prefix" placeholder="กรุณาระบุคำนำหน้า">
                                {{--  @error('prefix')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="name" class="col-md-4 col-form-label text-md-end">ชื่อ</label>
                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="กรุณากรอกชื่อ">
                                <div class="invalid-feedback">กรุณากรอกชื่อ</div>
                                {{--  @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="lastname" class="col-md-4 col-form-label text-md-end">นามสกุล</label>
                            <div class="col-md-6">
                                <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname" placeholder="กรุณากรอกนามสกุล">
                                <div class="invalid-feedback">กรุณากรอกนามสกุล</div>
                                {{--  @error('lastname')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
    <label for="student_code" class="col-md-4 col-form-label text-md-end">รหัสนักศึกษา</label>
    <div class="col-md-6">
        <input id="student_code" type="text" class="form-control @error('student_code') is-invalid @enderror" name="student_code" value="{{ old('student_code') }}" required autocomplete="student_code" maxlength="13" oninput="formatStudentCode()" placeholder="กรุณากรอกรหัสนักศึกษา">
        <div class="invalid-feedback" id="student_code_feedback">รหัสนักศึกษาถูกใช้งานแล้ว </div>
        {{--  @error('student_code')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror  --}}
    </div>
</div>


                        <div class="mb-3 row">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">เบอร์โทร</label>
                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone" maxlength="10" oninput="validatePhone()" placeholder="กรุณากรอกเบอร์โทร">
                                <div class="invalid-feedback">กรุณากรอกเบอร์โทร 10 หมายเลข</div>
                                {{--  @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="email" class="col-md-4 col-form-label text-md-end">อีเมล</label>
                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="กรุณากรอกอีเมล">
                                <div class="invalid-feedback">อีเมลล์นี้ถูกใช้งานแล้ว</div>
                                {{--  @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password" class="col-md-4 col-form-label text-md-end">รหัสผ่าน</label>
                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="กรุณากรอกรหัสผ่าน">
                                <div class="invalid-feedback">กรุณากรอกรหัสผ่าน</div>
                                {{--  @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror  --}}
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-end">ยืนยันรหัสผ่าน</label>
                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="กรุณายืนยันรหัสผ่าน">
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary w-100">
                                    {{ __('ลงทะเบียน') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
function checkPrefix() {
    const prefix = document.getElementById('prefix').value;
    const customPrefix = document.getElementById('custom_prefix');
    if (prefix === 'อื่นๆ') {
        customPrefix.classList.remove('d-none');
        customPrefix.required = true;
    } else {
        customPrefix.classList.add('d-none');
        customPrefix.required = false;
    }
}

function formatStudentCode() {
    const studentCodeInput = document.getElementById('student_code');
    let studentCodeValue = studentCodeInput.value.replace(/-/g, '');
    if (studentCodeValue.length > 11) {
        studentCodeValue = studentCodeValue.slice(0, 11) + '-' + studentCodeValue.slice(11);
    }
    studentCodeInput.value = studentCodeValue;
}

function validatePhone() {
    const phoneInput = document.getElementById('phone');
    const phoneValue = phoneInput.value;
    const regex = /^[0-9]{0,10}$/;
    if (!regex.test(phoneValue)) {
        phoneInput.setCustomValidity('กรุณากรอกเบอร์โทร ');
    } else {
        phoneInput.setCustomValidity('');
    }
}

// ตรวจสอบรหัสนักศึกษาแบบ Real-time ด้วย Ajax
$('#student_code').on('change', function() {
    let studentCode = $(this).val();

    $.ajax({
        url: '/check-student-code',
        method: 'POST',
        data: {
            student_code: studentCode,
            _token: '{{ csrf_token() }}'
        },
        success: function(response) {
            if (!response.isAvailable) {
                $('#student_code_feedback').text('รหัสนักศึกษานี้มีอยู่แล้วในระบบ').removeClass('d-none');
                $('#student_code').addClass('is-invalid');
            } else {
                $('#student_code_feedback').text('').addClass('d-none');
                $('#student_code').removeClass('is-invalid');
            }
        }
    });
});


document.getElementById('registrationForm').addEventListener('submit', function(event) {
    if (!this.checkValidity()) {
        event.preventDefault();
        event.stopPropagation();
        alert('กรุณากรอกข้อมูลให้ครบถ้วน');
    }
    this.classList.add('was-validated');
});
</script>
@endsection
