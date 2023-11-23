<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" target='blank' href="https://github.com/Luis-F-Oliveira/laravel-crud">Trabalho CRUD <i class="fa-brands fa-square-github"></i></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn nav-link" type="button" data-bs-toggle="modal" data-bs-target="#addEvent">
                        REGISTRAR EVENTOS <i class="fa-solid fa-plus"></i>
                    </button>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="modal fade" id="addEvent" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">
                    REGISTRAR EVENTO
                </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('events.store') }}" method="post">
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="events">Evento</label>
                            <select class="form-select" name="evento" id="events" aria-label="Default select example">
                                <option value="Palestra">Palestra</option>
                                <option value="Feira">Feira</option>
                                <option value="Competição">Competição</option>
                                <option value="Campanha">Campanha</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputDate">Data</label>
                            <input type="date" class="form-control" name="data" id="inputDate">
                        </div>
                        <div class="col">
                            <label for="inputTime">Horário</label>
                            <input type="time" class="form-control" name="horario" id="inputTime">
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputLocation">Local</label>
                            <input type="text"class="form-control" name="local" id="inputLocation" placeholder="CIDADE - ESTADO SIGLA (Cuiabá - MT)">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputDescricao">Descrição</label>
                            <textarea class="form-control" name="descricao" id="inputDescricao" style="height: 100px"></textarea>
                        </div>
                    </div>
                    <input type="hidden" name="status" value="0">
                </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">
                    REGISTRAR
                </button>
                </form>
            </div>
        </div>
    </div>
</div>