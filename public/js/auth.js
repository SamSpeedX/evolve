document.addEventListener('DOMContentLoaded', function() {
    const container = document.querySelector('.container');
    const showRegister = document.getElementById('show-register');
    const showLogin = document.getElementById('show-login');

    showRegister.addEventListener('click', function(e) {
        e.preventDefault();
        container.classList.add('active');
    });

    showLogin.addEventListener('click', function(e) {
        e.preventDefault();
        container.classList.remove('active');
    });

    // Password toggle functionality
    function setupPasswordToggle(toggleId, passwordId) {
        const toggle = document.getElementById(toggleId);
        const password = document.getElementById(passwordId);
        
        toggle.addEventListener('click', function() {
            const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
            password.setAttribute('type', type);
            this.classList.toggle('fa-eye');
            this.classList.toggle('fa-eye-slash');
        });
    }

    // Set up password toggles
    setupPasswordToggle('toggle-login-password', 'login-password');
    setupPasswordToggle('toggle-register-password', 'register-password');
    setupPasswordToggle('toggle-confirm-password', 'confirm-password');

    // Create floating circles
    function createCircles() {
        const colors = ['rgba(255, 255, 255, 0.1)', 'rgba(255, 255, 255, 0.15)', 'rgba(255, 255, 255, 0.2)'];
        
        for (let i = 6; i <= 15; i++) {
            const circle = document.createElement('div');
            circle.classList.add('circle');
            
            const size = Math.random() * 100 + 50;
            const posX = Math.random() * window.innerWidth;
            const posY = Math.random() * window.innerHeight;
            const delay = Math.random() * 10;
            const duration = Math.random() * 20 + 10;
            const color = colors[Math.floor(Math.random() * colors.length)];
            
            circle.style.width = `${size}px`;
            circle.style.height = `${size}px`;
            circle.style.left = `${posX}px`;
            circle.style.top = `${posY}px`;
            circle.style.animationDelay = `${delay}s`;
            circle.style.animationDuration = `${duration}s`;
            circle.style.background = color;
            
            document.body.appendChild(circle);
        }
    }

    createCircles();

    // Input field label animation
    const inputs = document.querySelectorAll('.input-group input');
    inputs.forEach(input => {
        input.addEventListener('focus', function() {
            const label = this.nextElementSibling;
            if (label && label.tagName === 'LABEL') {
                label.style.top = '0';
                label.style.left = this.classList.contains('phone-input') ? '80px' : '40px';
                label.style.fontSize = '12px';
                label.style.background = '#667eea';
                label.style.padding = '0 5px';
                label.style.borderRadius = '10px';
            }
        });

        input.addEventListener('blur', function() {
            const label = this.nextElementSibling;
            if (label && label.tagName === 'LABEL' && !this.value) {
                label.style.top = '50%';
                label.style.left = this.classList.contains('phone-input') ? '80px' : '45px';
                label.style.fontSize = '16px';
                label.style.background = 'transparent';
                label.style.padding = '0';
                label.style.borderRadius = '0';
            }
        });
    });

    // Phone number validation
    const phoneInput = document.querySelector('.phone-input');
    if (phoneInput) {
        phoneInput.addEventListener('input', function() {
            // Remove any non-digit characters
            this.value = this.value.replace(/[^0-9]/g, '');
            
            // Limit to 9 digits
            if (this.value.length > 9) {
                this.value = this.value.slice(0, 9);
            }
        });
    }
});
    