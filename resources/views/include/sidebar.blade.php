<div class="sidebar pe-4 pb-3">
    <nav class="navbar bg-secondary navbar-dark">
        <a href="index.html" class="navbar-brand mx-4 mb-3">
            <h3 class="text-primary">
                {{-- <i class="fa fa-user-edit me-2"></i> --}}
                School Manager
            </h3>
        </a>
        <div class="d-flex align-items-center ms-4 mb-4">
            <div class="position-relative">
                <img class="rounded-circle" src="{{ asset('template/img/user.jpg') }}" alt="" style="width: 40px; height: 40px;">
                <div class="bg-success rounded-circle border-2 border-white position-absolute end-0 bottom-0 p-1"></div>
            </div>
            <div class="ms-3">
                <h6 class="mb-0">{{ Auth()->User()->name }}</h6>
                <span>Admin</span>
            </div>
        </div>
        <div class="navbar-nav w-100">
            <a href="index.html" class="nav-item nav-link"><i class="fa fa-tachometer-alt me-2"></i>Dashboard</a>
            <a href="{{ route('eleve') }}" class="nav-item nav-link"><i class="fa fa-th me-2"></i>Elèves</a>
            <a href="{{ route('maitre') }}" class="nav-item nav-link"><i class="fa fa-keyboard me-2"></i>Maîtres</a>
            <a href="{{ route('classe') }}" class="nav-item nav-link"><i class="fa fa-table me-2"></i>Classes</a>
            <a href="{{ route('annee-scolaire') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Années Scolaires</a>
            <a href="{{ route('parcour') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Parcours Eleves</a>
            <a href="{{ route('parcour-maitre') }}" class="nav-item nav-link"><i class="fa fa-chart-bar me-2"></i>Parcours Maîtres</a>
        </div>
    </nav>
</div>