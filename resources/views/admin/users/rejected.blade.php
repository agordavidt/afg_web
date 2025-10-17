
@extends('layouts.admin')

@section('title', 'Rejected Applications')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">
                        <i class="fas fa-user-times me-2"></i>Rejected Applications
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
            <h4 class="card-title">Rejected Students ({{ $users->total() }})</h4>
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
                        <a href="{{ route('admin.users.rejected') }}" class="btn btn-secondary btn-sm">
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
                        <th>Registration</th>
                        <th>Date Rejected</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($users as $user)
                        <tr>
                            <td>
                                <strong>{{ $user->full_name }}</strong>
                            </td>
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
                            <td>
                                <span class="badge badge-{{ $user->registration_stage == 'completed' ? 'success' : 'info' }}">
                                    {{ ucfirst(str_replace('_', ' ', $user->registration_stage)) }}
                                </span>
                            </td>
                            <td>
                                <small class="text-muted">{{ $user->created_at->format('M d, Y') }}</small>
                            </td>
                            <td>
                                <div class="btn-group" role="group">
                                    <a href="{{ route('admin.users.show', $user) }}" 
                                       class="btn btn-sm btn-outline-primary" 
                                       title="View Details">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-success" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#editModal" 
                                            data-user-id="{{ $user->id }}" 
                                            data-first-name="{{ $user->first_name }}" 
                                            data-last-name="{{ $user->last_name }}" 
                                            data-email="{{ $user->email }}" 
                                            data-phone="{{ $user->phone_number }}"
                                            data-school="{{ $user->school }}"
                                            data-registration-stage="{{ $user->registration_stage }}"
                                            data-payment-status="{{ $user->payment_status }}"
                                            data-application-status="{{ $user->application_status }}" 
                                            title="Edit User">
                                        <i class="fas fa-edit"></i>
                                    </button>
                                    <button type="button" 
                                            class="btn btn-sm btn-outline-info" 
                                            data-bs-toggle="modal" 
                                            data-bs-target="#smsModal" 
                                            data-user-id="{{ $user->id }}" 
                                            data-user-name="{{ $user->full_name }}" 
                                            data-user-phone="{{ $user->phone_number }}" 
                                            title="Send SMS">
                                        <i class="fas fa-comment-dots"></i>
                                    </button>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="text-center py-5">
                                <i class="fas fa-inbox fa-3x text-muted mb-3 d-block"></i>
                                <p class="text-muted mb-0">No rejected applications found</p>
                                <small class="text-muted">All applications are being reviewed or have been accepted</small>
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

<!-- Edit User Modal -->
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit User</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="editFirstName" class="form-label">First Name</label>
                                <input type="text" class="form-control" id="editFirstName" name="first_name" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="editLastName" class="form-label">Last Name</label>
                                <input type="text" class="form-control" id="editLastName" name="last_name" required>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="editEmail" class="form-label">Email</label>
                                <input type="email" class="form-control" id="editEmail" name="email">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group mb-3">
                                <label for="editPhone" class="form-label">Phone Number</label>
                                <input type="tel" class="form-control" id="editPhone" name="phone_number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="editSchool" class="form-label">School</label>
                        <input type="text" class="form-control" id="editSchool" name="school">
                    </div>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="editRegistrationStage" class="form-label">Registration Stage</label>
                                <select class="form-control" id="editRegistrationStage" name="registration_stage" required>
                                    <option value="imported">Imported</option>
                                    <option value="profile_completion">Profile Completion</option>
                                    <option value="payment">Payment</option>
                                    <option value="completed">Completed</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="editPaymentStatus" class="form-label">Payment Status</label>
                                <select class="form-control" id="editPaymentStatus" name="payment_status" required>
                                    <option value="pending">Pending</option>
                                    <option value="paid">Paid</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group mb-3">
                                <label for="editApplicationStatus" class="form-label">Application Status</label>
                                <select class="form-control" id="editApplicationStatus" name="application_status" required>
                                    <option value="pending">Pending</option>
                                    <option value="reviewing">Reviewing</option>
                                    <option value="accepted">Accepted</option>
                                    <option value="rejected">Rejected</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">
                        <i class="fas fa-save me-2"></i>Update User
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

@include('admin.users.partials.sms-modals', ['schools' => $schools, 'bulkRecipient' => 'rejected'])
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Edit Modal handling
    $('#editModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const userId = button.data('user-id');
        const firstName = button.data('first-name');
        const lastName = button.data('last-name');
        const email = button.data('email');
        const phone = button.data('phone');
        const school = button.data('school');
        const registrationStage = button.data('registration-stage');
        const paymentStatus = button.data('payment-status');
        const applicationStatus = button.data('application-status');
        
        const modal = $(this);
        modal.find('#editForm').attr('action', '/admin/users/' + userId);
        modal.find('#editFirstName').val(firstName);
        modal.find('#editLastName').val(lastName);
        modal.find('#editEmail').val(email);
        modal.find('#editPhone').val(phone);
        modal.find('#editSchool').val(school);
        modal.find('#editRegistrationStage').val(registrationStage);
        modal.find('#editPaymentStatus').val(paymentStatus);
        modal.find('#editApplicationStatus').val(applicationStatus);
    });

    // Form submission with loading state
    $('#editForm').on('submit', function() {
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Updating...');
    });
});
</script>
@endpush