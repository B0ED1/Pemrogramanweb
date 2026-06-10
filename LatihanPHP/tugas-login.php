<?php
$username = '';
$err_msg = '';
$sukses_msg = '';

if (isset($_POST['btn_login'])) {
    $username = trim($_POST['username'] ?? '');
    $password = $_POST['password'] ?? '';

    if ($username === '' || $password === '') {
        $err_msg = "Username dan Password harus diisi.";
    } else if ($username === 'admin' && $password === '12345') {
        $sukses_msg = "Login berhasil!";
    } else {
        $err_msg = "Username atau password salah.";
    }
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 h-screen flex items-center justify-center">

    <div class="bg-white p-7 rounded-xl shadow-md w-full max-w-sm border border-gray-100">
        <h2 class="text-2xl font-bold text-gray-800 text-center mb-6">Login To Your Account</h2>

        <?php if ($err_msg): ?>
            <div class="bg-red-50 text-red-600 px-3 py-2 rounded-md mb-4 text-sm border border-red-200">
                <?= $err_msg; ?>
            </div>
        <?php endif; ?>

        <?php if ($sukses_msg): ?>
            <div class="bg-green-50 text-green-600 px-3 py-2 rounded-md mb-4 text-sm border border-green-200">
                <?= $sukses_msg; ?>
            </div>
        <?php endif; ?>

        <form action="" method="POST">
            <div class="mb-4">
                <label for="username" class="block text-sm font-medium text-gray-700 mb-1">Username or Email</label>
                <input type="text" name="username" id="username" 
                    value="<?= htmlspecialchars($username) ?>" 
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                    placeholder="Ketik username...">
            </div>

            <div class="mb-5">
                <label for="password" class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <input type="password" name="password" id="password" 
                    class="w-full border border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:border-blue-500 focus:ring-1 focus:ring-blue-500" 
                    placeholder="Ketik password...">
            </div>
            
            <div class="mb-6 flex items-center">
                <input type="checkbox" id="remember" name="remember" class="w-4 h-4 text-blue-600 border-gray-300 rounded">
                <label for="remember" class="ml-2 text-sm text-gray-600 select-none cursor-pointer">
                    Remember Me
                </label>
            </div>

            <button type="submit" name="btn_login" 
                class="w-full bg-blue-600 text-white font-medium py-2 rounded-lg hover:bg-blue-700 transition-colors">
                Login
            </button>
        </form>
    </div>

</body>
</html>