@if (isset($produto->id))
    <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}">
        @csrf
        @method('PUT')
@else
    <form method="POST" action="{{ route('produto.store') }}">
        @csrf
@endif

    <!-- Fornecedor -->
    <div class="mb-3">
        <label for="fornecedor_id" class="form-label">Fornecedor</label>
        <select name="fornecedor_id" id="fornecedor_id" class="form-select {{ $errors->has('fornecedor_id') ? 'is-invalid' : '' }}">
            <option value="">-- Selecione um Fornecedor --</option>
            @foreach($fornecedores as $fornecedor)
                <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }}>
                    {{ $fornecedor->nome }}
                </option>
            @endforeach
        </select>
        @if($errors->has('fornecedor_id'))
            <div class="invalid-feedback">
                {{ $errors->first('fornecedor_id') }}
            </div>
        @endif
    </div>

    <!-- Nome -->
    <div class="mb-3">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" name="nome" id="nome" placeholder="Nome" class="form-control {{ $errors->has('nome') ? 'is-invalid' : '' }}" value="{{ $produto->nome ?? old('nome') }}">
        @if($errors->has('nome'))
            <div class="invalid-feedback">
                {{ $errors->first('nome') }}
            </div>
        @endif
    </div>

    <!-- Descrição -->
    <div class="mb-3">
        <label for="descricao" class="form-label">Descrição</label>
        <input type="text" name="descricao" id="descricao" class="form-control {{ $errors->has('descricao') ? 'is-invalid' : '' }}" placeholder="Descrição" value="{{ $produto->descricao ?? old('descricao') }}">
        @if($errors->has('descricao'))
            <div class="invalid-feedback">
                {{ $errors->first('descricao') }}
            </div>
        @endif
    </div>

    <!-- Peso -->
    <div class="mb-3">
        <label for="peso" class="form-label">Peso</label>
        <input type="text" name="peso" id="peso" class="form-control {{ $errors->has('peso') ? 'is-invalid' : '' }}" placeholder="Peso" value="{{ $produto->peso ?? old('peso') }}">
        @if($errors->has('peso'))
            <div class="invalid-feedback">
                {{ $errors->first('peso') }}
            </div>
        @endif
    </div>


    {{ $unidades }}
    <!-- Unidade de Medida -->
    <div class="mb-3">
        <label for="unidade_id" class="form-label">Unidade de Medida</label>
        <select name="unidade_id" id="unidade_id" class="form-select {{ $errors->has('unidade_id') ? 'is-invalid' : '' }}">
            <option value="">-- Selecione a Unidade de Medida --</option>
            @foreach ($unidades as $unidade)
                <option value="{{ $unidade->id }}" {{ ($produto->unidade_id ?? old('unidade_id')) == $unidade->id ? 'selected' : '' }}>
                    {{ $unidade->descricao }}
                </option>
            @endforeach
        </select>
        @if($errors->has('unidade_id'))
            <div class="invalid-feedback">
                {{ $errors->first('unidade_id') }}
            </div>
        @endif
    </div>

    <!-- Botão de Envio -->
    <button type="submit" class="btn btn-primary w-100">Cadastrar</button>
</form>
