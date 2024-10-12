<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\Category;

class ContactController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        return view('index', compact('categories'));
    }

    public function confirm(Request $request)
    {
        // バリデーションの実行
        $validatedData = $request->validate([
            'first_name' => 'required|max:255',
            'last_name' => 'required|max:255',
            'gender' => 'required|in:1,2,3',
            'email' => 'required|email',
            'tell' => 'required|numeric|digits_between:5,15',
            'address' => 'required|max:255',
            'detail' => 'required|max:120',
            'category_id' => 'required|exists:categories,id',
        ], [
            'first_name.required' => '名を入力してください',
            'last_name.required' => '姓を入力してください',
            'gender.required' => '性別を選択してください',
            'email.required' => 'メールアドレスを入力してください',
            'email.email' => 'メールアドレスはメール形式で入力してください',
            'tell.required' => '電話番号を入力してください',
            'tell.numeric' => '電話番号は半角数字で入力してください',
            'tell.digits_between' => '電話番号は5桁から15桁で入力してください',
            'address.required' => '住所を入力してください',
            'detail.required' => 'お問い合わせ内容を入力してください',
            'detail.max' => 'お問い合わせ内容は120文字以内で入力してください',
            'category_id.required' => 'お問い合わせの種類を選択してください',
        ]);

        return view('confirm', compact('contact')('validatedData'));
    }

    public function store(Request $request)
    {
        $tell = $request->fast_tell . $request->middle_tell . $request->last_tell;
        Contact::create($request->all());
        return redirect()->route('contact.thanks');
    }

    public function thanks()
    {
        return view('contact.thanks');
    }
}