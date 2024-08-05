@extends('layouts.login')
@section('content')
<div class="container-fluid bg-dark text-light">
    <div class="row min-vh-100">
        <!-- ภาพด้านข้าง -->
        <div class="col-md-6 d-none d-md-flex align-items-center p-0">
           <img src="{{ asset('images/snow.jpg') }}" alt="Decorative Image" class="img-fluid w-100 h-100 object-fit-cover">
        </div>

        <!-- ฟอร์มลงทะเบียน -->
        <div class="col-md-6 d-flex align-items-center justify-content-center p-4">
            <div class="card shadow-sm" style="width: 100%; max-width: 500px;">
                <div class="card-header bg-primary text-white text-center">
                    <h4>{{ __('Register') }}</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <div class="mb-3">
                            <label for="prefix" class="form-label">คำนำหน้า</label>
                            <select id="prefix" class="form-select @error('prefix') is-invalid @enderror" name="prefix" onchange="checkPrefix()">
                                <option value="นาย">นาย</option>
                                <option value="นาง">นาง</option>
                                <option value="นางสาว">นางสาว</option>
                                <option value="อื่นๆ">อื่นๆ</option>
                            </select>
                            <input type="text" id="custom_prefix" class="form-control mt-2 d-none" name="custom_prefix" placeholder="กรุณาระบุคำนำหน้า">
                            @error('prefix')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="name" class="form-label">ชื่อ</label>
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                            @error('name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="lastname" class="form-label">นามสกุล</label>
                            <input id="lastname" type="text" class="form-control @error('lastname') is-invalid @enderror" name="lastname" value="{{ old('lastname') }}" required autocomplete="lastname">
                            @error('lastname')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="department" class="form-label">สาขา</label>
                            <select id="department" class="form-select @error('department') is-invalid @enderror" name="department" required autocomplete="department">
                                <option value="ประมง">ประมง</option>
                                <option value="วิทยาการคอมพิวเตอร์">วิทยาการคอมพิวเตอร์</option>
                                <option value="สัตวศาสตร์">สัตวศาสตร์</option>
                                <option value="ไฟฟ้า">ไฟฟ้า</option>
                            </select>
                            @error('department')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="team-n" class="form-label">ชื่อทีม</label>
                            <input id="team-n" type="text" class="form-control @error('team_name') is-invalid @enderror" name="team_name" value="{{ old('team_name') }}" required autocomplete="team_name">
                            @error('team_name')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="phone" class="form-label">เบอร์โทร</label>
                            <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" required autocomplete="phone">
                            @error('phone')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="email" class="form-label">อีเมล</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                            @error('email')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password" class="form-label">รหัสผ่าน</label>
                            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                            @error('password')
                                <div class="invalid-feedback">
                                    <strong>{{ $message }}</strong>
                                </div>
                            @enderror
                        </div>

                        <div class="mb-3">
                            <label for="password-confirm" class="form-label">ยืนยันรหัสผ่าน</label>
                            <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                {{ __('Register') }}
                            </button>
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
</script>
@endsection
