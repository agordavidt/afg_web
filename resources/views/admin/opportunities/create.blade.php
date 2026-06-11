@extends('layouts.admin')

@section('title', 'Add Opportunity')
@section('page-title', 'Add Opportunity')

@section('breadcrumbs')
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="{{ route('admin.opportunities.index') }}">Opportunities</a></li>
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="#">Add</a></li>
@endsection

@section('content')

<div class="row">
    <div class="col-md-8">
        <form action="{{ route('admin.opportunities.store') }}" method="POST">
            @csrf
            @include('admin.opportunities._form')
            <div class="mt-3 d-flex gap-2">
                <button type="submit" class="btn btn-primary">Save opportunity</button>
                <a href="{{ route('admin.opportunities.index') }}" class="btn btn-outline-secondary">Cancel</a>
            </div>
        </form>
    </div>
</div>

@endsection