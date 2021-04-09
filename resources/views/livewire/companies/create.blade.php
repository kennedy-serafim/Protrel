<div>
    {{-- The whole world belongs to you --}}
    <h6 class="heading-small text-muted">Cadastrar Companhias</h6>
    <hr class='mt-1 mb-3' />

    <form wire:submit.prevent='submit'>
        <div class="row">
            <div class="col-lg-6">
                <label for="companyName" class="form-control-label">Nome da Companhia</label>
                <div class="form-group {{ $errors->has('name') ? ' has-danger' : '' }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icofont-ui-user"></i>
                            </span>
                        </div>
                        <input class="form-control {{ $errors->has('name') ? ' is-invalid' : '' }}"
                            wire:model.debounce='name' name='name' id='companyName' placeholder="Nome da companhia"
                            type="text">
                    </div>

                    @if ($errors->has('name'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            <div class="col-lg-6">
                <label for="companyNuit" class="form-control-label">NUIT da Companhia</label>
                <div class="form-group {{ $errors->has('nuit') ? ' has-danger' : '' }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icofont-ui-user"></i>
                            </span>
                        </div>
                        <input class="form-control {{ $errors->has('nuit') ? ' is-invalid' : '' }}"
                            wire:model.debounce='nuit' nuit='nuit' id='companyNuit' placeholder="Nuit da companhia"
                            type="text">
                    </div>

                    @if ($errors->has('nuit'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('nuit') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class='row'>
            {{-- Email --}}
            <div class='col-lg-6'>
                <label class="form-control-label" for="companyEmail">Endereço Eletrónico</label>
                <div class="form-group {{ $errors->has('email') ? ' has-danger' : '' }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icofont-email"></i>
                            </span>
                        </div>
                        <input class="form-control {{ $errors->has('email') ? ' is-invalid' : '' }}"
                            wire:model.debounce='email' name='email' id='companyEmail' placeholder="E-mail..."
                            type="email">
                    </div>

                    @if ($errors->has('email'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            </div>

            {{-- Phone --}}
            <div class='col-lg-6'>
                <label class="form-control-label" for="companyPhone">Telefone</label>
                <div class="form-group {{ $errors->has('phone') ? ' has-danger' : '' }}">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                +258
                            </span>
                        </div>
                        <input class="form-control f-phone {{ $errors->has('phone') ? ' is-invalid' : '' }}"
                            wire:model.debounce='phone' name='phone' id='companyPhone' placeholder="Telefone..."
                            type="text">
                    </div>

                    @if ($errors->has('phone'))
                        <span class="invalid-feedback d-block" role="alert">
                            <strong>{{ $errors->first('phone') }}</strong>
                        </span>
                    @endif
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-6">
                <label for="companyManager" class="form-control-label">Responsável da Empresa</label>
                <div class="form-group">
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="icofont-email"></i>
                            </span>
                        </div>
                        <input class="form-control" wire:model.debounce='manager' name='manager' id='companyManager'
                            placeholder="Responsável..." type="text" list="companyManagers">
                    </div>

                    <datalist id="companyManagers">
                        @foreach ($managers as $manager)
                            <option>{{ $manager->firstname . ' ' . $manager->lastname }}</option>
                        @endforeach
                    </datalist>

                </div>
            </div>

            <div class="col-lg-6">
                <label for="companyAddress" class="form-control-label">Endereço da Empresa</label>
                <div class="form-group">
                    <div class="input-group">
                        <textarea name="address" id="companyAddress" cols="30" rows="3" class="form-control"
                            wire:model.debounce='address'></textarea>
                    </div>
                </div>
            </div>
        </div>

        {{-- Buttons --}}
        <div class='row justify-content-center'>
            <div class="form-group mr-2">
                <button type="submit" class="btn primary-color text-white" wire:loading.class='not-allowed'>

                    <div wire:loading.remove wire:target='store'>
                        <i class="far fa-check-circle"></i>
                        Cadastrar
                    </div>

                    <div wire:loading wire:target='store'>
                        <i class="fas fa-spinner"></i>
                        Processando...
                    </div>
                </button>
            </div>

            <div class="form-group">
                <button type="button" class="btn secondary-color" wire:click='hideCollapse'>
                    <i class="far fa-times-circle"></i>
                    Cancelar
                </button>
            </div>
        </div>
    </form>
</div>
