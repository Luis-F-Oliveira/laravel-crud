<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">
        <title>Trabalho CRUD</title>
    </head>
    <body>
        @include('templates/navbar')
        
        <div class="position-relative">
            <div class="container-fluid bg-primary py-5">
                <div class="container mb-3">
                    <div class="d-flex justify-content-between align-items-center">
                        <h1 class="text-white fs-2">Consulta de eventos</h1>
                        <div class="text-white fs-5 border rounded p-1">
                            <i class="fa-solid fa-gears fa-flip-horizontal"></i>
                            <span>Eventos em processamento <strong>( {{ \App\Models\Events::where('status', 0)->count() }} )</strong></span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="container rounded bg-white py-3 position-relative shadow-sm" style="top: 50%; transform: translateY(-50%);">
                <form id="search-form">
                    @csrf
                    <div class="row">
                        <div class="col-4">
                            <label for="select-types">
                                BUSCAR POR
                            </label>
                            <select class="form-select" id="select-types" aria-label="Default select example" name="escolha_busca">
                                <option value="0">ID</option>
                                <option value="1">DESCRIÇÕES</option>
                                <option value="2">EVENTOS</option>
                                <option value="3">DATAS E HORÁRIO</option>
                                <option value="4">LOCAIS</option>
                            </select>
                        </div>
                        <div class="col mt-4 input-group">
                            <input type="text" class="form-control" name="busca" id="pesquisa" aria-label="Recipient's username" aria-describedby="submit">
                            <button class="btn btn-outline-primary" type="submit" id="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            @if(session('success'))
                <div class="container">
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('success') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                </div>
            @endif

            <div class="container">
                @if($events->isEmpty())
                   <h1>Nenhum evento encontrado.</h1>
                @else
                    <table class="table" id="data-table">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">DESCRIÇÃO</th>
                                <th scope="col">TIPO DE EVENTO</th>
                                <th scope="col">DATA</th>
                                <th scope="col">LOCAL</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>
                            
                        @forelse ($events as $event)
                            <tr>
                                <td scope="row"><strong>{{ $event->id }}</strong></th>
                                <td>{{ $event->descricao }}</td>
                                <td>{!! $event->evento !!} {!! $event->status == '0' ? '' : '<span class="text-danger fw-bold">Cancelado</span>' !!}</td>
                                <td>
                                <i class="fa-regular fa-calendar-days"></i> {{ \Illuminate\Support\Carbon::parse($event->data)->format('d/m/Y') }} 
                                    <span class="text-secondary">
                                        <i class="fa-regular fa-clock"></i> {{ $event->horario }}
                                    </span>
                                </td>
                                <td><i class="fa-solid fa-location-dot"></i> {{ $event->local }}</td>
                                <td class="d-flex align-items-center">
                                    <a href="{{ route('events.edit', ['event' => $event->id]) }}">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </a>
                                    <a href="{{ route('events.change-status', ['event' => $event->id]) }}">
                                        {!! $event->status == '0' ? '<i class="fa-solid fa-toggle-off"></i>' : '<i class="fa-solid fa-toggle-on"></i>' !!}
                                        
                                    </a>
                                    <form action="{{ route('events.destroy', ['event' => $event->id]) }}" method="POST">
                                        @csrf
                                        @method('DELETE')

                                        <button class="btn p-0" type="submit">
                                            <i class="fa-solid fa-x"></i>
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                        <tr>
                            <td colspan="6">Nenhum evento encontrado.</td>
                        </tr>
                    @endforelse
                @endif
                    </tbody>
                </table>
            </div>
        </div>

        <script src="https://kit.fontawesome.com/8c4de67f84.js"></script>
        <script src="{{ asset('js/search.js') }}"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
