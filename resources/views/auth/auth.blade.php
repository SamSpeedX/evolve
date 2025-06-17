<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login & Registration Form</title>
    <!-- Font Awesome CDN for icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>

    </style>
</head>
<body>
    <div class="logo">
        <img src="yu.jpg" alt="Company Logo">
    </div>

    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>
    <div class="circle"></div>

    <div class="container">
        <div class="form-container login-form">
            <form>
                <h2>Login</h2>
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="login-password" required>
                    <label>Password</label>
                    <i class="fas fa-eye password-toggle" id="toggle-login-password"></i>
                </div>
                <button type="submit" class="btn">Login</button>
                <div class="toggle-form">
                    Don't have an account? <a href="#" id="show-register">Register</a>
                </div>
            </form>
        </div>

        <div class="form-container register-form">
            <form>
                <h2>Register</h2>
                <div class="input-group">
                    <i class="fas fa-user input-icon"></i>
                    <input type="text" required>
                    <label>Username</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-envelope input-icon"></i>
                    <input type="email" required>
                    <label>Email</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-phone input-icon"></i>
                    <span class="phone-prefix">+255</span>
                    <input type="tel" class="phone-input" required pattern="[0-9]{9}" title="Please enter 9 digits after +255" placeholder="712345678">
                    <label>Phone Number</label>
                </div>
                <div class="input-group">
                    <i class="fas fa-lock input-icon"></i>
                    <input type="password" id="register-password" required>
                    <label>Password</label>
                    <i class="fas fa-eye password-toggle" id="toggle-register-password"></i>
                </div>
                <div class="input-group">
                    <i class="fas fa-check-circle input-icon"></i>
                    <input type="password" id="confirm-password" required>
                    <label>Confirm Password</label>
                    <i class="fas fa-eye password-toggle" id="toggle-confirm-password"></i>
                </div>
                <button type="submit" class="btn">Register</button>
                <div class="toggle-form">
                    Already have an account? <a href="#" id="show-login">Login</a>
                </div>
            </form>
        </div>
    </div>

    <script src="{{ asset('js/auth.js') }}"></script>
</body>
</html>