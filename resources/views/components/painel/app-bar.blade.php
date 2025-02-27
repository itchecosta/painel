<div class="app-bar">
    <div class="app-bar-left">
        {{-- <img src="{{ asset('img/logo/logo.webp') }}" alt="Logo Painel" height="71px"> --}}
        <h5>Painel de Controle</h5>
    </div>
    
    <div class="app-bar-icons">
        <i class="fas fa-bell"></i> <!-- Ícone de notificação -->
        <i class="fas fa-cog"></i> <!-- Ícone de configurações -->
        <form action="{{ route('logout') }}" method="GET">
            @csrf
            <button type="submit" style="color: white; background: none; border: none; padding: 0; cursor: pointer;">
                <i class="fas fa-sign-out-alt"></i> 
            </button>
            {{-- <i class="fas fa-sign-out-alt"></i> <!-- Ícone de logout --> --}}
        </form>
    </div>
</div>