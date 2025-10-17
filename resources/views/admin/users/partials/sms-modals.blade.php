<!-- Single SMS Modal -->
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
                    <div class="form-group mb-3">
                        <label class="form-label">Recipient</label>
                        <p class="form-control-static fw-bold" id="smsRecipient"></p>
                    </div>
                    <div class="form-group mb-3">
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
                <h5 class="modal-title">Send Bulk SMS</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <form method="POST" action="{{ route('admin.users.bulk-sms') }}">
                @csrf
                <input type="hidden" name="recipients" value="{{ $bulkRecipient ?? 'all' }}">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group mb-3">
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
                            <div class="form-group mb-3">
                                <label for="createdSince" class="form-label">Created After (Optional)</label>
                                <input type="date" class="form-control" id="createdSince" name="created_since">
                                <small class="form-text text-muted">Filter to new users only</small>
                            </div>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <label for="bulkMessage" class="form-label">Message</label>
                        <textarea class="form-control" id="bulkMessage" name="message" rows="4" 
                                  maxlength="160" required placeholder="Enter your bulk message..."></textarea>
                        <small class="form-text text-muted">
                            <span id="bulkCharCount">0</span>/160 characters
                        </small>
                    </div>
                    <div class="alert alert-warning mb-0">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <strong>Warning:</strong> This will send SMS to all users matching the selected criteria. 
                        Please ensure your message is appropriate and necessary.
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

@push('scripts')
<script>
$(document).ready(function() {
    // Single SMS Modal handling
    $('#smsModal').on('show.bs.modal', function (event) {
        const button = $(event.relatedTarget);
        const userId = button.data('user-id');
        const userName = button.data('user-name');
        const userPhone = button.data('user-phone');
        
        const modal = $(this);
        modal.find('#smsRecipient').text(userName + ' (' + userPhone + ')');
        modal.find('#smsForm').attr('action', '/admin/users/' + userId + '/sms');
        modal.find('#smsMessage').val(''); // Clear previous message
        modal.find('#charCount').text('0'); // Reset counter
    });

    // Character count for SMS messages
    $('#smsMessage, #bulkMessage').on('input', function() {
        const maxLength = 160;
        const currentLength = $(this).val().length;
        const countElement = $(this).is('#smsMessage') ? '#charCount' : '#bulkCharCount';
        
        $(countElement).text(currentLength);
        
        if (currentLength > maxLength) {
            $(countElement).addClass('text-danger');
        } else {
            $(countElement).removeClass('text-danger');
        }
    });

    // Reset bulk SMS form when modal is closed
    $('#bulkSmsModal').on('hidden.bs.modal', function () {
        $(this).find('form')[0].reset();
        $('#bulkCharCount').text('0');
    });

    // Form submission with loading state
    $('#smsForm').on('submit', function() {
        const submitBtn = $(this).find('button[type="submit"]');
        submitBtn.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Sending...');
    });
});
</script>
@endpush