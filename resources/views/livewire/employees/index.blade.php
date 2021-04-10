<div>
    {{-- Nothing in the world is as soft and yielding as water. --}}

    <h6 class="heading-small text-muted">Mecanismo de Pesquisa</h6>
    <div class="mt-3">
        <div class="row">
            <div class=" col-lg-4 col-md-6">
                <label class='form-control-label'>Pesquisar pelo nome</label>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control form-control-alternative" placeholder="Nome do funcionário"
                            type="text" wire:model.debounce="name">
                    </div>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <label class='form-control-label'>Nome da empresa</label>
                <div class="form-group">
                    <select class="custom-select  input-group-alternative" wire:model='company'>
                        <option value="0" selected>Escolhe uma Empresa...</option>
                        @foreach ($companies as $company)
                            <option value='{{ $company->id }}'>{{ $company->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col-lg-4 col-md-6">
                <label class='form-control-label'>Estado do Funcionário</label>
                <div class="form-group">
                    <select class="custom-select  input-group-alternative" wire:model='status'>
                        <option value="0" selected>Escolhe um estado...</option>
                        @foreach ($companyStatus as $status)
                            <option value='{{ $status }}'>{{ $status }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="my-3 my-lg-0">
        @if (count($employees))
            <h3 class="heading-small text- muted mb-2">
                Funcionários Cadastrados
                <span class="badge badge-pill badge-danger">
                    {{ $total }}
                </span>
            </h3>

            <div class="table-responsive">
                <table class="table align-items-center table-flush">
                    <thead class="thead-light">
                        <tr>
                            <th scope="col">Nome</th>
                            <th scope="col">Telefone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Companhia</th>
                            <th scope="col">Função</th>
                            <th scope="col">Concursos Abertos</th>
                            <th scope="col">Opções</th>
                        </tr>
                    </thead>

                    <tbody>

                        @foreach ($employees as $employee)
                            <tr>
                                <td>{{ $employee->firstname.' '.$employee->lastname }}</td>
                                <td>{{ $employee->phone }}</td>
                                <td>{{ $employee->email }}</td>
                                <td>{{ $employee->company->name }}</td>
                                <td>{{ $employee->jobRole->name }}</td>
                                <td>
                                    <span class="badge badge-pill badge-default">0</span>
                                </td>
                                <td class="d-flex justify-content-between">
                                    <a class='btn-sm tooltips' data-toggle="tooltip" data-placement="right"
                                        title="Atualizar dados " style='cursor: pointer;'
                                        wire:click="action('atualizar', {{ $employee->id }})">
                                        <i class="fas fa-pencil-alt"></i>
                                    </a>

                                    <a class='btn-sm tooltips' data-toggle="tooltip" data-placement="bottom"
                                        title="Apagar registo" style='cursor: pointer;'
                                        wire:click='action("excluir",{{ $employee->id }})'>
                                        <i class="fas fa-trash"></i>
                                    </a>
                                </td>
                            </tr>
                        @endforeach

                    </tbody>
                </table>
            </div>

            {{ $employees->links() }}

        @else

            @include('layouts.notFound',[
            'message'=>'Ops! Nenhum Funcionário foi encontrado no Sistema.'
            ])

        @endif
    </div>


    <div class="modal fade" tabindex="-1" id='deleteEmployeeModal'>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Confirmar Operação</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p>Pretende excluir os registos do Funcionário <strong>{{ $name }}</strong>, incluindo os
                        concursos?</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-dark" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn secondary-color" wire:click='destroy'>
                        <i class="fas fa-trash"></i>
                        Excluir
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" tabindex="-1" id='updateEmployeeModal'>
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Atualizar Dados do Funcionário <strong>{{ $name }}</strong></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Coming Soon
                </div>
            </div>
        </div>
    </div>
</div>
