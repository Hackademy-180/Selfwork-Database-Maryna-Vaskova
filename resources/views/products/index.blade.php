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
                        <a href="{{route('products_edit', $product)}}" class="btn btn-primary mt-2">Modifica</a>
                        <form method="POST" action="{{ route('products_delete', $product) }}">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger mt-2">Elimina</button>
                    </div>
                </div>
            </article> 
            @endforeach
        </section>
    </main>
</x-layout>