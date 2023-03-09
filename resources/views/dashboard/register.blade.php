<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/apple-icon.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/favicon.png')}}">
  <title>
    Corporate UI by Creative Tim
  </title>
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700|Noto+Sans:300,400,500,600,700,800|PT+Mono:300,400,500,600,700" rel="stylesheet" />
  <link href="{{asset('css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/349ee9c857.js" crossorigin="anonymous"></script>
  <link href="{{asset('css/nucleo-svg.css')}}" rel="stylesheet" />
  <link id="pagestyle" href="{{ asset('css/corporate-ui-dashboard.css?v=1.0.0') }}" rel="stylesheet" />
</head>

<body class="">

  <main class="main-content  mt-0">
    <section>
      <div class="page-header min-vh-100">
        <div class="container">
          <div class="row">
            <div class="col-xl-4 col-md-6 d-flex flex-column mx-auto">
              <div class="card card-plain mt-8">
                <div class="card-header pb-0 text-left bg-transparent">
                </div>
                <div class="card-body">
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
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </main>
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
<script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
<script src="{{asset("js/plugins/swiper-bundle.min.js")}}" type="text/javascript"></script>

</body>

</html>


