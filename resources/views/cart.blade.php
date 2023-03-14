@extends('app')
@section('content')
@auth
@if (session('success'))
<div class="alert alert-success mt-4">
    {{ session('success') }}
</div>
@endif
@if(!empty($products))
@foreach ($products as $product)
<div class="mb-3 text-center">
    <img class="rounded" width="125px" src="{{ $product['image'] }}"/>
    <div>{{ $product['title'] }}</div>
    <div><strong>$ {{ $product['price'] }}</strong></div>
  
</div>
@endforeach
<a class="btn app_btn_cart bg-danger form-control mb-2" href="{{ route('clear_cart') }}">Clear Cart</a>
<a class="btn app_btn_cart form-control mb-2" href="/">Back</a>
<div class="col-12  p-4 mt-4">
    <span class="price_total fs-4"> Total Price: <strong>$ {{ $totalPrice }} </strong></span>
    <div class="text-center">
        <a class="btn app_btn_cart form-control mb-2" href="#">CheckOut</a>
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