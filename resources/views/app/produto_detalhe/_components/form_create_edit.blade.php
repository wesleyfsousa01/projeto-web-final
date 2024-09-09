
{{$produto->id}}
@if (isset($produto_detalhe->id))
<form method="POST" action="{{route('produto-detalhe.update', ['produto_detalhe' => $produto_detalhe->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('produto-detalhe.store')}}">
    @csrf
@endif
    <input type="hidden" name="produto_id" placeholder="ID do produto" class="form-control" value="{{$produto->id}}">

    <input type="number" name="comprimento" class="form-control" placeholder="Comprimento" value = "{{$produto_detalhe->comprimento ?? old('comprimento')}}">
    {{$errors->has('comprimento') ? $errors->first('comprimento') : '' }}

    <input type="number" name="largura" class="form-control" placeholder="Largura" value="{{$produto_detalhe->largura ?? old('largura')}}">
    {{$errors->has('largura') ? $errors->first('largura') : '' }}

    <input type="number" name="altura" class="form-control" placeholder="Altura" value="{{$produto_detalhe->altura ?? old('altura')}}">
    {{$errors->has('altura') ? $errors->first('altura') : '' }}

    <select name="unidade_id" class="form-select">
        <option value="">-- Selecione a Unidade de Medida --</option>
        @foreach ($unidades as $unidade)
            <option value="{{ $unidade->id }}" {{$produto_detalhe->unidade_id ?? old('unidade_id') == $unidade->id ? 'selected' : '' }}>{{$unidade->descricao}}</option>
        @endforeach
    </select>
    {{$errors->has('unidade_id') ? $errors->first('unidade_id') : '' }}
    <button type="submit" class="btn btn-success">Cadastrar</button>
</form>
