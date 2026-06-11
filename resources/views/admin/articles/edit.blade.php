@extends('layouts.admin')

@section('title', 'Edit Article')
@section('page-title', 'Edit Article')

@section('breadcrumbs')
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="{{ route('admin.articles.index') }}">Articles</a></li>
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="#">Edit</a></li>
@endsection

@section('content')

<form action="{{ route('admin.articles.update', $article) }}" method="POST" id="articleForm">
    @csrf @method('PUT')
    @include('admin.articles._form')
</form>

@endsection

@push('styles')
@include('admin.articles._editor_styles')
@endpush

@push('scripts')
@include('admin.articles._editor_scripts', ['existingContent' => $article->body])
@endpush