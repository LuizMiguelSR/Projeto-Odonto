<aside class="bg-custom text-light py-4" style="width: 250px;">
    <div class="menu">
        <div class="item">
            <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-usuario" aria-expanded="true" aria-controls="menu-usuario">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>

                Usuários
            </div>

            <div class="collapse show" id="menu-usuario">
                <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                    <a href="{{ route('usuario.cadastrar') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('usuario.cadastrar') ? ' active' : '' }}">
                        <small class="d-flex justify-content-between align-items-center">
                            Cadastrar Usuário
                            @if (request()->routeIs('usuario.cadastrar'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                    @if (request()->routeIs('usuario.inicio') || request()->routeIs('usuario.filtrar'))
                        <a href="{{ route('usuario.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 active">
                    @else
                        <a href="{{ route('usuario.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2">
                    @endif
                        <small class="d-flex justify-content-between align-items-center">
                            Listagem de Usuários

                            @if (request()->routeIs('usuario.inicio') || request()->routeIs('usuario.filtrar'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-paciente" aria-expanded="true" aria-controls="menu-paciente">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>

                Pacientes
            </div>

            <div class="collapse show" id="menu-paciente">
                <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                    <a href="{{ route('paciente.cadastrar') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('paciente.cadastrar') ? ' active' : '' }}">
                        <small class="d-flex justify-content-between align-items-center">
                            Cadastrar Paciente
                            @if (request()->routeIs('paciente.cadastrar'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                    @if (request()->routeIs('paciente.inicio') || request()->routeIs('paciente.filtrar'))
                        <a href="{{ route('paciente.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 active">
                    @else
                        <a href="{{ route('paciente.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2">
                    @endif
                        <small class="d-flex justify-content-between align-items-center">
                            Listagem de Pacientes

                            @if (request()->routeIs('paciente.inicio') || request()->routeIs('paciente.filtrar'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                    <a href="{{ route('prontuario.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('prontuario.inicio') ? ' active' : '' }}">
                        <small class="d-flex justify-content-between align-items-center">
                            Prontuários

                            @if (request()->routeIs('prontuario.inicio'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                </div>
            </div>
        </div>

        <div class="item">
            <div class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 border-start border-light border-4" type="button" data-bs-toggle="collapse" data-bs-target="#menu-consulta" aria-expanded="true" aria-controls="menu-consulta">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-fill" viewBox="0 0 16 16">
                    <path d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H3Zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6Z"/>
                </svg>

                Consultas
            </div>

            <div class="collapse show" id="menu-consulta">
                <div class="bg-dark d-flex flex-column rounded mx-4 p-2 row-gap-1">
                    <a href="{{ route('consulta.marcar') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('consulta.marcar') ? ' active' : '' }}">
                        <small class="d-flex justify-content-between align-items-center">
                            Marcar Consulta
                            @if (request()->routeIs('consulta.marcar'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                    <a href="{{ route('consulta.inicio') }}" class="submenu-link link-light text-decoration-none rounded p-2 {{ request()->routeIs('consulta.inicio') ? ' active' : '' }}">
                        <small class="d-flex justify-content-between align-items-center">
                            Listagem de Consultas

                            @if (request()->routeIs('consulta.inicio'))
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-right" viewBox="0 0 16 16">
                                    <path fill-rule="evenodd" d="M4.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L10.293 8 4.646 2.354a.5.5 0 0 1 0-.708z"/>
                                </svg>
                            @endif
                        </small>
                    </a>
                </div>
            </div>
        </div>

        <a href="{{ route('admin.logout') }}" class="w-100 d-flex align-items-center gap-2 link-light text-decoration-none mt-2 py-3 px-3 ms-1 icon-link icon-link-hover" style="--bs-icon-link-transform: translate3d(-.125rem, 0, 0);">
            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-arrow-left" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M6 12.5a.5.5 0 0 0 .5.5h8a.5.5 0 0 0 .5-.5v-9a.5.5 0 0 0-.5-.5h-8a.5.5 0 0 0-.5.5v2a.5.5 0 0 1-1 0v-2A1.5 1.5 0 0 1 6.5 2h8A1.5 1.5 0 0 1 16 3.5v9a1.5 1.5 0 0 1-1.5 1.5h-8A1.5 1.5 0 0 1 5 12.5v-2a.5.5 0 0 1 1 0v2z"/>
                <path fill-rule="evenodd" d="M.146 8.354a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L1.707 7.5H10.5a.5.5 0 0 1 0 1H1.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3z"/>
            </svg>

            Sair
        </a>
    </div>
</aside>
