<nav class="drawer" id="sidebar">
    <div class="drawer-header">
        <div class="w-100">
            <div class="text-center">
                <img src="{{ asset('img/logo/logo2-.png') }}" alt="Logo Painel" height="90px" class="d-block mx-auto">
            </div>
        </div>
    </div>
    
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link" href="{{ route('painel') }}">
                <i class="fas fa-tachometer-alt"></i> Home
            </a>
        </li>

        <li class="nav-item">
            <a class="nav-link toggle-submenu" href="#">
                <i class="fas fa-newspaper"></i> Gerenciar Postagem
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu">
                <li><a class="nav-link" href="{{ route('autor-grid') }}"><i class="fas fa-users"></i> Gerenciar Autores</a></li>
                <li><a class="nav-link" href="{{ route('categoria-grid') }}"><i class="fas fa-folder-open"></i> Gerenciar Categorias</a></li>
                <li><a class="nav-link" href="{{ route('tipo-grid') }}"><i class="fas fa-tags"></i> Tipos de Postagem</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link toggle-submenu" href="#">
                <i class="fas fa-images"></i> Gerenciar Banner
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu">
                <li><a class="nav-link" href="{{ route('banner-grid') }}"><i class="fas fa-search"></i> Consultar</a></li>
                <li><a class="nav-link" href="{{ route('banner-create') }}"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link toggle-submenu" href="#">
                <i class="fas fa-file-alt"></i> Gerenciar Páginas
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu">
                <li><a class="nav-link" href="{{ route('pagina-grid') }}"><i class="fas fa-search"></i> Consultar</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link toggle-submenu" href="#">
                <i class="fas fa-blog"></i> Gerenciar Blog
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu">
                <li><a class="nav-link" href="{{ route('blog-grid') }}"><i class="fas fa-search"></i> Consultar</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-plus-circle"></i> Cadastrar</a></li>
            </ul>
        </li>

        <li class="nav-item">
            <a class="nav-link toggle-submenu" href="#">
                <i class="fas fa-cogs"></i> Configurações
                <i class="fas fa-chevron-down submenu-icon"></i>
            </a>
            <ul class="submenu">
                <li><a class="nav-link" href="#"><i class="fas fa-tools"></i> Geral</a></li>
                <li><a class="nav-link" href="#"><i class="fas fa-sliders-h"></i> Avançado</a></li>
            </ul>
        </li>
    </ul>
</nav>
