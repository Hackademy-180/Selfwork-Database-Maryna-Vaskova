<a href="{{ route('songs.edit', $song) }}">Modifica</a>

<form method="POST" action="{{ route('songs.destroy', $song) }}">
    @csrf
    @method('DELETE')
    <button>Elimina</button>
</form>
