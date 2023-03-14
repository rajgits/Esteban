@extends('app')
@section('content')
@auth

<p>Welcome <b>{{ Auth::user()->name }}</b></p>

<div>
    @if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
    @endif
    @foreach ($products as $product)
    <div class="mb-3 text-center">
        <img class="rounded" width="125px" src="{{ $product['image'] }}"/>
        <div>{{ $product['title'] }}</div>
        <div><strong>$ {{ $product['price'] }}</strong></div>
        <div class="">
            <form action="{{ route('cart.add', $product['id']) }}" method="post">
                @csrf
                <button type="submit" class="btn app_btn_cart form-control mb-2">Add to cart</button>
            </form>
            <a class="btn app_btn_cart form-control mb-2" href="{{ route('view-item', ['id' => $product['id']]) }}">View Item</a>
        </div>
    </div>
    @endforeach

    <footer class="app_bg py-3">
        <div class="container">
          <div class="row">
            <div class="col-md-12">
              <ul class="list-inline mb-0 text-center">
                <li class="list-inline-item p-4"><a href="/cart"><i class="bi bi-house-fill text-white fs-3"></i> </li>
                <li class="list-inline-item p-4"><a  href="{{ route('cart') }}"><i class="bi bi-cart-fill text-white fs-3"></i> <span class="badge badge-light fs-3">{{ $incart }}</span>  </a></li>
              </ul>
            </div>
          </div>
        </div>
      </footer>     
</div>
 


@endauth
@guest
<div class="col-12  p-4 mb-5">
    <div class="text-center">
        <a class="btn app_btn form-control mb-2" href="{{ route('login') }}">Login</a>
        <a class="btn app_btn form-control mb-2" href="{{ route('register') }}">Register</a>
    </div>
</div>
@endguest
@endsection