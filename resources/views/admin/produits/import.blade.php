<form method="POST" action="{{ route('admin.produits.import') }}" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="file">Fichier:</label>
        <input type="file" name="file" class="form-control">
    </div>
    <button type="submit" class="btn btn-primary">Importer</button>
</form>
