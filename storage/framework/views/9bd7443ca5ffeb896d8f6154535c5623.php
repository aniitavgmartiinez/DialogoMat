<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Tema</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 to-purple-600">
    <nav class="bg-white shadow-md">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-graduation-cap text-indigo-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800">DialogoMat</span>
                </div>
                <div class="flex items-center space-x-4">
                    <a href="<?php echo e(route('dashboard')); ?>" class="text-indigo-600 hover:text-indigo-800 font-medium">Temas</a>
                    <a href="<?php echo e(route('topics.create')); ?>" class="text-indigo-600 hover:text-indigo-800 font-medium">Crear Tema</a>
                    <form method="POST" action="<?php echo e(route('logout')); ?>" class="inline">
                        <?php echo csrf_field(); ?>
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Salir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-4xl mx-auto py-8 px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="text-center mb-8">
                <i class="fas fa-plus-circle text-5xl text-indigo-500 mb-4"></i>
                <h1 class="text-3xl font-bold text-gray-800">Crear Nuevo Tema Matemático</h1>
                <p class="text-gray-500 mt-2">Comparte tus conocimientos con la comunidad</p>
            </div>

            <?php if(session('success')): ?>
                <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                    <?php echo e(session('success')); ?>

                </div>
            <?php endif; ?>

            <form method="POST" action="<?php echo e(route('topics.store')); ?>" enctype="multipart/form-data">
                <?php echo csrf_field(); ?>

                <!-- Imagen -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Imagen del Tema</label>
                    <div class="relative">
                        <input type="file" name="image" id="image" accept="image/*" class="hidden" onchange="previewImage(this)">
                        <div id="imagePreview" class="w-full h-64 border-2 border-dashed border-gray-300 rounded-lg flex items-center justify-center cursor-pointer hover:border-indigo-500 transition duration-300" onclick="document.getElementById('image').click()">
                            <div class="text-center">
                                <i class="fas fa-cloud-upload-alt text-5xl text-gray-400 mb-2"></i>
                                <p class="text-gray-500">Haz clic para subir una imagen</p>
                                <p class="text-gray-400 text-sm mt-1">JPEG, PNG, JPG, GIF (Max 2MB)</p>
                            </div>
                        </div>
                    </div>
                    <?php $__errorArgs = ['image'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-red-500 text-sm"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Título -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Título</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-heading"></i>
                        </span>
                        <input id="title"
                               class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                               type="text"
                               name="title"
                               value="<?php echo e(old('title')); ?>"
                               required
                               autofocus
                               placeholder="Ej: Álgebra Lineal">
                    </div>
                    <?php $__errorArgs = ['title'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-red-500 text-sm"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Subtítulo -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Subtítulo</label>
                    <div class="relative">
                        <span class="absolute inset-y-0 left-0 pl-3 flex items-center text-gray-400">
                            <i class="fas fa-bookmark"></i>
                        </span>
                        <input id="subtitle"
                               class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                               type="text"
                               name="subtitle"
                               value="<?php echo e(old('subtitle')); ?>"
                               required
                               placeholder="Ej: Ecuaciones de primer grado">
                    </div>
                    <?php $__errorArgs = ['subtitle'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-red-500 text-sm"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <!-- Descripción -->
                <div class="mb-6">
                    <label class="block text-gray-700 text-sm font-bold mb-2">Descripción</label>
                    <div class="relative">
                        <span class="absolute top-3 left-0 pl-3 text-gray-400">
                            <i class="fas fa-align-left"></i>
                        </span>
                        <textarea id="description"
                                  class="w-full pl-10 pr-3 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                  name="description"
                                  rows="6"
                                  required
                                  placeholder="Describe el tema matemático detalladamente..."><?php echo e(old('description')); ?></textarea>
                    </div>
                    <?php $__errorArgs = ['description'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?>
                        <p class="mt-2 text-red-500 text-sm"><?php echo e($message); ?></p>
                    <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
                </div>

                <div class="flex space-x-4">
                    <button type="submit" class="flex-1 bg-gradient-to-r from-indigo-500 to-purple-600 text-white font-bold py-3 px-4 rounded-lg hover:from-indigo-600 hover:to-purple-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 transition duration-300">
                        <i class="fas fa-save mr-2"></i>
                        Guardar Tema
                    </button>
                    <a href="<?php echo e(route('dashboard')); ?>" class="flex-1 bg-gray-500 text-white font-bold py-3 px-4 rounded-lg hover:bg-gray-600 focus:outline-none focus:ring-2 focus:ring-gray-500 transition duration-300 text-center">
                        <i class="fas fa-times mr-2"></i>
                        Cancelar
                    </a>
                </div>
            </form>
        </div>
    </div>

    <script>
        function previewImage(input) {
            const preview = document.getElementById('imagePreview');
            if (input.files && input.files[0]) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.innerHTML = `
                        <img src="${e.target.result}" class="w-full h-full object-cover rounded-lg">
                    `;
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
    </script>
</body>
</html>
<?php /**PATH C:\Users\thebo\Desktop\Proyecto VSC\Ana-Laravel\mini-project\resources\views/topics/create.blade.php ENDPATH**/ ?>