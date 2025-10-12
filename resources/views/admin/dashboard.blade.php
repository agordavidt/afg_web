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
                            <p class="card-category">Completed Profiles</p>
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

<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <div class="card-head-row">
                    <div class="card-title">Registration Status Overview</div>
                </div>
            </div>
            <div class="card-body">
                <canvas id="registrationChart" width="400" height="100"></canvas>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const ctx = document.getElementById('registrationChart').getContext('2d');
    
    const completedCount = {{ $registrationData['completed'] }};
    const uncompletedCount = {{ $registrationData['uncompleted'] }};
    
    new Chart(ctx, {
        type: 'pie',
        data: {
            labels: ['Completed Registrations', 'Uncompleted Registrations'],
            datasets: [{
                data: [completedCount, uncompletedCount],
                backgroundColor: [
                    'rgba(40, 167, 69, 0.8)',   // Green for completed
                    'rgba(255, 193, 7, 0.8)'    // Yellow/Orange for uncompleted
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
                    display: true,
                    position: 'bottom',
                    labels: {
                        padding: 20,
                        font: {
                            size: 13
                        }
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            const total = completedCount + uncompletedCount;
                            const percentage = ((context.parsed / total) * 100).toFixed(1);
                            return context.label + ': ' + context.parsed + ' students (' + percentage + '%)';
                        }
                    }
                }
            }
        }
    });
});
</script>
@endpush