<div>
    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contests' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="icofont-chart-line-alt"></i>
            Concursos
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Companies' ? 'nav-active text-white' : '' }}"
            href="{{ route('companies.index') }}">
            <i class="icofont-company"></i>
            Companhias
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Employees' ? 'nav-active text-white' : '' }}"
            href="{{ route('employees.index') }}">
            <i class="fas fa-people-carry"></i>
            Funcionários
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-store"></i>
            Lojas Fornecedoras
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="icofont-document-folder"></i>
            Documentos
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="icofont-workers-group"></i>
            Tarefas
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-user-cog"></i>
            Actividades
        </a>
    </li>
</div>
