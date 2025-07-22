<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Batamia Art - Admin Dashboard</title>
    @vite('resources/css/app.css')
    <script src="https://kit.fontawesome.com/af96158b7b.js" crossorigin="anonymous"></script>
    <script>
        function initTheme() {
            const savedTheme = localStorage.getItem('theme') || 'light';
            document.documentElement.className = savedTheme;
        }

        function toggleTheme() {
            const currentTheme = document.documentElement.className;
            const newTheme = currentTheme === 'dark' ? 'light' : 'dark';

            document.documentElement.className = newTheme;
            localStorage.setItem('theme', newTheme);

            updateThemeIndicator(newTheme);
        }

        function updateThemeIndicator(theme) {
            const icon = document.getElementById('theme-icon');
            icon.className = theme === 'dark' ?
                'fas fa-sun text-yellow-500 text-2xl drop-shadow-md' :
                'fas fa-moon text-gray-600 text-2xl';
        }

        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        function closeSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');

            sidebar.classList.add('-translate-x-full');
            overlay.classList.add('hidden');
        }

        document.addEventListener('click', function(event) {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('mobile-overlay');
            const menuButton = document.querySelector('[onclick="toggleSidebar()"]');

            if (!sidebar.contains(event.target) &&
                event.target !== menuButton &&
                !menuButton.contains(event.target) &&
                !overlay.classList.contains('hidden')) {
                closeSidebar();
            }
        });

        document.addEventListener('DOMContentLoaded', () => {
            initTheme();
            updateThemeIndicator(document.documentElement.className);
        });
    </script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11.22.0/dist/sweetalert2.all.min.js"></script>
    <script src="{{ asset('') }}js/custom.js"></script>
    @stack('styles')

</head>

<body class="font-sans">
    <div id="mobile-overlay" class="fixed inset-0 bg-black bg-opacity-30 z-40 hidden lg:hidden" onclick="closeSidebar()">
    </div>
    <!-- Sidebar -->
    @include('layouts.components.sidebar')

    <!-- Main Content -->
    <main class="lg:ml-64 min-h-screen" style="background-color: var(--surface-color);">
        <!-- Top Navigation -->
        @include('layouts.components.topbar')

        <!-- Dashboard Content -->
        <div class="p-6">
            <!-- Stats Cards -->
            @yield('content')
        </div>
    </main>
    @include('layouts.components.logout')
    <script>
        function confirmLogout() {
            const url = '{{ route('logout') }}';
            const method = 'POST';

            const successCallback = function(response) {
                handleSuccess(response);
                closeModal("logoutModal");
                window.location.reload();
            };

            const errorCallback = function(error) {
                handleValidationErrors(error);
            };

            ajaxCall(url, "POST", null, successCallback, errorCallback);
        }
    </script>
    @stack('scripts')
</body>

</html>
