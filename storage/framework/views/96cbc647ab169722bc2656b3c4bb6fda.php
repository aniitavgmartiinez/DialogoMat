<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="min-h-screen bg-gradient-to-br from-indigo-500 to-purple-600 pb-20">
    <nav class="bg-white shadow-md fixed top-0 left-0 right-0 z-50">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16 items-center">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-graduation-cap text-indigo-500 text-2xl"></i>
                    <span class="font-bold text-xl text-gray-800">DialogoMat</span>
                </div>
                <div class="flex items-center space-x-4">
                    <span class="text-gray-700 font-medium"><?php echo e(auth()->user()->name); ?></span>
                    <a href="<?php echo e(route('topics.create')); ?>" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-4 py-2 rounded-lg hover:from-indigo-600 hover:to-purple-700 transition duration-300 font-medium">
                        <i class="fas fa-plus mr-2"></i>
                        Crear Tema
                    </a>
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

    <?php if(session('success')): ?>
        <div class="max-w-7xl mx-auto mt-4 px-4">
            <div class="p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                <?php echo e(session('success')); ?>

            </div>
        </div>
    <?php endif; ?>

    <div class="max-w-7xl mx-auto py-24 px-4">
        <div class="bg-white rounded-2xl shadow-2xl p-8 mb-8">
            <div class="flex items-center justify-between">
                <div>
                    <h2 class="text-2xl font-bold text-gray-800">Temas Matematicos</h2>
                    <p class="text-gray-500">Comunidad de aprendizaje</p>
                </div>
                <div class="text-right">
                    <span class="text-4xl font-bold text-indigo-500"><?php echo e($topicsCount); ?></span>
                    <p class="text-gray-600">Tema(s) creado(s)</p>
                </div>
            </div>
        </div>

        <div class="flex gap-6 overflow-x-auto pb-4">
            <?php $__empty_1 = true; $__currentLoopData = $topics; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $topic): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="flex-shrink-0 w-96 bg-white rounded-2xl shadow-xl overflow-hidden hover:shadow-2xl transition duration-300">
                    <?php if($topic->image): ?>
                        <div class="h-48 overflow-hidden">
                            <img src="<?php echo e(asset($topic->image)); ?>" alt="<?php echo e($topic->title); ?>" class="w-full h-full object-cover">
                        </div>
                    <?php else: ?>
                        <div class="h-48 bg-gradient-to-br from-indigo-400 to-purple-500 flex items-center justify-center">
                            <i class="fas fa-calculator text-white text-5xl"></i>
                        </div>
                    <?php endif; ?>
                    <div class="p-6">
                        <h3 class="text-xl font-bold text-gray-800 mb-2 truncate"><?php echo e($topic->title); ?></h3>
                        <p class="text-indigo-600 font-medium text-sm mb-2 truncate"><?php echo e($topic->subtitle); ?></p>
                        <p class="text-gray-600 text-sm mb-4 line-clamp-3"><?php echo e($topic->description); ?></p>
                        
                        <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                            <div class="flex items-center">
                                <i class="fas fa-user mr-2"></i>
                                <span><?php echo e($topic->user->name); ?></span>
                            </div>
                            <div class="flex items-center">
                                <i class="fas fa-comments mr-2"></i>
                                <span><?php echo e($topic->comments->count()); ?> comentario(s)</span>
                            </div>
                        </div>

                        <?php if($topic->comments->count() > 0): ?>
                            <div class="bg-gray-50 rounded-lg p-4 mb-4">
                                <h4 class="font-bold text-gray-800 text-sm mb-3 flex items-center justify-between">
                                    <span>
                                        <i class="fas fa-comment-alt mr-2"></i>
                                        Todos los comentarios (<?php echo e($topic->comments->count()); ?>)
                                    </span>
                                    <a href="<?php echo e(route('topics.show', $topic->id)); ?>" class="text-xs bg-indigo-600 text-white px-3 py-1 rounded hover:bg-indigo-700 transition duration-300">
                                        Ver todos
                                    </a>
                                </h4>
                                <div class="space-y-3">
                                    <?php $__currentLoopData = $topic->comments->take(3); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $comment): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                        <div class="flex items-start space-x-3">
                                            <div class="w-8 h-8 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold text-sm flex-shrink-0">
                                                <?php echo e(substr($comment->user->name, 0, 1)); ?>

                                            </div>
                                            <div class="flex-1 min-w-0">
                                                <p class="text-sm text-gray-700 font-medium"><?php echo e($comment->user->name); ?></p>
                                                <p class="text-xs text-gray-500 mb-1"><?php echo e($comment->created_at->diffForHumans()); ?></p>
                                                <p class="text-sm text-gray-600 line-clamp-2"><?php echo e($comment->content); ?></p>
                                            </div>
                                        </div>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    <?php if($topic->comments->count() > 3): ?>
                                        <div class="text-center text-xs text-indigo-600">
                                            <p>...y <?php echo e($topic->comments->count() - 3); ?> comentario(s) más</p>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        <?php endif; ?>

                        <div class="bg-indigo-50 rounded-lg p-4 mb-4">
                            <h4 class="font-bold text-gray-800 text-sm mb-2">
                                <i class="fas fa-edit mr-2"></i>
                                Agregar Comentario
                            </h4>
                            <form method="POST" action="<?php echo e(route('comments.store')); ?>" class="flex space-x-2">
                                <?php echo csrf_field(); ?>
                                <input type="hidden" name="topic_id" value="<?php echo e($topic->id); ?>">
                                <input type="text"
                                       name="content"
                                       class="flex-1 min-w-0 px-3 py-2 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent text-sm"
                                       placeholder="Escribe tu comentario..."
                                       required
                                       maxlength="200">
                                <button type="submit" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300 font-medium text-sm">
                                    <i class="fas fa-paper-plane"></i>
                                </button>
                            </form>
                        </div>

                        <a href="<?php echo e(route('topics.show', $topic->id)); ?>" class="block w-full bg-gradient-to-r from-indigo-500 to-purple-600 text-white text-center py-2 rounded-lg font-bold hover:from-indigo-600 hover:to-purple-700 transition duration-300">
                            <i class="fas fa-eye mr-2"></i>
                            Ver Tema Completo
                        </a>
                    </div>
                </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <div class="flex-shrink-0 w-full bg-white rounded-2xl shadow-2xl p-12 text-center">
                    <i class="fas fa-folder-open text-6xl text-white mb-6"></i>
                    <h3 class="text-3xl font-bold text-white mb-4">No hay temas aun</h3>
                    <p class="text-white/80 mb-6 text-lg">Sé el primero en crear un tema matematico</p>
                    <a href="<?php echo e(route('topics.create')); ?>" class="inline-block bg-white text-indigo-600 px-8 py-3 rounded-lg font-bold hover:bg-gray-100 transition duration-300">
                        <i class="fas fa-plus mr-2"></i>
                        Crear Primer Tema
                    </a>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
<?php /**PATH C:\Users\thebo\Desktop\Proyecto VSC\Ana-Laravel\mini-project\resources\views/dashboard.blade.php ENDPATH**/ ?>