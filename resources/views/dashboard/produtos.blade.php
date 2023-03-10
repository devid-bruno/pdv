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
        <div class="container-fluid py-4 px-5">
            <div class="row">
              <div class="col-12">
                <div class="card border shadow-xs mb-4">
                  <div class="card-header border-bottom pb-0">
                    <div class="d-sm-flex align-items-center">
                      <div>
                        <h6 class="font-weight-semibold text-lg mb-0">Lista de Produtos</h6>
                      </div>
                      <div class="ms-auto d-flex">
                        <a class="nav-link" href="{{route('addprodutos')}}">
                        <button type="button" class="btn btn-sm btn-dark btn-icon d-flex align-items-center me-2">
                          <span class="btn-inner--icon">
                            <svg width="16" height="16" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="d-block me-2">
                              <path d="M6.25 6.375a4.125 4.125 0 118.25 0 4.125 4.125 0 01-8.25 0zM3.25 19.125a7.125 7.125 0 0114.25 0v.003l-.001.119a.75.75 0 01-.363.63 13.067 13.067 0 01-6.761 1.873c-2.472 0-4.786-.684-6.76-1.873a.75.75 0 01-.364-.63l-.001-.122zM19.75 7.5a.75.75 0 00-1.5 0v2.25H16a.75.75 0 000 1.5h2.25v2.25a.75.75 0 001.5 0v-2.25H22a.75.75 0 000-1.5h-2.25V7.5z" />
                            </svg>
                          </span>
                          <span class="btn-inner--text">Adicionar Produto</span>
                        </button>
                    </a>
                      </div>
                    </div>
                  </div>
                  <div class="card-body px-0 py-0">
                    <div class="border-bottom py-3 px-3 d-sm-flex align-items-center">
                      <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable1" autocomplete="off" checked>
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable1">Todos</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable2" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable2">Categorias</label>
                        <input type="radio" class="btn-check" name="btnradiotable" id="btnradiotable3" autocomplete="off">
                        <label class="btn btn-white px-3 mb-0" for="btnradiotable3">Categorias</label>
                      </div>
                      <div class="input-group w-sm-25 ms-auto">
                        <span class="input-group-text text-body">
                          <svg xmlns="http://www.w3.org/2000/svg" width="16px" height="16px" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M21 21l-5.197-5.197m0 0A7.5 7.5 0 105.196 5.196a7.5 7.5 0 0010.607 10.607z"></path>
                          </svg>
                        </span>
                        <input type="text" class="form-control" placeholder="Pesquisar">
                      </div>
                    </div>
                    <div class="table-responsive p-0">
                      <table class="table align-items-center mb-0">
                        <thead class="bg-gray-100">
                          <tr>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7">Produto</th>
                            <th class="text-secondary text-xs font-weight-semibold opacity-7 ps-2">Fornecedor</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Preço unitário</th>
                            <th class="text-center text-secondary text-xs font-weight-semibold opacity-7">Quantidade Estoque</th>
                            <th class="text-secondary opacity-7"></th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <td>
                              <div class="d-flex px-2 py-1">
                                <div class="d-flex flex-column justify-content-center ms-1">
                                  <h6 class="mb-0 text-sm font-weight-semibold">Cimento</h6>
                                  <p class="text-sm text-secondary mb-0">Marca nassau</p>
                                </div>
                              </div>
                            </td>
                            <td>
                              <p class="text-sm text-dark font-weight-semibold mb-0">X</p>
                            </td>
                            <td class="align-middle text-center text-sm">
                              <span class="badge badge-sm border border-success text-success bg-success">R$ 30,90</span>
                            </td>
                            <td class="align-middle text-center">
                              <span class="text-secondary text-sm font-weight-normal">1</span>
                            </td>
                            <td class="align-middle">
                              <a href="javascript:;" class="text-secondary font-weight-bold text-xs" data-bs-toggle="tooltip" data-bs-title="Editar">
                                <svg width="14" height="14" viewBox="0 0 15 16" fill="none" xmlns="http://www.w3.org/2000/svg">
                                  <path d="M11.2201 2.02495C10.8292 1.63482 10.196 1.63545 9.80585 2.02636C9.41572 2.41727 9.41635 3.05044 9.80726 3.44057L11.2201 2.02495ZM12.5572 6.18502C12.9481 6.57516 13.5813 6.57453 13.9714 6.18362C14.3615 5.79271 14.3609 5.15954 13.97 4.7694L12.5572 6.18502ZM11.6803 1.56839L12.3867 2.2762L12.3867 2.27619L11.6803 1.56839ZM14.4302 4.31284L15.1367 5.02065L15.1367 5.02064L14.4302 4.31284ZM3.72198 15V16C3.98686 16 4.24091 15.8949 4.42839 15.7078L3.72198 15ZM0.999756 15H-0.000244141C-0.000244141 15.5523 0.447471 16 0.999756 16L0.999756 15ZM0.999756 12.2279L0.293346 11.5201C0.105383 11.7077 -0.000244141 11.9624 -0.000244141 12.2279H0.999756ZM9.80726 3.44057L12.5572 6.18502L13.97 4.7694L11.2201 2.02495L9.80726 3.44057ZM12.3867 2.27619C12.7557 1.90794 13.3549 1.90794 13.7238 2.27619L15.1367 0.860593C13.9869 -0.286864 12.1236 -0.286864 10.9739 0.860593L12.3867 2.27619ZM13.7238 2.27619C14.0917 2.64337 14.0917 3.23787 13.7238 3.60504L15.1367 5.02064C16.2875 3.8721 16.2875 2.00913 15.1367 0.860593L13.7238 2.27619ZM13.7238 3.60504L3.01557 14.2922L4.42839 15.7078L15.1367 5.02065L13.7238 3.60504ZM3.72198 14H0.999756V16H3.72198V14ZM1.99976 15V12.2279H-0.000244141V15H1.99976ZM1.70617 12.9357L12.3867 2.2762L10.9739 0.86059L0.293346 11.5201L1.70617 12.9357Z" fill="#64748B" />
                                </svg>
                              </a>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                    </div>
                    <div class="border-top py-3 px-3 d-flex align-items-center">
                      <p class="font-weight-semibold mb-0 text-dark text-sm">Page 1 of 10</p>
                      <div class="ms-auto">
                        <button class="btn btn-sm btn-white mb-0">Previous</button>
                        <button class="btn btn-sm btn-white mb-0">Next</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        <!--
     -->
    @endsection
