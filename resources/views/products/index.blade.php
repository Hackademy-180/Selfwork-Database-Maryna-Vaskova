<x-layout>
    <h1>I nostri Canzoni</h1>
    <main class="container">
        <section class="row">
            @foreach ($products as $product)
            <article class="col-12 col-md-3">
                <div class="card">
                    <div class="card-body">
                        <p class="lead fw-bold">{{$product->title}}</p>
                        <p class="lead">{{$product->author}}</p>
                        <p class="lead">{{$product->year}}</p>
                        <p class="lead">{{$product->description}}</p>
                        <img src="{{Storage::url($product->img)}}" alt="Image of the Song" class="img-fluid">
                        
                        <a href="{{ route('products_show', $product) }}" class="btn btn-info mt-2">
                            Dettaglio
                        </a>
                        
                        @auth
                        @if(auth()->id() === $product->user_id)
                        <a href="{{ route('products_edit', $product) }}" class="btn btn-warning mt-2">
                            Modifica
                        </a>
                        
                        <form method="POST" action="{{ route('products_delete', $product) }}" class="mt-2">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">Elimina</button>
                        </form>
                        @endif
                        @endauth
                        
                    </div>
                </div>
            </article> 
            @endforeach
        </section>
    </main>
</x-layout>