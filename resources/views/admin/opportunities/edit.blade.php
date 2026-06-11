@extends('layouts.admin')

@section('title', 'Edit Opportunity')
@section('page-title', 'Edit Opportunity')

@section('breadcrumbs')
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="{{ route('admin.opportunities.index') }}">Opportunities</a></li>
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="#">Edit</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('admin.opportunities.update', $opportunity) }}" method="POST">
            @csrf @method('PUT')
            @include('admin.opportunities._form')
            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Update opportunity</button>
                <a href="{{ route('admin.opportunities.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
    <div class="col-md-4">
        <div class="card">
            <div class="card-body">
                <p class="text-muted mb-1" style="font-size:0.8rem;">SLUG</p>
                <code style="word-break:break-all;">{{ $opportunity->slug }}</code>
                <hr>
                <p class="text-muted mb-1" style="font-size:0.8rem;">CREATED</p>
                <p class="mb-0">{{ $opportunity->created_at->format('d M Y, H:i') }}</p>
                <hr>
                <p class="text-muted mb-1" style="font-size:0.8rem;">FRONTEND URL</p>
                <a href="{{ route('opportunities.show', $opportunity->slug) }}" target="_blank" style="font-size:0.85rem;">
                    View on site ↗
                </a>
            </div>
        </div>
    </div>
</div>

@endsection