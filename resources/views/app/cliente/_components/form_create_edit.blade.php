@if (isset($cliente->id))
<form method="POST" action="{{route('cliente.update', ['cliente' => $cliente->id])}}">
    @csrf
    @method('PUT')
@else
<form method="POST" action="{{route('cliente.store')}}">
    @csrf
@endif

    <input type="text" name="nome" placeholder="Nome" class="borda-preta" value="{{$cliente->nome ?? old('nome')}}">
    {{ $errors->has('nome') ? $errors->first('nome') : '' }}

    <input type="text" name="email" placeholder="E-mail" class="borda-preta" value="{{$cliente->email ?? old('email')}}">
    {{ $errors->has('email') ? $errors->first('email') : '' }}

    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
