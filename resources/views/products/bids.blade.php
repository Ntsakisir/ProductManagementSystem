@if(count($bids) > 0)

@foreach ($bids as $bid)

<p> {{$bid->price}}</p>

@endforeach


@else

<p>No Products to Display!!!</p>


@endif
