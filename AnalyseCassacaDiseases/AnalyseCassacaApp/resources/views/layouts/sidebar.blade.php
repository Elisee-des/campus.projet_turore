<ul class="navbar-nav" id="navbar-nav">
    <li class="menu-title"><span data-key="t-menu">Menu</span></li>
    <li class="nav-item">
        <a class="nav-link menu-link" href="{{ route('tableaudebord') }}">
            <i class="ri-dashboard-2-line"></i>
            <span data-key="t-dashboards">Tableau de bord</span>
        </a>
    </li>
    <li class="nav-item">
        <a href="#sidebarProjects" class="nav-link" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="sidebarProjects" data-key="t-projects">
            <i class="bx bx-layer"></i>
            <span data-key="t-layer">Ontologies</span>
        </a>
        <div class="collapse menu-dropdown" id="sidebarProjects">
            <ul class="nav nav-sm flex-column">
                <li class="nav-item">
                    <a href="{{ route('ontologies.index') }}" class="nav-link" data-key="t-list"> Liste
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('ontologies.create') }}" class="nav-link" data-key="t-create-project"> Nouvelle Ontologie </a>
                </li>
            </ul>
        </div>
    </li>
    {{-- <li class="nav-item">
        <a class="nav-link menu-link" href="{{ route('analyses.index') }}">
            <i class="bx bx-slider-alt"></i>
            <span data-key="t-slider-alt">Analyses</span>
        </a>
    </li> --}}
    <li class="nav-item">
        <a class="nav-link menu-link" href="{{ route('bankimages.index') }}">
            <i class="bx bx-coin-stack"></i>
            <span data-key="t-coin-stack">Banque d'images</span>
        </a>
    </li>
    <li class="nav-item">
        <a class="nav-link menu-link" href="{{ route('parametre-index') }}">
            <i class="bx bxs-cog"></i>
            <span data-key="t-cog">Paramètre</span>
        </a>
    </li>
</ul>
