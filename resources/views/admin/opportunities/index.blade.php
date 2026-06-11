@extends('layouts.admin')

@section('title', 'Opportunities')
@section('page-title', 'Opportunities')

@section('breadcrumbs')
<li class="separator"><i class="icon-arrow-right"></i></li>
<li class="nav-item"><a href="#">Opportunities</a></li>
@endsection

@section('content')

<div class="row mb-3">
    <div class="col-md-12 d-flex justify-content-between align-items-center">
        <p class="text-muted mb-0">{{ $opportunities->total() }} total</p>
        <a href="{{ route('admin.opportunities.create') }}" class="btn btn-primary btn-sm">
            Add opportunity
        </a>
    </div>
</div>

<div class="card">
    <div class="card-body p-0">
        <table class="table table-hover mb-0">
            <thead class="table-light">
                <tr>
                    <th>Title</th>
                    <th>Type</th>
                    <th>Deadline</th>
                    <th>Source</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @forelse ($opportunities as $opp)
                <tr>
                    <td>
                        <div style="max-width:340px;">
                            <div class="fw-semibold">{{ $opp->title }}</div>
                            <small class="text-muted">{{ $opp->slug }}</small>
                        </div>
                    </td>
                    <td>{{ $opp->type_label }}</td>
                    <td>
                        @if ($opp->deadline)
                            {{ $opp->deadline->format('d M Y') }}
                            @if ($opp->is_urgent)
                                <span class="text-danger ms-1" style="font-size:0.75rem;">urgent</span>
                            @endif
                        @else
                            <span class="text-muted">Rolling</span>
                        @endif
                    </td>
                    <td>{{ $opp->source_name }}</td>
                    <td>
                        @if ($opp->is_active)
                            <span class="text-success">Active</span>
                        @else
                            <span class="text-secondary">Inactive</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <a href="{{ route('admin.opportunities.edit', $opp) }}" class="btn btn-sm btn-outline-secondary">Edit</a>
                        <form action="{{ route('admin.opportunities.destroy', $opp) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this opportunity?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="6" class="text-center py-4 text-muted">No opportunities yet. <a href="{{ route('admin.opportunities.create') }}">Add one.</a></td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>

@if ($opportunities->hasPages())
<div class="mt-3">{{ $opportunities->links() }}</div>
@endif

@endsection