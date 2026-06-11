@extends('layouts.admin')

@section('title', 'Articles')
@section('page-title', 'Articles')

@section('breadcrumbs')
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="#">Articles</a></li>
@endsection

@section('content')

<div class="row mb-3">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <p class="text-muted mb-0">{{ $articles->total() }} total</p>
        <a href="{{ route('admin.articles.create') }}" class="btn btn-primary btn-sm">
            Write article
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Read time</th>
                    <th>Status</th>
                    <th>Date</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($articles as $article)
                <tr>
                    <td>
                        <div style="max-width:360px;">
                            <div class="fw-semibold">{{ $article->title }}</div>
                            <small class="text-muted">{{ $article->slug }}</small>
                        </div>
                    </td>
                    <td>{{ $article->category_label }}</td>
                    <td>{{ $article->reading_time_minutes }} min</td>
                    <td>
                        @if ($article->is_published)
                            <span class="text-success">Published</span>
                        @else
                            <span class="text-secondary">Draft</span>
                        @endif
                    </td>
                    <td>{{ $article->formatted_date }}</td>
                    <td class="text-end">
                        <a href="{{ route('admin.articles.edit', $article) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.articles.destroy', $article) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this article?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No articles yet. <a href="{{ route('admin.articles.create') }}">Write one.</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if ($articles->hasPages())
<div class="mt-3">{{ $articles->links() }}</div>
@endif

@endsection