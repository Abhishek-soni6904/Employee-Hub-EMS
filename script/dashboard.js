const sidebarToggle = document.getElementById('toggle-btn');
const sidebar = document.querySelector('.sidebar');

sidebarToggle.addEventListener('click', () => {
    sidebar.classList.toggle('collapsed');
});

const ctx = document.getElementById('performanceChart').getContext('2d');

// Extract departments and counts
const departments = departmentData.map(item => item.department);
const counts = departmentData.map(item => item.count);

// Define an array of colors for the bars
const barColors = [
    'rgba(255, 99, 132, 0.8)',   // Pink
    'rgba(54, 162, 235, 0.8)',   // Blue
    'rgba(255, 206, 86, 0.8)',   // Yellow
    'rgba(75, 192, 192, 0.8)',   // Teal
    'rgba(153, 102, 255, 0.8)',  // Purple
    'rgba(255, 159, 64, 0.8)',   // Orange
    'rgba(46, 204, 113, 0.8)',   // Green
    'rgba(236, 112, 99, 0.8)'    // Red
];

// Define corresponding border colors (slightly darker)
const borderColors = [
    'rgb(255, 99, 132)',
    'rgb(54, 162, 235)',
    'rgb(255, 206, 86)',
    'rgb(75, 192, 192)',
    'rgb(153, 102, 255)',
    'rgb(255, 159, 64)',
    'rgb(46, 204, 113)',
    'rgb(236, 112, 99)'
];

const chart = new Chart(ctx, {
    type: 'bar',
    data: {
        labels: departments,
        datasets: [{
            label: 'Employees by Department (Last Year)',
            data: counts,
            backgroundColor: departments.map((_, index) => barColors[index % barColors.length]),
            borderColor: departments.map((_, index) => borderColors[index % borderColors.length]),
            borderWidth: 1,
            borderRadius: 5,
            hoverBackgroundColor: departments.map((_, index) => barColors[index % barColors.length].replace('0.8', '0.9'))
        }]
    },
    options: {
        responsive: true,
        maintainAspectRatio: false,
        plugins: {
            legend: {
                position: 'top',
                labels: {
                    color: '#e6e6e6',
                    font: {
                        family: 'Inter',
                        size: 12
                    }
                }
            }
        },
        scales: {
            x: {
                grid: {
                    color: 'rgba(0, 240, 255, 0.1)',
                    borderColor: 'rgba(0, 240, 255, 0.2)'
                },
                ticks: {
                    color: '#e6e6e6'
                }
            },
            y: {
                grid: {
                    color: 'rgba(0, 240, 255, 0.1)',
                    borderColor: 'rgba(0, 240, 255, 0.2)'
                },
                ticks: {
                    color: '#e6e6e6',
                    beginAtZero: true,
                    stepSize: 1
                }
            }
        },
        interaction: {
            intersect: false,
            mode: 'index'
        }
    }
});