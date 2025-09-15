<?php
/**
 * @var \App\View\AppView $this
 * @var array $stats
 * @var array $recentActivities
 * @var array $attendanceData
 * @var array $offeringData
 * @var array $membershipData
 * @var array $financialData
 * @var array $projectData
 * @var array $monthlyOfferings
 * @var array $expenseBreakdown
 */
?>

    <div class="dashboard-container">
        <!-- Statistics Cards -->
        <div class="row">
            <div class="col-xxl-3 col-xl-3">
                <div class="card custom-card overflow-hidden main-content-card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2 gap-1 flex-xxl-nowrap flex-wrap">
                            <div>
                                <span class="text-muted d-block mb-1 text-nowrap">Total Members</span>
                                <h4 class="fw-medium mb-0"><?= number_format($stats['total_members']) ?></h4>
                            </div>
                            <div class="lh-1">
                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                    <i class="fa-thin fa-users fs-5"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3">
                <div class="card custom-card overflow-hidden main-content-card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2 gap-1 flex-xxl-nowrap flex-wrap">
                            <div>
                                <span class="text-muted d-block mb-1 text-nowrap">Total Offerings</span>
                                <h4 class="fw-medium mb-0">$<?= number_format($stats['total_offerings'], 2) ?></h4>
                            </div>
                            <div class="lh-1">
                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                    <i class="fa-thin fa-circle-dollar-to-slot fs-5"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3">
                <div class="card custom-card overflow-hidden main-content-card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2 gap-1 flex-xxl-nowrap flex-wrap">
                            <div>
                                <span class="text-muted d-block mb-1 text-nowrap">Active Projects</span>
                                <h4 class="fw-medium mb-0"><?= number_format($stats['active_projects']) ?></h4>
                            </div>
                            <div class="lh-1">
                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                    <i class="fa-thin fa-diagram-project fs-5"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                    </div>
                </div>
            </div>
            <div class="col-xxl-3 col-xl-3">
                <div class="card custom-card overflow-hidden main-content-card">
                    <div class="card-body">
                        <div class="d-flex align-items-start justify-content-between mb-2 gap-1 flex-xxl-nowrap flex-wrap">
                            <div>
                                <span class="text-muted d-block mb-1 text-nowrap">Net Balance</span>
                                <h4 class="fw-medium mb-0">$<?= number_format($stats['net_balance'], 2) ?></h4>
                            </div>
                            <div class="lh-1">
                                <span class="avatar avatar-md avatar-rounded bg-primary">
                                    <i class="fa-thin fa-money-bill-1-wave fs-5"></i>
                                </span>
                            </div>
                        </div>
                        <div class="text-muted fs-13">Increased By <span class="text-success">2.56%<i class="ti ti-arrow-narrow-up fs-16"></i></span></div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Financial Overview Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Income vs Expenses</h5>
                        <div class="btn-group">
                            <button type="button" class="btn btn-sm btn-outline-secondary active" data-period="monthly">Monthly</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-period="quarterly">Quarterly</button>
                            <button type="button" class="btn btn-sm btn-outline-secondary" data-period="yearly">Yearly</button>
                        </div>
                    </div>
                    <div class="card-body">
                        <canvas id="financialChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Monthly Offerings Trend</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="monthlyOfferingsChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Projects and Expenses Section -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Projects Overview</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="projectsChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Expense Breakdown</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="expensesChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Additional Charts Section -->
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Offerings by Type</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="offeringChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Membership Distribution</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="membershipChart" height="250"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Attendance Trend (Last 7 Days)</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="attendanceChart" height="250"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <!-- Recent Activities Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Recent Activities</h5>
                        <a href="#" class="btn btn-sm btn-outline-primary">View All</a>
                    </div>
                    <div class="card-body">
                        <div class="activity-feed">
                            <?php foreach ($recentActivities as $activity): ?>
                                <div class="activity-item">
                                    <div class="activity-icon">
                                        <i class="fas fa-<?= $activity['icon'] ?>"></i>
                                    </div>
                                    <div class="activity-content">
                                        <h6><?= $activity['title'] ?></h6>
                                        <p><?= $activity['description'] ?></p>
                                        <small class="text-muted">
                                            <?= $activity['time']->timeAgoInWords() ?>
                                        </small>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Project Contributions Section -->
        <div class="row mt-4">
            <div class="col-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Project Contributions Progress</h5>
                        <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'index']) ?>" class="btn btn-sm btn-outline-primary">View All Projects</a>
                    </div>
                    <div class="card-body">
                        <?php if (!empty($projectContributions)): ?>
                            <div class="project-contributions">
                                <?php foreach ($projectContributions as $project): ?>
                                    <div class="project-item mb-4">
                                        <div class="d-flex justify-content-between align-items-center mb-2">
                                            <h6 class="mb-0"><?= h($project['title']) ?></h6>
                                            <span class="badge bg-<?=
                                            $project['progress'] >= 100 ? 'success' :
                                                ($project['progress'] >= 75 ? 'primary' :
                                                    ($project['progress'] >= 50 ? 'warning' : 'danger'))
                                            ?>">
                                        <?= $project['progress'] ?>% Complete
                                    </span>
                                        </div>

                                        <div class="progress mb-2" style="height: 20px;">
                                            <div class="progress-bar
                                        <?= $project['progress'] >= 100 ? 'bg-success' :
                                                ($project['progress'] >= 75 ? 'bg-primary' :
                                                    ($project['progress'] >= 50 ? 'bg-warning' : 'bg-danger')) ?>"
                                                 role="progressbar"
                                                 style="width: <?= $project['progress'] ?>%;"
                                                 aria-valuenow="<?= $project['progress'] ?>"
                                                 aria-valuemin="0"
                                                 aria-valuemax="100">
                                                <?= $project['progress'] ?>%
                                            </div>
                                        </div>

                                        <div class="d-flex justify-content-between">
                                            <small class="text-muted">
                                                Collected: $<?= number_format($project['collected_amount'], 2) ?>
                                            </small>
                                            <small class="text-muted">
                                                Target: $<?= number_format($project['target_amount'], 2) ?>
                                            </small>
                                        </div>

                                        <div class="d-flex justify-content-between mt-1">
                                            <small class="text-muted">
                                                Status: <span class="text-<?=
                                                $project['status'] === 'Completed' ? 'success' :
                                                    ($project['status'] === 'In Progress' ? 'primary' : 'secondary')
                                                ?>"><?= h($project['status']) ?></span>
                                            </small>
                                            <small class="text-muted">
                                                <?php if ($project['end_date']): ?>
                                                    Deadline: <?= $project['end_date']->format('M d, Y') ?>
                                                <?php endif; ?>
                                            </small>
                                        </div>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                        <?php else: ?>
                            <div class="text-center py-4">
                                <i class="fas fa-project-diagram fa-3x text-muted mb-3"></i>
                                <p class="text-muted">No projects found. Start by creating a new project.</p>
                                <a href="<?= $this->Url->build(['controller' => 'Projects', 'action' => 'add']) ?>" class="btn btn-primary">
                                    <i class="fas fa-plus"></i> Create New Project
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Alternative: Project Contributions Chart View -->
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h5>Project Funding Status</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="projectFundingChart" height="300"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5>Top Projects by Progress</h5>
                    </div>
                    <div class="card-body">
                        <canvas id="projectProgressChart" height="300"></canvas>
                    </div>
                </div>
            </div>
        </div>

    </div>

