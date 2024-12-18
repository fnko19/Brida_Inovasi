<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inovasi BRIDA Kota Makassar</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>  
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
    <style>
        body {
            background-image: url('{{ asset("images/login.jpg") }}');
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>
</head>
<body class="min-h-screen flex justify-center items-center">
    <div class="bg-white w-full max-w-md space-x-8 py-8 px-16 rounded-lg shadow-md">
        <div class="p-4">
            <h2 class="text-2xl text-center font-bold text-gray-800 mt-6 mb-4">Sign In</h2>
            <p class="text-gray-600 text-lg text-center mb-4">Silakan login terlebih dahulu</p>

            <!-- Form Login -->
            <form method="POST" action="{{ route('login') }}" id="login-form">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block text-lg font-medium pb-2 text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required />
                </div>

                <div class="mb-6">
                    <label for="password" class="block text-lg font-medium pb-2 text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-3 py-2 border border-gray-300 rounded-lg" required />
                </div>

                <button type="submit" class="w-full bg-blue-600 text-white py-2 rounded-lg font-bold hover:bg-blue-400">Sign In</button>
            </form>

            <p class="mt-6 text-md text-center">
                <a class="text-blue-500 text-md">Belum punya akun? </a>
                <a href="https://wa.me/6282191190039" class="text-blue-500 text-md hover:underline">Hubungi Admin</a>
            </p>
        </div>
    </div>

    <script>
    // Handle form submission via AJAX
    document.getElementById('login-form').addEventListener('submit', function(e) {
        e.preventDefault();

        // Create FormData object from the form
        const formData = new FormData(this);

        // Send POST request to the login route
        axios.post('{{ route('login') }}', formData)
            .then(function(response) {
                // Redirect to landing-page on success
                window.location.href = '{{ route('landing') }}';
            })
            .catch(function(error) {
                // Use SweetAlert2 to display the error message
                if (error.response && error.response.data && error.response.data.message) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Maaf...',
                        text: error.response.data.message,
                    });
                } else {
                    Swal.fire({
                        icon: 'error',
                        title: 'Maaf...',
                        text: 'An error occurred. Please try again.',
                    });
                }
            });
    });
    </script>
</body>
</html>
