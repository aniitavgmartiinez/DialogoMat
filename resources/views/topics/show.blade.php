<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $topic->title }}</title>
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
                    <a href="{{ route('dashboard') }}" class="bg-indigo-600 text-white px-4 py-2 rounded-lg hover:bg-indigo-700 transition duration-300 font-medium">
                        <i class="fas fa-book mr-2"></i>
                        Temas
                    </a>
                    <a href="{{ route('topics.create') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Crear Tema</a>
                    <a href="{{ route('dashboard') }}" class="text-indigo-600 hover:text-indigo-800 font-medium">Dashboard</a>
                    <form method="POST" action="{{ route('logout') }}" class="inline">
                        @csrf
                        <button type="submit" class="text-red-600 hover:text-red-800 font-medium">
                            <i class="fas fa-sign-out-alt mr-1"></i>
                            Salir
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </nav>

    <div class="max-w-5xl mx-auto py-8 px-4">
        @if (session('success'))
            <div class="mb-4 p-4 bg-green-100 border border-green-400 text-green-700 rounded-lg">
                {{ session('success') }}
            </div>
        @endif

        @if (session('error'))
            <div class="mb-4 p-4 bg-red-100 border border-red-400 text-red-700 rounded-lg">
                {{ session('error') }}
            </div>
        @endif
        @if($topic->image)
            <div class="bg-white rounded-2xl shadow-2xl overflow-hidden mb-6">
                <img src="{{ asset($topic->image) }}" alt="{{ $topic->title }}" class="w-full h-64 md:h-96 object-cover">
            </div>
        @endif

        <div class="bg-white rounded-2xl shadow-2xl p-8 mb-6">
            <div class="mb-6">
                <h1 class="text-4xl font-bold text-gray-800 mb-2">{{ $topic->title }}</h1>
                <h2 class="text-2xl text-indigo-600 font-medium mb-4">{{ $topic->subtitle }}</h2>
                <div class="flex items-center text-gray-500 text-sm">
                    <i class="fas fa-user mr-2"></i>
                    <span>Creado por <strong>{{ $topic->user->name }}</strong></span>
                    <span class="mx-4">•</span>
                    <i class="fas fa-calendar mr-2"></i>
                    <span>{{ $topic->created_at->format('d/m/Y') }}</span>
                </div>
            </div>
            <div class="prose max-w-none">
                <p class="text-gray-700 leading-relaxed">{{ $topic->description }}</p>
            </div>
        </div>

        <div class="bg-white rounded-2xl shadow-2xl p-8">
            <div class="flex justify-between items-center mb-6">
                <h3 class="text-2xl font-bold text-gray-800">Comentarios ({{ $topic->comments->count() }})</h3>
            </div>

            <div class="mb-6">
                <form method="POST" action="{{ route('comments.store') }}">
                    @csrf
                    <input type="hidden" name="topic_id" value="{{ $topic->id }}">
                    <div class="mb-4">
                        <textarea name="content"
                                  class="w-full p-4 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:border-transparent"
                                  rows="3"
                                  required
                                  placeholder="Escribe tu comentario..."></textarea>
                    </div>
                    <button type="submit" class="bg-gradient-to-r from-indigo-500 to-purple-600 text-white px-6 py-2 rounded-lg font-bold hover:from-indigo-600 hover:to-purple-700 transition duration-300">
                        <i class="fas fa-comment mr-2"></i>
                        Publicar Comentario
                    </button>
                </form>
            </div>

            <div class="space-y-4">
                @forelse($topic->comments as $comment)
                    <div class="bg-gray-50 rounded-xl p-6">
                        <div class="flex items-center mb-3">
                            <div class="w-10 h-10 bg-indigo-500 rounded-full flex items-center justify-center text-white font-bold text-lg mr-3">
                                {{ substr($comment->user->name, 0, 1) }}
                            </div>
                            <div>
                                <h4 class="font-bold text-gray-800">{{ $comment->user->name }}</h4>
                                <span class="text-gray-500 text-sm">{{ $comment->created_at->diffForHumans() }}</span>
                            </div>
                        </div>
                        <p class="text-gray-700">{{ $comment->content }}</p>
                    </div>
                @empty
                    <div class="text-center py-8 text-gray-500">
                        <i class="fas fa-comments text-4xl mb-4"></i>
                        <p>Aún no hay comentarios. ¡Sé el primero en comentar!</p>
                    </div>
                @endforelse
            </div>
        </div>
    </div>
</body>
</html>
