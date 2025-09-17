@extends('layouts.admin')

@section('title', 'ایجاد محصول جدید')

@section('content')
    <h1>ایجاد محصول جدید</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div>
            <label>نام محصول:</label>
            <input type="text" name="name" value="{{ old('name') }}" required>
        </div>

        <div>
            <label>دسته‌بندی:</label>
            <select name="category_id" required>
                <option value="">انتخاب کنید</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}">{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <div>
            <label>قیمت:</label>
            <input type="number" name="price" value="{{ old('price') }}" required>
        </div>

        <div>
            <label>موجودی:</label>
            <input type="number" name="stock" value="{{ old('stock') }}" required>
        </div>

        <div>
            <label>توضیحات:</label>
            <textarea name="description">{{ old('description') }}</textarea>
        </div>

        <div>
            <label>تصویر:</label>
            <input type="file" name="image">
        </div>

        <button type="submit">ذخیره محصول</button>
    </form>
@endsection
