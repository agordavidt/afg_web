@extends('layouts.admin')

@section('title', 'Completed Registrations')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <i class="fas fa-check-double me-2"></i>Completed Registrations
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
            <h4 class="card-title">Completed Students ({{ $users->total() }})</h4>
            <div class="ml-auto">
                <form method="GET" class="d-flex flex-wrap gap-2 align-items-center">
                    <input type="text" name="search" class="form-control form-control-sm" 
                           placeholder="Search..." value="{{ request('search') }}" style="width: 200px;">
                    
                    <select name="application_status" class="form-control form-control-sm" style="width: 140px;">
                        <option value="">All Applications</option>
                        <option value="pending" {{ request('application_status') == 'pending' ? 'selected' : '' }}>Pending</option>
                        <option value="reviewing" {{ request('application_status') == 'reviewing' ? 'selected' : '' }}>Reviewing</option>
                        <option value="accepted" {{ request('application_status') == 'accepted' ? 'selected' : '' }}>Accepted</option>
                        <option value="rejected" {{ request('application_status') == 'rejected' ? 'selected' : '' }}>Rejected</option>
                    </select>

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

                    @if(request()->hasAny(['search', 'application_status', 'school']))
                        <a href="{{ route('admin.users.completed') }}" class="btn btn-secondary btn-sm">
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
                        <th>School</th>
                        <th>Payment</th>
                        <th>Application Status</th>
                        <th>Date</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>{{ $user->full_name }}</td>
                            <td>{{ $user->phone_number }}</td>
                            <td title="{{ $user->school }}">{{ Str::limit($user->school ?: 'N/A', 20) }}</td>
                            <td>
                                @if($user->payment_status == 'paid')
                                    <span class="badge badge-success">Paid</span>
                                @else
                                    <span class="badge badge-warning">Pending</span>
                                @endif
                            </td>
                            <td>
                                <span class="badge badge-{{ $user->application_status == 'accepted' ? 'success' : ($user->application_status == 'rejected' ? 'danger' : 'warning') }}">
                                    {{ ucfirst($user->application_status) }}
                                </span>
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
                                <p class="text-muted">No completed registrations found</p>
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

<!-- SMS Modal -->
<div class="modal fade" id="smsModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="smsForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label class="form-label">Recipient</label>
                        <p class="form-control-static" id="smsRecipient"></p>
                    </div>
                    <div class="form-group">
                        <label for="smsMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="smsMessage" name="message" rows="4" 
                                  maxlength="160" required placeholder="Enter your message..."></textarea>
                        <small class="form-text text-muted">
                            <span id="charCount">0</span>/160 characters
                        </small>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-paper-plane me-2"></i>Send SMS
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Bulk SMS Modal -->
<div class="modal fade" id="bulkSmsModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send Bulk SMS to Completed Students</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.users.bulk-sms') }}">
                @csrf
                <input type="hidden" name="recipients" value="all">
                <input type="hidden" name="registration_stage_filter" value="completed">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="schoolFilter" class="form-label">University Filter (Optional)</label>
                                <select class="form-control" id="schoolFilter" name="school_filter">
                                    <option value="">All Universities</option>
                                    @foreach($schools as $school)
                                        <option value="{{ $school }}">{{ $school }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="applicationStatusFilter" class="form-label">Application Status (Optional)</label>
                                <select class="form-control" id="applicationStatusFilter" name="application_status_filter">
                                    <option value="">All Statuses</option>
                                    <option value="pending">Pending</option>
                                    <option value="reviewing">Reviewing</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="bulkMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="bulkMessage" name="message" rows="4" 
                                  maxlength="160" required placeholder="Enter your bulk message..."></textarea>
                        <small class="form-text text-muted">
                            <span id="bulkCharCount">0</span>/160 characters
                        </small>
                    </div>
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        This will send SMS to all completed students matching your filters.
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-broadcast-tower me-2"></i>Send Bulk SMS
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    $('#smsModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const userId = button.data('user-id');
        const userName = button.data('user-name');
        const userPhone = button.data('user-phone');
        
        const modal = $(this);
        modal.find('#smsRecipient').text(userName + ' (' + userPhone + ')');
        modal.find('#smsForm').attr('action', '/admin/users/' + userId + '/sms');
    });

    $('#smsMessage, #bulkMessage').on('input', function() {
        const currentLength = $(this).val().length;
        const countElement = $(this).is('#smsMessage') ? '#charCount' : '#bulkCharCount';
        
        $(countElement).text(currentLength);
        
        if (currentLength > 160) {
            $(countElement).addClass('text-danger');
        } else {
            $(countElement).removeClass('text-danger');
        }
    });
});
</script>
@endpush