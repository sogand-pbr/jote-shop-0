<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // گرفتن همه دسته‌ها برای فیلتر
        $categories = Category::orderBy('name')->get();

        // بیس کوئری: فقط محصولات فعال
        $query = Product::with('category')
            ->where('is_active', true);

        // فیلتر بر اساس دسته
        if ($request->filled('category')) {
            $query->whereHas('category', function($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // جستجو در نام یا توضیحات
        if ($request->filled('q')) {
            $q = $request->q;
            $query->where(function($sub) use ($q) {
                $sub->where('name', 'like', "%{$q}%")
                    ->orWhere('description', 'like', "%{$q}%");
            });
        }

        // گرفتن محصولات با pagination
        $products = $query->orderBy('created_at', 'desc')
            ->paginate(12)
            ->withQueryString();

        return view('web.home', compact('products', 'categories'));

    }
}
