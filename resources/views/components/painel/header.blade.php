<nav class="drawer" id="sidebar">
  <div class="drawer-header">
    <div class="w-100">
        <div class="text-center">
            <img src="{{ asset('img/logo/logo.webp') }}" alt="Logo Painel" height="71px" class="d-block mx-auto">
            <h5 class="mt-3">Painel de Controle</h5>
        </div>
    </div>
  </div>
  
  <ul class="nav flex-column">
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-home"></i> Home
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-user"></i> Perfil
        </a>
        <ul class="submenu">
            <li><a class="nav-link" href="#">Subitem 1</a></li>
            <li><a class="nav-link" href="#">Subitem 2</a></li>
        </ul>
    </li>
    <li class="nav-item">
        <a class="nav-link" href="#">
            <i class="fas fa-cog"></i> Configurações
        </a>
        <ul class="submenu">
            <li><a class="nav-link" href="#">Geral</a></li>
            <li><a class="nav-link" href="#">Avançado</a></li>
        </ul>
    </li>
  </ul>
</nav>


<script>
  document.querySelectorAll('.nav-item > .nav-link').forEach(item => {
      item.addEventListener('click', function(e) {
          e.preventDefault();
          const submenu = this.nextElementSibling;
          if (submenu && submenu.classList.contains('submenu')) {
              submenu.style.display = submenu.style.display === 'block' ? 'none' : 'block';
          }
      });
  });
</script>

<style>
.submenu {
    list-style: none;
    padding: 0;
    margin: 0;
    display: none; /* Esconde o submenu por padrão */
    padding-left: 20px; /* Indenta os submenus */
}

.nav-item:hover .submenu {
    display: block; /* Mostra o submenu ao passar o mouse no item principal */
}

.submenu .nav-link {
    font-size: 0.9em; /* Reduz um pouco o tamanho da fonte dos submenus */
    padding: 5px 10px;
    background-color: #e9ecef; /* Cor de fundo para submenus */
    margin-top: 2px;
    border-radius: 4px;
}

.submenu .nav-link:hover {
    background-color: #dcdcdc; /* Cor de destaque ao passar o mouse nos submenus */
}

</style>