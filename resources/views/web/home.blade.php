@extends('layouts.web')

@section('title','صفحه اصلی')

@section('content')
    <div class="filters">
        <form action="{{ route('home') }}" method="get" class="search-form">
            <input type="text" name="q" value="{{ request('q') }}" placeholder="جستجو...">
            <select name="category" onchange="this.form.submit()">
                <option value="">همه دسته‌ها</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->slug }}" {{ request('category') == $cat->slug ? 'selected' : '' }}>
                        {{ $cat->name }}
                    </option>
                @endforeach
            </select>
            <button type="submit">جستجو</button>
        </form>
    </div>

    <section class="product-grid">
        @forelse($products as $product)
            <article class="product-card">
                <div class="product-card__image">
                    <img src="{{ $product->image ? asset('storage/'.$product->image) : asset('images/placeholder.png') }}" alt="{{ $product->name }}">
                </div>
                <h3 class="product-card__title">{{ $product->name }}</h3>
                <div class="product-card__price">{{ $product->price }} تومان</div>
                <div class="product-card__stock">
                    @if($product->stock > 0)
                        موجود ({{ $product->stock }})
                    @else
                        ناموجود
                    @endif
                </div>
                <p class="product-card__desc">{{ \Illuminate\Support\Str::limit($product->description, 80) }}</p>
                <div class="product-card__actions">
                    <a href="#" class="btn btn--primary">افزودن به سبد</a>
                </div>
            </article>
        @empty
            <p>محصولی یافت نشد.</p>
        @endforelse
    </section>

    <div class="pagination">
        {{ $products->links() }}
    </div>
@endsection
