<nav class="navbar navbar-expand-sm navbar-dark">
    <div class="container-fluid">
      <a class="navbar-brand" href={{route("index")}}>PhotoFile</a>

        <form action="{{route('search')}}" class="d-flex">
          <input class="form-control me-2" type="text" placeholder="Autor">
          <button type="submit" class="btn btn-primary" type="button">Search</button>
        </form>
    </div>
  </nav>
