@extends('layouts.web')

@section('title', $product->name)

@section('content')
    <div class="product-page">
        <div class="card">
            <div class="row g-0">
                <!-- تصویر -->
                <div class="col-md-5 product-image">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/placeholder.png') }}"
                         alt="{{ $product->name }}">
                </div>

                <!-- جزییات -->
                <div class="col-md-7 product-details">
                    <h1>{{ $product->name }}</h1>
                    <div class="price">{{ $product->price_formatted }} تومان</div>
                    <div class="stock {{ $product->stock > 0 ? 'in' : 'out' }}">
                        @if($product->stock > 0)
                            موجود ({{ $product->stock }})
                        @else
                            ناموجود
                        @endif
                    </div>
                    <p class="description">{{ $product->description }}</p>

                    <div class="actions">
                        <button class="btn btn-primary">افزودن به سبد خرید</button>
                        <button class="btn btn-outline-secondary">علاقه‌مندی</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
