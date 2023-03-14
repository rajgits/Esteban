@extends('app')
@section('content')
@auth
@if(!empty($products))

<div class="mt-4 text-center">
    <img class="rounded" width="125px" src="{{ $products['image'] }}"/>
    <div>{{ $products['title'] }}</div>
    <div><strong>$ {{ $products['price'] }}</strong></div>

    <div class="">
        <form action="{{ route('cart.add', $products['id']) }}" method="post">
            @csrf
            <button type="submit" class="btn app_btn_cart form-control mb-2">Add to cart</button>
        </form>
        <a class="btn app_btn_cart form-control mb-2" href="/">Back</a>
    </div>
  
</div>
@endauth
@guest
<div class="col-12  p-4 mb-5">
    <div class="text-center">
        <a class="btn app_btn form-control mb-2" href="{{ route('login') }}">Login</a>
        <a class="btn app_btn form-control mb-2" href="{{ route('register') }}">Register</a>
    </div>
</div>
@endif
@endguest
@endsection