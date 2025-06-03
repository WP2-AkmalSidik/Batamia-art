<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dark/Light Mode</title>
    @vite('resources/css/app.css')
    <script>
        // 1. Inisialisasi tema
        function initTheme() {
            // Abaikan preferensi sistem, hanya gunakan localStorage
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.className = savedTheme;
        }
        
        // 2. Toggle tema
        function toggleTheme() {
            const currentTheme = document.documentElement.className;
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
            
            document.documentElement.className = newTheme;
            localStorage.setItem('theme', newTheme);
            
            updateThemeIndicator(newTheme);
        }
        
        // 3. Update UI indicator
        function updateThemeIndicator(theme) {
            document.getElementById('theme-icon').textContent = theme === 'dark' ? '☀️' : '🌙';
            document.getElementById('theme-text').textContent = theme === 'dark' ? 'Light Mode' : 'Dark Mode';
        }
        
        // Jalankan saat load
        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            updateThemeIndicator(document.documentElement.className);
        });
    </script>
</head>
<body>
    <div class="min-h-screen p-4">
        <!-- Toggle Button -->
        <button onclick="toggleTheme()" 
                class="fixed top-4 right-4 p-3 bg-gray-200 dark:bg-gray-700 rounded-full shadow-lg">
            <span id="theme-icon">🌙</span>
            <span id="theme-text" class="ml-2">Dark Mode</span>
        </button>
        
        <!-- Content -->
        <div class="max-w-md mx-auto mt-16 card">
            <h1 class="text-2xl font-bold mb-4">Tema Mandiri</h1>
            <p class="mb-6">Tema ini TIDAK mengikuti sistem operasi Anda.</p>
            <button class="px-4 py-2 bg-blue-500 text-white rounded hover:bg-blue-600">
                Contoh Tombol
            </button>
        </div>
    </div>
</body>
</html>