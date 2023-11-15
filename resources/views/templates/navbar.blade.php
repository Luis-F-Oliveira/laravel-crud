<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="#">Trabalho CRUD</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <div class="mx-auto"></div>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <button class="btn nav-link" type="button" data-bs-toggle="modal" data-bs-target="#addEvent">
                        REGISTRAR EVENTOS
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
                <form>
                    @csrf
                    <div class="row mb-3">
                        <div class="col">
                            <label for="events">Evento</label>
                            <select class="form-select" id="events" aria-label="Default select example">
                                <option selected>events</option>
                                <option value="1">One</option>
                                <option value="2">Two</option>
                                <option value="3">Three</option>
                            </select>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <label for="inputDate">Data</label>
                            <input type="date" class="form-control" id="inputDate">
                        </div>
                        <div class="col">
                            <label for="inputTime">Horário</label>
                            <input type="time" class="form-control" id="inputTime">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <label for="inputDescricao">Descrição</label>
                            <textarea class="form-control" id="inputDescricao" style="height: 100px"></textarea>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">
                    REGISTRAR
                </button>
            </div>
        </div>
    </div>
</div>