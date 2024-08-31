@if (isset($cliente->id))
<form method="POST" action="{{route('cliente.update', ['cliente' => $cliente->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('cliente.store')}}">
    @csrf
@endif

    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{$cliente->nome ?? old('nome')}}">
    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
