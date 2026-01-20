<form method="POST"
      enctype="multipart/form-data"
      action="{{ route('products_update', $product) }}">
    @csrf
    @method('PUT')

    <input name="title" value="{{ $product->title }}">
    <input name="year" value="{{ $product->year }}">
    <input name="author" value="{{ $product->author }}">
    <textarea name="description">{{ $product->description }}</textarea>
    
    <input type="file" name="img"> 

    <button>Salva</button>
</form>
