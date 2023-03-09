<form method="post" action="{{ route('login.register') }}">
    @csrf
    <label>Nome</label>
    <div class="mb-3">
      <input type="text" class="form-control" name="name" placeholder="Digite o nome Completo">
    </div>
    <label>Email</label>
    <div class="mb-3">
      <input type="email" name="email" class="form-control" placeholder="Entre com o email">
    </div>
    <label>Senha</label>
    <div class="mb-3">
      <input type="password" name="password" class="form-control" placeholder="Senha">
    </div>
    <label >Nível de acesso:</label>
    <div class="d-flex align-items-center">
        <select class="form-select" name="role_id" id="role_id">
            @foreach($roles as $role)
             <option value="{{ $role->id }}">{{ $role->name }}</option>
            @endforeach
          </select>
    </div>
    <div class="text-center">
      <button type="submit" class="btn btn-dark w-100 mt-4 mb-3">Cadastro</button>
    </div>
    @if ($errors->has('login'))
        <br>
        <div class="alert alert-success" role="alert">
            {{ $errors->first('login') }}
          </div>
    @endif
  </form>