<?php $this->append('css'); ?>
    <style>
        .stat-card {
            background: white;
            border-radius: 10px;
            padding: 20px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            display: flex;
            align-items: center;
            margin-bottom: 20px;
        }

        .stat-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: white;
            font-size: 24px;
        }

        .stat-content h3 {
            margin: 0;
            font-weight: bold;
            font-size: 1.8rem;
        }

        .stat-content p {
            margin: 0;
            color: #6c757d;
            font-weight: 500;
        }

        .activity-feed {
            max-height: 400px;
            overflow-y: auto;
        }

        .activity-item {
            display: flex;
            padding: 15px 0;
            border-bottom: 1px solid #eee;
        }

        .activity-item:last-child {
            border-bottom: none;
        }

        .activity-icon {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: #f8f9fa;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 15px;
            color: #6c757d;
            flex-shrink: 0;
        }

        .activity-content h6 {
            margin: 0;
            font-weight: 600;
            color: #2c3e50;
        }

        .activity-content p {
            margin: 5px 0;
            font-size: 14px;
            color: #7f8c8d;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0,0,0,0.1);
            margin-bottom: 20px;
        }

        .card-header {
            background: white;
            border-bottom: 1px solid #eee;
            font-weight: 600;
            padding: 15px 20px;
        }

        .card-body {
            padding: 20px;
        }

        .dashboard-container {
            padding: 20px;
        }

        .dashboard-header {
            margin-bottom: 30px;
        }

        .dashboard-header h1 {
            color: #2c3e50;
            margin-bottom: 5px;
            font-weight: 700;
        }

        .dashboard-header p {
            color: #7f8c8d;
            font-size: 16px;
        }

        .bg-primary { background-color: #007bff !important; }
        .bg-success { background-color: #28a745 !important; }
        .bg-info { background-color: #17a2b8 !important; }
        .bg-warning { background-color: #ffc107 !important; }
        .bg-danger { background-color: #dc3545 !important; }
        .bg-secondary { background-color: #6c757d !important; }
        .bg-dark { background-color: #343a40 !important; }

        .btn-group .btn {
            border-radius: 5px;
            margin: 0 2px;
        }

        .btn-group .btn.active {
            background-color: #007bff;
            color: white;
        }
    </style>
<?php $this->end(); ?>

<?php $this->append('script'); ?>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        $(document).ready(function() {
            // Financial Chart (Income vs Expenses)
            const financialCtx = document.getElementById('financialChart').getContext('2d');
            new Chart(financialCtx, {
                type: 'bar',
                data: {
                    labels: <?= json_encode(array_column($financialData['income'], 'month')) ?>,
                    datasets: [
                        {
                            label: 'Income',
                            data: <?= json_encode(array_column($financialData['income'], 'amount')) ?>,
                            backgroundColor: 'rgba(40, 167, 69, 0.7)',
                            borderColor: 'rgba(40, 167, 69, 1)',
                            borderWidth: 1
                        },
                        {
                            label: 'Expenses',
                            data: <?= json_encode(array_column($financialData['expense'], 'amount')) ?>,
                            backgroundColor: 'rgba(220, 53, 69, 0.7)',
                            borderColor: 'rgba(220, 53, 69, 1)',
                            borderWidth: 1
                        }
                    ]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Monthly Offerings Chart
            const monthlyOfferingsCtx = document.getElementById('monthlyOfferingsChart').getContext('2d');
            new Chart(monthlyOfferingsCtx, {
                type: 'line',
                data: {
                    labels: <?= json_encode(array_column($monthlyOfferings, 'month')) ?>,
                    datasets: [{
                        label: 'Monthly Offerings',
                        data: <?= json_encode(array_column($monthlyOfferings, 'amount')) ?>,
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0, 123, 255, 0.1)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    scales: {
                        y: {
                            beginAtZero: true,
                            ticks: {
                                callback: function(value) {
                                    return '$' + value.toLocaleString();
                                }
                            }
                        }
                    }
                }
            });

            // Projects Chart
            const projectsCtx = document.getElementById('projectsChart').getContext('2d');
            new Chart(projectsCtx, {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode(array_column($projectData, 'status')) ?>,
                    datasets: [{
                        data: <?= json_encode(array_column($projectData, 'count')) ?>,
                        backgroundColor: [
                            '#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d', '#17a2b8'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Expenses Breakdown Chart
            const expensesCtx = document.getElementById('expensesChart').getContext('2d');
            new Chart(expensesCtx, {
                type: 'pie',
                data: {
                    labels: <?= json_encode(array_column($expenseBreakdown, 'type')) ?>,
                    datasets: [{
                        data: <?= json_encode(array_column($expenseBreakdown, 'amount')) ?>,
                        backgroundColor: [
                            '#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d', '#17a2b8'
                        ]
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Offering Chart
            const offeringCtx = document.getElementById('offeringChart').getContext('2d');
            new Chart(offeringCtx, {
                type: 'doughnut',
                data: {
                    labels: <?= json_encode(array_column($offeringData, 'type')) ?>,
                    datasets: [{
                        data: <?= json_encode(array_column($offeringData, 'amount')) ?>,
                        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Membership Chart
            const membershipCtx = document.getElementById('membershipChart').getContext('2d');
            new Chart(membershipCtx, {
                type: 'pie',
                data: {
                    labels: <?= json_encode(array_column($membershipData, 'status')) ?>,
                    datasets: [{
                        data: <?= json_encode(array_column($membershipData, 'count')) ?>,
                        backgroundColor: ['#007bff', '#28a745', '#ffc107', '#dc3545']
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    plugins: {
                        legend: {
                            position: 'bottom'
                        }
                    }
                }
            });

            // Attendance Chart
            const attendanceCtx = document.getElementById('attendanceChart').getContext('2d');
            new Chart(attendanceCtx, {
                type: 'line',
                data: {
                    labels: <?= json_encode(array_column($attendanceData, 'date')) ?>,
                    datasets: [{
                        label: 'Total Attendance',
                        data: <?= json_encode(array_column($attendanceData, 'total')) ?>,
                        borderColor: '#007bff',
                        backgroundColor: 'rgba(0, 123, 255, 0.1)',
                        fill: true,
                        tension: 0.3
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false
                }
            });

            // Period selector functionality
            $('.btn-group .btn').on('click', function() {
                $('.btn-group .btn').removeClass('active');
                $(this).addClass('active');
                // Here you would typically reload the chart data based on the selected period
                // For now, we'll just show a message
                const period = $(this).data('period');
                console.log('Selected period: ' + period);
                // In a real implementation, you would fetch new data from the server here
            });
        });
    </script>

<script>
    // Project Contributions Charts
    const projectFundingCtx = document.getElementById('projectFundingChart').getContext('2d');
    new Chart(projectFundingCtx, {
        type: 'doughnut',
        data: {
            labels: <?= json_encode(array_column($projectContributions, 'title')) ?>,
            datasets: [{
                data: <?= json_encode(array_column($projectContributions, 'progress')) ?>,
                backgroundColor: [
                    '#007bff', '#28a745', '#ffc107', '#dc3545', '#6c757d',
                    '#17a2b8', '#6610f2', '#fd7e14', '#20c997', '#e83e8c'
                ]
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            plugins: {
                legend: {
                    position: 'right',
                    labels: {
                        boxWidth: 12
                    }
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return context.label + ': ' + context.raw + '%';
                        }
                    }
                }
            }
        }
    });

    // Project Progress Chart
    const projectProgressCtx = document.getElementById('projectProgressChart').getContext('2d');
    new Chart(projectProgressCtx, {
        type: 'bar',
        data: {
            labels: <?= json_encode(array_slice(array_column($projectContributions, 'title'), 0, 5)) ?>,
            datasets: [{
                label: 'Progress %',
                data: <?= json_encode(array_slice(array_column($projectContributions, 'progress'), 0, 5)) ?>,
                backgroundColor: function(context) {
                    const value = context.dataset.data[context.dataIndex];
                    return value >= 100 ? '#28a745' :
                        value >= 75 ? '#007bff' :
                            value >= 50 ? '#ffc107' : '#dc3545';
                },
                borderWidth: 0
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            indexAxis: 'y',
            scales: {
                x: {
                    beginAtZero: true,
                    max: 100,
                    ticks: {
                        callback: function(value) {
                            return value + '%';
                        }
                    }
                }
            },
            plugins: {
                legend: {
                    display: false
                },
                tooltip: {
                    callbacks: {
                        label: function(context) {
                            return 'Progress: ' + context.raw + '%';
                        }
                    }
                }
            }
        }
    });
</script>
<?php $this->end(); ?>
