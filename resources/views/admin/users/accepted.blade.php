@extends('layouts.admin')

@section('title', 'Accepted Applications')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <i class="fas fa-user-check me-2"></i>Accepted Applications
                    </div>
                    <div class="card-tools">
                        <button type="button" class="btn btn-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#bulkSmsModal">
                            <i class="fas fa-sms me-2"></i>Bulk SMS
                        </button>
                        <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-arrow-left me-2"></i>Back to Dashboard
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <div class="d-flex align-items-center">
            <h4 class="card-title">Accepted Students ({{ $users->total() }})</h4>
            <div class="ml-auto">
                <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
                    <input type="text" name="search" class="form-control form-control-sm" 
                           placeholder="Search..." value="{{ request('search') }}" style="width: 200px;">
                    
                    <select name="school" class="form-control form-control-sm" style="width: 180px;">
                        <option value="">All Universities</option>
                        @foreach($schools as $school)
                            <option value="{{ $school }}" {{ request('school') == $school ? 'selected' : '' }}>
                                {{ Str::limit($school, 25) }}
                            </option>
                        @endforeach
                    </select>

                    <button type="submit" class="btn btn-primary btn-sm">
                        <i class="fas fa-filter me-1"></i>Filter
                    </button>

                    @if(request()->hasAny(['search', 'school']))
                        <a href="{{ route('admin.users.accepted') }}" class="btn btn-secondary btn-sm">
                            <i class="fas fa-times me-1"></i>Clear
                        </a>
                    @endif
                </form>
            </div>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Email</th>
                        <th>School</th>
                        <th>Payment Status</th>
                        <th>Date Accepted</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td>{{ $user->email ?: 'N/A' }}</td>
                            <td title="{{ $user->school }}">{{ Str::limit($user->school ?: 'N/A', 20) }}</td>
                            <td>
                                @if($user->payment_status == 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.show', $user) }}" class="btn btn-sm btn-outline-primary" title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" class="btn btn-sm btn-outline-info" data-bs-toggle="modal" 
                                            data-bs-target="#smsModal" data-user-id="{{ $user->id }}" 
                                            data-user-name="{{ $user->full_name }}" 
                                            data-user-phone="{{ $user->phone_number }}" title="Send SMS">
                                        <i class="fas fa-comment-dots"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No accepted applications found</p>
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        
        @if($users->hasPages())
            <div class="card-footer">
                {{ $users->appends(request()->query())->links('vendor.pagination.bootstrap-4-clean') }}
            </div>
        @endif
    </div>
</div>

@include('admin.users.partials.sms-modals', ['schools' => $schools, 'bulkRecipient' => 'accepted'])
@endsection