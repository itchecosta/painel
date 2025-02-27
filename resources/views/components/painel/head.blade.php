<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Painel de Controle</title>
<link rel="shortcut icon" href="{{asset('img/logo/favicon.ico')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css" rel="stylesheet">
<link href="https://cdn.datatables.net/2.1.8/css/dataTables.bootstrap5.css" rel="stylesheet">
<link href="/styles.css" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/quill@2.0.3/dist/quill.snow.css" rel="stylesheet" />
<link
  rel="stylesheet"
  href="https://cdnjs.cloudflare.com/ajax/libs/highlight.js/11.9.0/styles/atom-one-dark.min.css"
/>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/katex@0.16.9/dist/katex.min.css" />

{{-- select 2 --}}
<!-- Styles -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" />
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.min.css" />
<!-- Or for RTL support -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/select2-bootstrap-5-theme@1.3.0/dist/select2-bootstrap-5-theme.rtl.min.css" />

<!-- Scripts -->
<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.0/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.full.min.js"></script>

<style>
    body {
        margin: 0; 
        display: flex;
        min-height: 100vh;
        overflow: scroll; 
    }
    .drawer {
        width: 250px;
        background-color: #222d32;
        border-right: 1px solid #000000;
        position: fixed;
        top: 0;
        bottom: 0;
        left: 0;
    }
    .nav-link {
        display: flex;
        align-items: center; 
        font-weight: 500;
        color: #dbd6d6; 
        text-decoration: none;
        padding: 10px 15px;
        border-radius: 4px;
        transition: background-color 0.2s ease;
    }
    .nav-link i {
        margin-right: 10px; 
        font-size: 1em; 
    }
    .nav-link:hover {
        background-color: #bcbcbd; 
    }
    .nav-link.active {
        background-color: #ffffff;
        color: #3c8dbc;
    }
    .drawer-header {
        padding: 0.7rem;
        border-bottom: 1px solid #3c8dbc;
    }
    .submenu {
        list-style: none;
        padding: 0;
        margin: 0;
        display: none; 
        padding-left: 20px; 
    }
    .nav-item .submenu-icon {
        margin-left: auto;
        transition: transform 0.2s ease; 
    }
    .nav-item.open .submenu {
        max-height: 300px; /* Valor suficiente para exibir todos os itens */
    }
    .nav-item .submenu-icon.open {
        transform: rotate(180deg); 
    }
    .submenu .nav-link {
        font-size: 0.9em; 
        padding: 5px 10px;
        background-color: #2c3b41; 
        margin-top: 2px;
        border-radius: 4px;
    }

    .submenu .nav-link:hover {
        background-color: #dcdcdc; 
    }
    .app-bar {
        position: fixed;
        top: 0;
        left: 250px;
        width: calc(100% - 250px); 
        height: 56px;
        background-color: #2c3b41;
        color: white;
        display: flex;
        align-items: center;
        padding: 0 20px;
        box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1); 
        z-index: 1000;
        justify-content: space-between; 
    }

    .app-bar-icons {
        display: flex;
        align-items: center;
        gap: 15px; 
    }

    .app-bar-icons i {
        font-size: 1.2em; 
        cursor: pointer;
        padding: 8px;
        border-radius: 50%; 
        transition: background-color 0.3s ease, transform 0.3s ease; 
    }

    .app-bar-icons i:hover {
        background-color: #e9ecef; 
        color: #3c8dbc; 
    }

    .content {
        margin-left: 250px; 
        flex: 1;
        padding: 20px;
        overflow: auto;
    }
    .full-screen-container {
        height: 100vh;  
        display: flex; 
        justify-content: center; 
        align-items: center; 
        text-align: center;  
    }
    #example_wrapper {
        overflow: auto;
    }
    table {
        width: 100%; 
    }
    #example thead th {
        background-color: #3c8dbc;
        color: white;
    }
    .main-content {
        margin-top: 56px;
        height: calc(100vh - 56px); 
        overflow: auto;
    }
    .w-100 {
        width: 100%; 
    }
</style>
