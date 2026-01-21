<x-layout>
    <main class="container">
        <h1>{{ $product->title }}</h1>

        <p><strong>Autore:</strong> {{ $product->author }}</p>
        <p><strong>Anno:</strong> {{ $product->year }}</p>
        <p>{{ $product->description }}</p>

        <p><strong>Creato da:</strong> {{ $product->user->name }}</p>

        @if($product->img)
            <img src="{{ Storage::url($product->img) }}" class="img-fluid">
        @endif

        @auth
            @if(auth()->id() === $product->user_id)
                <a href="{{ route('products_edit', $product) }}" class="btn btn-warning mt-3">
                    Modifica
                </a>

                <form method="POST" action="{{ route('products_delete', $product) }}" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger mt-3">Elimina</button>
                </form>
            @endif
        @endauth

        <a href="{{ route('products_index') }}" class="btn btn-secondary mt-3">
            Indietro
        </a>
    </main>
</x-layout>
