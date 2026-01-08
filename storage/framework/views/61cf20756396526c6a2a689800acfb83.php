<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 to-purple-600 flex items-center justify-center">
    <div class="bg-white rounded-2xl shadow-2xl p-8 w-full max-w-md">
        <div class="text-center mb-8">
            <i class="fas fa-user-plus text-5xl text-indigo-500 mb-4"></i>
            <h3 class="text-2xl font-bold text-gray-800">Crear Cuenta</h3>
            <p class="text-gray-500 mt-2">Regístrate para comenzar</p>
        </div>

        <form id="registerForm" method="POST" action="<?php echo e(route('register')); ?>">
            <?php echo csrf_field(); ?>

            <!-- Name -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Nombre</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-user"></i>
                    </span>
                    <input id="name"
                           class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           type="text"
                           name="name"
                           required
                           autofocus
                           autocomplete="name"
                           placeholder="Ingresa tu nombre">
                </div>
                <p id="name-error" class="mt-2 text-red-500 text-sm hidden"></p>
            </div>

            <!-- Username -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Usuario</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-at"></i>
                    </span>
                    <input id="username"
                           class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           type="text"
                           name="username"
                           required
                           autocomplete="username"
                           placeholder="Ingresa tu usuario">
                </div>
                <p id="username-error" class="mt-2 text-red-500 text-sm hidden"></p>
            </div>

            <!-- Email -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Email</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-envelope"></i>
                    </span>
                    <input id="email"
                           class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           type="email"
                           name="email"
                           required
                           autocomplete="email"
                           placeholder="Ingresa tu email">
                </div>
                <p id="email-error" class="mt-2 text-red-500 text-sm hidden"></p>
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label class="block text-gray-700 text-sm font-bold mb-2">Contraseña</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input id="password"
                           class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           type="password"
                           name="password"
                           required
                           autocomplete="new-password"
                           placeholder="Ingresa tu contraseña">
                    <button type="button" onclick="togglePassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-indigo-500 focus:outline-none">
                        <i id="eyeIcon" class="fas fa-eye"></i>
                    </button>
                </div>
                <p id="password-error" class="mt-2 text-red-500 text-sm hidden"></p>
            </div>

            <!-- Confirm Password -->
            <div class="mb-6">
                <label class="block text-gray-700 text-sm font-bold mb-2">Confirmar Contraseña</label>
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                        <i class="fas fa-lock"></i>
                    </span>
                    <input id="password_confirmation"
                           class="w-full pl-10 pr-12 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                           type="password"
                           name="password_confirmation"
                           required
                           autocomplete="new-password"
                           placeholder="Confirma tu contraseña">
                    <button type="button" onclick="toggleConfirmPassword()" class="absolute inset-y-0 right-0 pr-3 flex items-center text-gray-400 hover:text-indigo-500 focus:outline-none">
                        <i id="eyeIconConfirm" class="fas fa-eye"></i>
                    </button>
                </div>
                <p id="password_confirmation-error" class="mt-2 text-red-500 text-sm hidden"></p>
            </div>

            <button type="submit" class="w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold py-3 px-4 rounded-lg hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300">
                <i class="fas fa-user-plus mr-2"></i>
                Registrarse
            </button>
        </form>

        <div class="text-center mt-6">
            <a href="<?php echo e(route('login')); ?>" class="text-indigo-600 hover:text-indigo-800 text-sm">
                ¿Ya tienes cuenta? <span class="font-bold">Inicia sesión</span>
            </a>
        </div>
    </div>

    <script>
        function togglePassword() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        function toggleConfirmPassword() {
            const passwordInput = document.getElementById('password_confirmation');
            const eyeIcon = document.getElementById('eyeIconConfirm');

            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        }

        document.getElementById('registerForm').addEventListener('submit', function(e) {
            e.preventDefault();

            const formData = new FormData(this);
            const submitBtn = this.querySelector('button[type="submit"]');
            const originalText = submitBtn.innerHTML;

            submitBtn.disabled = true;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Registrando...';

            fetch(this.action, {
                method: 'POST',
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                },
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                if (data.errors) {
                    Object.keys(data.errors).forEach(field => {
                        const errorElement = document.getElementById(`${field}-error`);
                        if (errorElement) {
                            errorElement.textContent = data.errors[field][0];
                            errorElement.classList.remove('hidden');
                        }
                    });
                } else if (data.redirect) {
                    window.location.href = data.redirect;
                }
            })
            .catch(error => {
                console.error('Error:', error);
                alert('Hubo un error al procesar el registro');
            })
            .finally(() => {
                submitBtn.disabled = false;
                submitBtn.innerHTML = originalText;
            });
        });

        const inputs = document.querySelectorAll('#registerForm input');
        inputs.forEach(input => {
            input.addEventListener('input', function() {
                const errorElement = document.getElementById(`${this.id}-error`);
                if (errorElement) {
                    errorElement.classList.add('hidden');
                }
            });
        });
    </script>
</body>
</html>
<?php /**PATH C:\Users\thebo\Desktop\Proyecto VSC\Ana-Laravel\mini-project\resources\views/auth/register.blade.php ENDPATH**/ ?>