@if (isset($produto->id))
    <form method="POST" action="{{ route('produto.update', ['produto' => $produto->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
@else
<form method="POST" action="{{route('produto.store')}}" enctype="multipart/form-data">
    @csrf
@endif

    <select name="fornecedor_id" class="form-select">
        <option>-- Selecione um Fornecedor --</option>

        @foreach($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }} >{{ $fornecedor->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

    <input type="text" name="nome" placeholder="Nome" class="form-control" value="{{$produto->nome ?? old('nome')}}">
    {{$errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" class="form-control" placeholder="Descrição" value = "{{$produto->descricao ?? old('descricao')}}">
    {{$errors->has('descricao') ? $errors->first('descricao') : '' }}
    <input type="text" name="peso" class="form-control" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}">
    {{$errors->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id" id="" class="form-select">
        <option value="">-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{$produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}

    <input type="number" name="preco" class="form-control" placeholder="Preço" value="{{$produto->preco ?? old('preco')}}">
    {{$errors->has('preco') ? $errors->first('preco') : '' }}

    <input type="file" accept="image/*" name="arquivo" class="form-control">
    {{$errors->has('arquivo') ? $errors->first('arquivo') : '' }}

    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
