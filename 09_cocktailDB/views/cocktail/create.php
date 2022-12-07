<h1>Create</h1>
<form method="post" enctype="multipart/form-data">
  <div class="mb-3">
    <label for="name" class="form-label">Naam</label>
    <input type="text" name="name" class="form-control" id="name" >
  </div>
  <div class="mb-3">
    <label for="description" class="form-label">Description</label>
    <textarea name="description" class="form-control" id="description"></textarea>
  </div>

  <div class="mb-3">
    <label for="image" class="form-label">Image</label>
    <input type="file" name="image" class="form-control">
  </div>
  <button type="submit" class="btn btn-primary">Voeg toe</button>
</form>