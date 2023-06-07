<!-- Affichez la liste des propriétés -->
@foreach ($properties as $property)
    <div>
        <h3>{{ $property->title }}</h3>
        <p>{{ $property->description }}</p>
        <p>{{ $property->price }}</p>
        <p>{{ $property->city }}</p>
        <p>{{ $property->address }}</p>
        <p>{{ $property->bedrooms }}</p>
        <p>{{ $property->bathrooms }}</p>
        <p>{{ $property->area }}</p>
        <p>{{ $property->agend_id }}</p>
        <!-- Affichez d'autres informations sur la propriété -->
    </div>
@endforeach
