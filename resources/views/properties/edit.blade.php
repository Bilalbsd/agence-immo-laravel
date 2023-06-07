<!-- Formulaire de mise à jour de la propriété spécifiée -->
<form method="POST" action="{{ route('properties.update', $property->id) }}">
    @csrf
    @method('PUT')
    <div>
        <label for="title">Titre :</label>
        <input type="text" name="title" id="title" value="{{ $property->title }}" required>
    </div>
    <div>
        <label for="description">Description :</label>
        <input type="text" name="description" value="{{ $property->description }}" id="description" required>
    </div>
    <div>
        <label for="price">Prix :</label>
        <input type="number" name="price" id="price" value="{{ $property->price }}" required>
    </div>
    <div>
        <label for="city">Ville :</label>
        <input type="text" name="city" id="city" value="{{ $property->city }}" required>
    </div>
    <div>
        <label for="address">Adresse :</label>
        <input type="text" name="address" id="address" value="{{ $property->address }}" required>
    </div>
    <div>
        <label for="bedrooms">Nombre de chambre :</label>
        <input type="number" name="bedrooms" id="bedrooms" value="{{ $property->bedrooms }}" required>
    </div>
    <div>
        <label for="bathrooms">Nombre de douche :</label>
        <input type="number" name="bathrooms" id="bathrooms" value="{{ $property->bathrooms }}" required>
    </div>
    <div>
        <label for="area">Surface (m2) :</label>
        <input type="number" name="area" id="area" value="{{ $property->area }}" required>
    </div>
    <div>
        <label for="agend_id">Surface (m2) :</label>
        <input type="number" name="agend_id" id="agend_id" value="{{ $property->agend_id }}" required>
    </div>
    <!-- Ajoutez d'autres champs de formulaire pour les autres attributs de propriété -->
    <button type="submit">Mettre à jour</button>
</form>
