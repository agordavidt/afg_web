@extends('layouts.admin')

@section('title', 'Dashboard')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Dashboard Overview</div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Stats Cards -->
<div class="row">
    <div class="col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="icon-big text-center icon-primary bubble-shadow-small">
                            <i class="fas fa-users"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Total Students</p>
                            <h4 class="card-title">{{ number_format($stats['total_students']) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="icon-big text-center icon-success bubble-shadow-small">
                            <i class="fas fa-check-circle"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Completed</p>
                            <h4 class="card-title">{{ number_format($stats['completed_profiles']) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="icon-big text-center icon-warning bubble-shadow-small">
                            <i class="fas fa-clock"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Pending Reviews</p>
                            <h4 class="card-title">{{ number_format($stats['pending_reviews']) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-3">
        <div class="card card-stats card-round">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-5">
                        <div class="icon-big text-center icon-info bubble-shadow-small">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                    <div class="col-7 col-stats">
                        <div class="numbers">
                            <p class="card-category">Total Collected</p>
                            <h4 class="card-title">₦{{ number_format($stats['total_payments']) }}</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Access Links -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Quick Access</h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.pending') }}" class="text-decoration-none">
                            <div class="card card-hover bg-warning-gradient">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-hourglass-half fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Pending Registrations</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['pending_count']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.completed') }}" class="text-decoration-none">
                            <div class="card card-hover bg-success-gradient">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-check-double fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Completed Registrations</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['completed_profiles']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.paid') }}" class="text-decoration-none">
                            <div class="card card-hover bg-primary-gradient">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-money-check-alt fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Paid Students</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['paid_count']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.payment-pending') }}" class="text-decoration-none">
                            <div class="card card-hover bg-danger-gradient">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-exclamation-circle fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Payment Pending</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['payment_pending_count']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.accepted') }}" class="text-decoration-none">
                            <div class="card card-hover bg-info-gradient">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-user-check fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Accepted Applications</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['accepted_count']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.rejected') }}" class="text-decoration-none">
                            <div class="card card-hover bg-secondary-gradient">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-user-times fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Rejected Applications</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['rejected_count']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.users.index') }}" class="text-decoration-none">
                            <div class="card card-hover" style="background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-list fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">All Students</h5>
                                    <h3 class="text-white mb-0">{{ number_format($stats['total_students']) }}</h3>
                                </div>
                            </div>
                        </a>
                    </div>

                    <div class="col-md-3 mb-3">
                        <a href="{{ route('admin.import.index') }}" class="text-decoration-none">
                            <div class="card card-hover" style="background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);">
                                <div class="card-body p-4 text-center">
                                    <div class="mb-3">
                                        <i class="fas fa-file-import fa-3x text-white"></i>
                                    </div>
                                    <h5 class="text-white mb-2">Import Students</h5>
                                    <p class="text-white mb-0 small">Upload CSV/Excel</p>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Charts Row -->
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Registration Status</div>
            </div>
            <div class="card-body">
                <canvas id="registrationChart" height="300"></canvas>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Payment Status</div>
            </div>
            <div class="card-body">
                <canvas id="paymentChart" height="300"></canvas>
            </div>
        </div>
    </div>
</div>

<!-- Application Status Chart -->
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-title">Application Status Distribution</div>
            </div>
            <div class="card-body">
                <canvas id="applicationChart" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.card-hover {
    transition: all 0.3s ease;
    cursor: pointer;
}
.card-hover:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 20px rgba(0,0,0,0.2);
}
.bg-warning-gradient {
    background: linear-gradient(135deg, #f093fb 0%, #f5576c 100%);
}
.bg-success-gradient {
    background: linear-gradient(135deg, #4facfe 0%, #00f2fe 100%);
}
.bg-primary-gradient {
    background: linear-gradient(135deg, #43e97b 0%, #38f9d7 100%);
}
.bg-danger-gradient {
    background: linear-gradient(135deg, #fa709a 0%, #fee140 100%);
}
.bg-info-gradient {
    background: linear-gradient(135deg, #30cfd0 0%, #330867 100%);
}
.bg-secondary-gradient {
    background: linear-gradient(135deg, #a8edea 0%, #fed6e3 100%);
}
</style>
@endpush

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Registration Status Chart
    const regCtx = document.getElementById('registrationChart').getContext('2d');
    new Chart(regCtx, {
        type: 'pie',
        data: {
            labels: ['Completed', 'Uncompleted'],
            datasets: [{
                data: [{{ $registrationData['completed'] }}, {{ $registrationData['uncompleted'] }}],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(255, 193, 7, 0.8)'
                ],
                borderColor: [
                    'rgba(40, 167, 69, 1)',
                    'rgba(255, 193, 7, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 20, font: { size: 13 } }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = {{ $registrationData['completed'] + $registrationData['uncompleted'] }};
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });

    // Payment Status Chart
    const payCtx = document.getElementById('paymentChart').getContext('2d');
    new Chart(payCtx, {
        type: 'doughnut',
        data: {
            labels: ['Paid', 'Pending'],
            datasets: [{
                data: [{{ $stats['paid_count'] }}, {{ $stats['payment_pending_count'] }}],
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'bottom',
                    labels: { padding: 20, font: { size: 13 } }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = {{ $stats['paid_count'] + $stats['payment_pending_count'] }};
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });

    // Application Status Chart
    const appCtx = document.getElementById('applicationChart').getContext('2d');
    new Chart(appCtx, {
        type: 'bar',
        data: {
            labels: ['Pending', 'Reviewing', 'Accepted', 'Rejected'],
            datasets: [{
                label: 'Applications',
                data: [
                    {{ $stats['pending_count'] }},
                    {{ $stats['reviewing_count'] }},
                    {{ $stats['accepted_count'] }},
                    {{ $stats['rejected_count'] }}
                ],
                backgroundColor: [
                    'rgba(255, 206, 86, 0.8)',
                    'rgba(75, 192, 192, 0.8)',
                    'rgba(40, 167, 69, 0.8)',
                    'rgba(255, 99, 132, 0.8)'
                ],
                borderColor: [
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(40, 167, 69, 1)',
                    'rgba(255, 99, 132, 1)'
                ],
                borderWidth: 2
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { stepSize: 1 }
                }
            },
            plugins: {
                legend: { display: false }
            }
        }
    });
});
</script>
@endpush