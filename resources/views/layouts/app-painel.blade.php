<!DOCTYPE html>
<html lang="pt-BR">
    @include('components.painel.head')
<body>

    <main class="content mt-5">
        <!-- Drawer -->
        @include('components.painel.navigation-drawer')
        
        
        <!-- Conteúdo Principal -->
        @include('components.painel.app-bar')
        
        @yield('content')
    </main>

    <!-- Scripts -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.querySelectorAll('.toggle-submenu').forEach(item => {
            item.addEventListener('click', function (e) {
                e.preventDefault(); // Evita o redirecionamento
                const submenu = this.nextElementSibling;
                const icon = this.querySelector('.submenu-icon');
    
                if (submenu && submenu.classList.contains('submenu')) {
                    submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
    
                    // Alterna a classe para girar o ícone
                    if (icon) {
                        icon.classList.toggle('open');
                    }
                }
            });
        });

        document.querySelectorAll('.submenu .nav-link').forEach(item => {
        item.addEventListener('click', function() {
            document.querySelectorAll('.submenu .nav-link').forEach(link => {
                link.classList.remove('active');
            });
            
            item.classList.add('active');
        });
    });
    </script>
    @yield('scripts-painel')
</body>
</html>