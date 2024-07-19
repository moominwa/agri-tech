<!DOCTYPE html>
<html lang="th">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>การจัดการโปรไฟล์แอดมิน</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
        }
        .container {
            max-width: 600px;
            margin: 50px auto;
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
        }
        h2 {
            margin-bottom: 20px;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>การจัดการโปรไฟล์แอดมิน</h2>
        <form id="adminProfileForm">
            <div class="form-group">
                <label for="username">ชื่อผู้ใช้</label>
                <input type="text" class="form-control" id="username" name="username" readonly>
            </div>
            <div class="form-group">
                <label for="fullName">ชื่อ-นามสกุล</label>
                <input type="text" class="form-control" id="fullName" name="fullName">
            </div>
            <div class="form-group">
                <label for="email">อีเมล</label>
                <input type="email" class="form-control" id="email" name="email">
            </div>
            <div class="form-group">
                <label for="password">รหัสผ่าน</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="password" name="password">
                    <button class="btn btn-outline-secondary" type="button" id="togglePasswordBtn" onclick="togglePasswordVisibility()">แสดง</button>
                </div>
            </div>
            <div class="form-group">
                <label for="confirmPassword">ยืนยันรหัสผ่าน</label>
                <div class="input-group">
                    <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                    <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPasswordBtn" onclick="toggleConfirmPasswordVisibility()">แสดง</button>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">บันทึกการเปลี่ยนแปลง</button>
        </form>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        // Mock admin profile data (replace with actual data from backend)
        const adminProfile = {
            username: 'admin123',
            fullName: 'ชื่อ นามสกุล',
            email: 'admin@example.com',
            // password: 'adminPassword' (don't display password)
        };

        // Function to populate admin profile form with data
        function populateAdminProfileForm() {
            document.getElementById('username').value = adminProfile.username;
            document.getElementById('fullName').value = adminProfile.fullName;
            document.getElementById('email').value = adminProfile.email;
            // Do not populate password field for security reasons
        }

        // Function to toggle password visibility
        function togglePasswordVisibility() {
            const passwordInput = document.getElementById('password');
            const togglePasswordBtn = document.getElementById('togglePasswordBtn');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                togglePasswordBtn.textContent = 'ซ่อน';
            } else {
                passwordInput.type = 'password';
                togglePasswordBtn.textContent = 'แสดง';
            }
        }

        // Function to toggle confirm password visibility
        function toggleConfirmPasswordVisibility() {
            const confirmPasswordInput = document.getElementById('confirmPassword');
            const toggleConfirmPasswordBtn = document.getElementById('toggleConfirmPasswordBtn');
            if (confirmPasswordInput.type === 'password') {
                confirmPasswordInput.type = 'text';
                toggleConfirmPasswordBtn.textContent = 'ซ่อน';
            } else {
                confirmPasswordInput.type = 'password';
                toggleConfirmPasswordBtn.textContent = 'แสดง';
            }
        }

        // Function to update admin profile data
        function updateAdminProfile(event) {
            event.preventDefault(); // Prevent form submission

            // Retrieve updated profile data from form
            const updatedFullName = document.getElementById('fullName').value;
            const updatedEmail = document.getElementById('email').value;
            const newPassword = document.getElementById('password').value;
            const confirmedPassword = document.getElementById('confirmPassword').value;

            // Check if passwords match
            if (newPassword !== confirmedPassword) {
                alert('รหัสผ่านไม่ตรงกัน');
                return;
            }

            // Update admin profile data (replace with actual update logic)
            adminProfile.fullName = updatedFullName;
            adminProfile.email = updatedEmail;
            // Update password if necessary

            // Display success message (replace with actual feedback mechanism)
            alert('บันทึกการเปลี่ยนแปลงเรียบร้อยแล้ว!');
        }

        // Populate admin profile form when page loads
        document.addEventListener('DOMContentLoaded', () => {
            populateAdminProfileForm();
            document.getElementById('adminProfileForm').addEventListener('submit', updateAdminProfile);
        });
    </script>
</body>
</html>
