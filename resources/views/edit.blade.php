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
        
        <div class="container mt-5">
            <form action="{{ route('events.update', ['event' => $event->id]) }}" method="post">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <select class="form-select" name="evento" id="events" aria-label="Default select example">
                            <option value="Palestra" {{ isset($event) && $event->evento === 'Palestra' ? 'selected' : '' }}>Palestra</option>
                            <option value="Feira" {{ isset($event) && $event->evento === 'Feira' ? 'selected' : '' }}>Feira</option>
                            <option value="Competição" {{ isset($event) && $event->evento === 'Competição' ? 'selected' : '' }}>Competição</option>
                            <option value="Campanha" {{ isset($event) && $event->evento === 'Campanha' ? 'selected' : '' }}>Campanha</option>
                        </select>
                    </div>
                    <div class="col">
                        <input type="text" class="form-control" name="local" id="inputLocal" value="{{ isset($event) ? $event->local : '' }}">
                    </div>
                <div>
                <div class="row mt-2">
                    <div class="col">
                        <input type="date" class="form-control" name="data" id="inputData" value="{{ isset($event) ? $event->data : '' }}">
                    </div>
                    <div class="col">
                        <input type="time" class="form-control" name="horario" id="inputHorario" value="{{ isset($event) ? $event->horario : '' }}">
                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col">
                        <textarea class="form-control" name="descricao" id="inputDescricao" style="height: 100px">{{ isset($event) ? $event->descricao : '' }}</textarea>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col d-flex justify-content-end">
                        <button class="btn btn-primary" type="submit">
                            salvar
                        </button>
                    </div>
                </div>
            </form>
        </div>

        <script src="https://kit.fontawesome.com/8c4de67f84.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    </body>
</html>
