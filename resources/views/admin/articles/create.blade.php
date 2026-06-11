@extends('layouts.admin')

@section('title', 'Write Article')
@section('page-title', 'Write Article')

@section('breadcrumbs')
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="{{ route('admin.articles.index') }}">Articles</a></li>
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="#">Write</a></li>
@endsection

@section('content')

<form action="{{ route('admin.articles.store') }}" method="POST" id="articleForm">
    @csrf
    @include('admin.articles._form')
</form>

@endsection

@push('styles')
@include('admin.articles._editor_styles')
@endpush

@push('scripts')
@include('admin.articles._editor_scripts')
@endpush