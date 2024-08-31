@if (isset($produto->id))
<form method="POST" action="{{route('produto.update', ['produto' => $produto->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('produto.store')}}">
    @csrf
@endif

    <select name="fornecedor_id">
        <option>-- Selecione um Fornecedor --</option>

        @foreach($fornecedores as $fornecedor)
            <option value="{{ $fornecedor->id }}" {{ ($produto->fornecedor_id ?? old('fornecedor_id')) == $fornecedor->id ? 'selected' : '' }} >{{ $fornecedor->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('fornecedor_id') ? $errors->first('fornecedor_id') : '' }}

    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{$produto->nome ?? old('nome')}}">
    {{$errors->has('nome') ? $errors->first('nome') : '' }}
    <input type="text" name="descricao" class="borda-preta" placeholder="Descrição" value = "{{$produto->descricao ?? old('descricao')}}">
    {{$errors->has('descricao') ? $errors->first('descricao') : '' }}
    <input type="text" name="peso" class="borda-preta" placeholder="Peso" value="{{$produto->peso ?? old('peso')}}">
    {{$errors->has('peso') ? $errors->first('peso') : '' }}
    <select name="unidade_id" id="">
        <option value="">-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{$produto->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
