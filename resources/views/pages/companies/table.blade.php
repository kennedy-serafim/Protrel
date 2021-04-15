<div>
    @if (Session::has('message'))
    @include('layouts.custom.alert',[
        'message' => Session::get('message'),
        'alertType'=>Session::get('type')
        ])
    @endif
    

    {{-- Close your eyes. Count to one. That is how long forever feels. --}}
    <h6 class="heading-small text-muted">Mecanismo de Pesquisa</h6>


    <div class="mt-3">
        <div class="row">
            <div class=" col-lg-7 col-md-6">
                <label class='form-control-label'>Pesquisar pelo nome</label>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control form-control-alternative" placeholder="Nome da companhia..."
                            type="text">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <label class='form-control-label'>Estado</label>
                <div class="form-group">
                    <select class="custom-select  input-group-alternative" wire:model='status'>
                        <option value="0" selected>Escolher um estado...</option>
                        @foreach ($companyStatus as $status)
                            <option value='{{ $status }}'>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3 my-lg-0">
        @if (count($companies))
            <h3 class="heading-small text- muted mb-2">
                Companhias Cadastradas
                <span class="badge badge-pill badge-danger">
                    {{ $total }}
                </span>
            </h3>

            <div class="table-responsive">
                <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th scope="col" class="text-white">Nome</th>
                            <th scope="col" class="text-white">NUIT</th>
                            <th scope="col" class="text-white">Email</th>
                            <th scope="col" class="text-white">Telefone</th>
                            <th scope="col" class="text-white">Responsável</th>
                            <th scope="col" class="text-white">Documentos</th>
                            <th scope="col" class="text-white">Funcionários</th>
                            <th scope="col" class="text-white">Opções</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($companies as $company)
                            <tr>
                                <td>{{ $company->name }}</td>
                                <td>{{ $company->nuit }}</td>
                                <td>{{ $company->email }}</td>
                                <td>{{ $company->phone }}</td>
                                <td>{{ $company->manager }}</td>
                                <td>
                                    <span class="badge badge-pill badge-default">0</span>
                                </td>
                                <td>
                                    @if (count($company->employees) > 0)
                                        <a href="javascript:void(0)" class="badge badge-pill badge-success"
                                            wire:click='action({{ $company->id }},"history")'>
                                            {{ count($company->employees) }}
                                        </a>
                                    @else
                                        <span class="badge badge-pill badge-default">0</span>
                                    @endif

                                </td>
                                <td class="d-flex justify-content-between">
                                    <a class='btn-sm tooltips text-warning' data-toggle="tooltip" data-placement="right"
                                        title="Atualizar dados " style='cursor: pointer;'
                                        href="{{ route('companies.edit', [$company->id]) }}">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a class="btn-sm tooltips text-danger deleteCompanyButton" data-toggle="modal"
                                        data-target="#deleteCompanyModal"
                                        data-attr="{{ route('companies.delete', $company->id) }}"
                                        title="Apagar registo" style='cursor: pointer;'>
                                        <i class="fas fa-trash text-danger  fa-lg"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{ $companies->links('layouts.custom.pagination-links') }}

        @else

            @include('layouts.notFound',[
            'message'=>'Ops! Nenhuma Companhia foi encontrada no Sistema.'
            ])

        @endif
    </div>

    <div class="modal fade" id="deleteCompanyModal" tabindex="-1" role="dialog"
        aria-labelledby="deleteCompanyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Operação</h5>

                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="spinner-border mx-auto " id="loader" role="status" aria-hidden="true"></div>

                <div id="companySmallBody">
                    <div>
                        <!-- the result to be displayed apply here -->
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
