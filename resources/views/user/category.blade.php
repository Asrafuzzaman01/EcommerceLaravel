@extends('user.layouts.user_template')

@section('user_page-title')


Category-page

@endsection

@section('content')

<h2> {{ $category->category_name }}</h2>

@endsection
