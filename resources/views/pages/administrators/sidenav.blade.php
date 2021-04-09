<div>
    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contests' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-user-cog"></i>
            Concursos
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Companies' ? 'nav-active text-white' : '' }}"
            href="{{ route('companies.index') }}">
            <i class="fas fa-user-cog"></i>
            Companhias
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-user-cog"></i>
            Funcionários
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-user-cog"></i>
            Lojas Fornecedoras
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-user-cog"></i>
            Documentos
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link {{ $elementActive == 'Contest' ? 'nav-active text-white' : '' }}"
            href="javascript:void(0)">
            <i class="fas fa-user-cog"></i>
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
