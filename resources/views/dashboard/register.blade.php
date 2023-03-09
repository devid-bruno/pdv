@extends('layouts.header')

@section('content')
<body class="g-sidenav-show  bg-gray-100">

    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
      <!-- Navbar -->
      <nav class="navbar navbar-main navbar-expand-lg mx-5 px-0 shadow-none rounded" id="navbarBlur" navbar-scroll="true">
        <div class="container-fluid py-1 px-2">
          <nav aria-label="breadcrumb">
            <h6 class="font-weight-bold mb-0">Dashboard</h6>
          </nav>
          <div class="collapse navbar-collapse mt-sm-0 mt-2 me-md-0 me-sm-4" id="navbar">
            <div class="ms-md-auto pe-md-3 d-flex align-items-center">
            </div>
            <ul class="navbar-nav  justify-content-end">
              <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-body p-0" id="iconNavbarSidenav">
                  <div class="sidenav-toggler-inner">
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                    <i class="sidenav-toggler-line"></i>
                  </div>
                </a>
              </li>
              <li class="nav-item ps-2 d-flex align-items-center">
                  <div class="dropdown text-end">
                      <a href="#" class="d-block link-dark text-decoration-none dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                          <img src="{{asset("img/team-2.jpg")}}" class="avatar avatar-sm" alt="avatar" />
                      </a>
                      <ul class="dropdown-menu text-small">
                        <li><a class="dropdown-item" href="#">New project...</a></li>
                        <li><a class="dropdown-item" href="#">Settings</a></li>
                        <li><a class="dropdown-item" href="#">Profile</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="{{route('logout')}}">Sign out</a></li>
                      </ul>
                    </div>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      <div class="container-fluid py-4 px-5">
        <div class="row">
          <div class="col-md-12">
            <div class="d-md-flex align-items-center mb-3 mx-2">
              <div class="mb-md-0 mb-3">
                <h3 class="font-weight-bold mb-0">
                  @if (auth()->check())
                     Olá, {{ auth()->user()->name }}!
                  @endif
          </h3>
              </div>
            </div>
          </div>
        </div>

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

  @endsection
