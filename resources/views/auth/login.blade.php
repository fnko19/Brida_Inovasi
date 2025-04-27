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
    <div class="bg-white w-full max-w-sm sm:max-w-md py-8 px-6 sm:px-16 rounded-lg shadow-lg">
        <div class="p-2">
            <h2 class="text-xl sm:text-2xl text-center font-bold text-gray-800 mt-4 sm:mt-6 mb-3">Sign In</h2>
            <p class="text-gray-600 sm:text-lg text-center mb-4">Silakan login terlebih dahulu</p>

            <form method="POST" action="{{ route('login') }}" id="login-form">
                @csrf
                <div class="mb-4">
                    <label for="email" class="block sm:text-lg font-medium pb-1 sm:pb-2 text-gray-700">Email</label>
                    <input type="email" id="email" name="email" placeholder="Masukkan email" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm sm:text-base" required />
                </div>

                <div class="mb-6">
                    <label for="password" class="block sm:text-lg font-medium pb-1 sm:pb-2 text-gray-700">Password</label>
                    <input type="password" id="password" name="password" placeholder="Masukkan password" class="w-full px-3 py-2 border border-gray-300 rounded-lg text-sm sm:text-base" required />
                </div>

                <button type="submit" class="w-full bg-red-700 text-white py-2 rounded-lg font-bold text-sm sm:text-base hover:bg-red-400">Sign In</button>
            </form>

            <p class="mt-4 sm:mt-6 sm:text-md text-center">
                <a class="text-gray-700">Belum punya akun? </a>
                <a href="https://wa.me/6282343447786" class="text-red-500 hover:underline">Hubungi Admin</a>
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
