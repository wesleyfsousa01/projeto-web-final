{{ $slot }}
<div class="card shadow-sm">
    <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Entre em Contato:</h5>
    </div>
    <div class="card-body">
        <form action="{{ route('site.contato') }}" method="POST">
            @csrf

            <!-- Nome -->
            <div class="mb-3">
                <label for="nome" class="form-label">Nome</label>
                <input name="nome" value="{{ old('nome') }}" type="text" id="nome" placeholder="Nome" class="form-control @error('nome') is-invalid @enderror">
                @error('nome')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Telefone -->
            <div class="mb-3">
                <label for="telefone" class="form-label">Telefone</label>
                <input name="telefone" value="{{ old('telefone') }}" type="text" id="telefone" placeholder="Telefone" class="form-control @error('telefone') is-invalid @enderror">
                @error('telefone')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- E-mail -->
            <div class="mb-3">
                <label for="email" class="form-label">E-mail</label>
                <input name="email" value="{{ old('email') }}" type="email" id="email" placeholder="E-mail" class="form-control @error('email') is-invalid @enderror">
                @error('email')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Motivo do Contato -->
            <div class="mb-3">
                <label for="motivo_contatos" class="form-label">Motivo do Contato</label>
                <select name="motivo_contatos_id" id="motivo_contatos" class="form-select @error('motivo_contatos_id') is-invalid @enderror">
                    <option value="" disabled selected hidden>Selecione um motivo</option>
                    @foreach ($motivo_contatos as $motivo_contato)
                        <option value="{{ $motivo_contato->id }}" {{ old('motivo_contatos_id') == $motivo_contato->id ? 'selected' : '' }}>
                            {{ $motivo_contato->motivo_contato }}
                        </option>
                    @endforeach
                </select>
                @error('motivo_contatos_id')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Mensagem -->
            <div class="mb-3">
                <label for="mensagem" class="form-label">Mensagem</label>
                <textarea name="mensagem" id="mensagem" class="form-control @error('mensagem') is-invalid @enderror" placeholder="Preencha sua mensagem aqui..." style="height: 150px">{{ old('mensagem') }}</textarea>
                @error('mensagem')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>

            <!-- Botão de Envio -->
            <button type="submit" class="btn btn-primary w-100">Enviar</button>
        </form>
    </div>
</div>

@if($errors->any())
    <div class="alert alert-danger mt-3">
        @foreach ($errors->all() as $error)
            {{ $error }}<br/>
        @endforeach
    </div>
@endif
