<div>
    @if (Session::has('message'))
        @include('layouts.custom.alert',[
        'message' => Session::get('message'),
        'alertType'=>Session::get('type')
        ])
    @endif


    <div class="mt-3">

        <h6 class="heading-small text-muted  ">Mecanismo de Pesquisa</h6>

        <div class="row">
            <div class=" col-lg-7 col-md-6">
                <label class='form-control-label'>Pesquisar pelo nome</label>
                <div class="form-group">
                    <div class="input-group input-group-alternative">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-search"></i></span>
                        </div>
                        <input class="form-control form-control-alternative" placeholder="Nome da empresa..."
                            type="search" name="supplier">
                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-md-6">
                <label class='form-control-label'>Tipos de Produtos</label>
                <div class="form-group">
                    <select class="custom-select  input-group-alternative" wire:model='status'>
                        <option value="0" selected>Escolher um tipo de produto...</option>
                        @foreach ($productTags as $productTag)
                            <option value='{{ $productTag->name }}'>
                                {{ $productTag->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>
        </div>

        <div class="my-3 my-lg-0">
            @if (count($suppliers))
                <h3 class="heading-small text- muted mb-2">
                    Lojas Cadastradas
                    <span class="badge badge-pill badge-danger">
                        {{ $total }}
                    </span>
                </h3>

                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead class="thead-dark">
                            <tr>
                                <th scope="col" class="text-white">Nome</th>
                                <th scope="col" class="text-white">Email</th>
                                <th scope="col" class="text-white">Telefone</th>
                                <th scope="col" class="text-white">Site</th>
                                <th scope="col" class="text-white">Endereço</th>
                                <th scope="col" class="text-white">Opções</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($suppliers as $supplier)
                                <tr>
                                    <td>{{ $supplier->name }}</td>
                                    <td>{{ $supplier->email }}</td>
                                    <td>{{ $supplier->phone }}</td>
                                    <td>{{ $supplier->link }}</td>
                                    <td>{{ $supplier->address }}</td>
                                    <td>
                                        <a class='btn-sm tooltips' data-toggle="tooltip" data-placement="right"
                                            title="Visualizar" style='cursor: pointer;'
                                            href="{{ route('suppliers.show', [$supplier->id]) }}">
                                            <i class="icofont-eye-alt"></i>
                                        </a>

                                        <a class='btn-sm tooltips text-warning' data-toggle="tooltip"
                                            data-placement="right" title="Atualizar dados " style='cursor: pointer;'
                                            href="{{ route('suppliers.edit', [$supplier->id]) }}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </a>

                                        <a class="btn-sm tooltips text-danger deleteSupplierButton" data-toggle="modal"
                                            data-target="#deleteSupplierModal"
                                            data-attr="{{ route('suppliers.delete', $supplier->id) }}"
                                            title="Apagar registo" style='cursor: pointer;'>
                                            <i class="fas fa-trash text-danger  fa-lg"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>

                {{ $suppliers->links('layouts.custom.pagination-links') }}

            @else

                @include('layouts.notFound',[
                'message'=>'Ops! Nenhuma Loja foi encontrada no Sistema.'
                ])

            @endif
        </div>
    </div>
</div>
