<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovasi BRIDA Kota Makassar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body {
            background-image: url('{{ asset("images/backgorunf-welcome.png") }}');
            background-size: cover;
            background-repeat: no-repeat; 
            background-position: center; 
        }
    </style>
</head>
@section('title', 'Inovasi BRIDA Kota Makassar')
<body class="flex justify-center items-center min-h-screen">
    <div class="text-center max-w-3xl px-4  p-6 rounded-lg">
        <!-- Logo Section -->
        <div class="flex justify-center gap-6 mb-6">
            <img src="{{ asset('images/logo-brida.png') }}" alt="Logo BRIDA" class="h-20">
            <img src="{{ asset('images/logo-makassar.png') }}" alt="Logo Makassar" class="h-20">
        </div>
        
        <!-- Title and Subtitle -->
        <h1 class="text-2xl font-bold mb-4">
            Dashboard<br>Badan Riset dan Inovasi Daerah Kota Makassar
        </h1>
        <p class="text-lg text-gray-600 mb-8">
            Pusat riset dan inovasi untuk kemajuan kota Makassar
        </p>
        
        <!-- Button -->
        <a href="{{ route('login') }}" class="inline-block px-6 py-3 text-white bg-blue-500 hover:bg-blue-600 rounded-lg text-lg font-medium">
            Masuk Sekarang
        </a>
    </div>
</body>
</html>
