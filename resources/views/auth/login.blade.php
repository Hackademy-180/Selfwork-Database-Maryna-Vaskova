<x-layout>
  
  <main class="container">
    <section class="row vh-100 justify-content-center align-items-center">
      <article class="col-12 col-md-8">
        <h1>Pagina di registrazione</h1>
        <form method="POST" action="{{route('login')}}">
            @csrf
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email">
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password">
          </div>
          <button type="submit" class="btn btn-primary">Submit</button>
          <p class="mt-3">Non hai ancora un account? Registrati da questo <a href="{{route('register')}}">link</a></p>
        </form>
      </article-col-12>
    </section>
  </main>
  
</x-layout>