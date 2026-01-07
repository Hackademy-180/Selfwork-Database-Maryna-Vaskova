<x-layout> 
    @if (session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
    @endif
    <h1>Homepage</h1>
</x-layout>