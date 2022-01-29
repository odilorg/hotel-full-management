

@foreach ($pizzas as $pizza)
<p>{{ $pizza['base'] }} - {{ $pizza['price'] }}</p>
@endforeach
