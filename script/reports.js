// Sidebar Toggle
const sidebarToggle = document.getElementById("toggle-btn");
const sidebar = document.querySelector(".sidebar");

sidebarToggle.addEventListener("click", () => {
  sidebar.classList.toggle("collapsed");
});

// Department Chart
const departmentCtx = document
  .getElementById("departmentChart")
  .getContext("2d");

// Create gradient for pie chart
const pieColors = departmentData.map((_, index) => {
  const hue = ((index * 360) / departmentData.length + 180) % 360;
  return `hsla(${hue}, 100%, 50%, 0.6)`;
});

new Chart(departmentCtx, {
  type: "pie",
  data: {
    labels: departmentData.map((d) => d.department),
    datasets: [
      {
        label: "Employees per Department",
        data: departmentData.map((d) => d.employee_count),
        backgroundColor: pieColors,
        borderColor: "rgba(0, 240, 255, 0.2)",
        borderWidth: 1,
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        position: "bottom",
        labels: {
          color: "#e6e6e6",
          font: {
            family: "Inter",
          },
          padding: 20,
        },
      },
    },
    layout: {
      padding: {
        top: 20,
      },
    },
  },
});

// Salary by Role Chart
const roleCtx = document.getElementById("salaryByRoleChart").getContext("2d");

// Define colors for the bars
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

// Define border colors
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

new Chart(roleCtx, {
  type: "bar",
  data: {
    labels: roleData.map((r) => r.role),
    datasets: [
      {
        label: "Average Salary by Role",
        data: roleData.map((r) => r.avg_salary),
        backgroundColor: roleData.map((_, index) => barColors[index % barColors.length]),
        borderColor: roleData.map((_, index) => borderColors[index % borderColors.length]),
        borderWidth: 1,
        borderRadius: 5,
        hoverBackgroundColor: roleData.map((_, index) => barColors[index % barColors.length].replace('0.8', '0.9'))
      },
    ],
  },
  options: {
    responsive: true,
    maintainAspectRatio: false,
    plugins: {
      legend: {
        labels: {
          color: "#e6e6e6",
          font: {
            family: "Inter",
          },
          padding: 20,
        },
      },
    },
    scales: {
      y: {
        beginAtZero: true,
        grid: {
          color: "rgba(0, 240, 255, 0.1)",
          borderColor: "rgba(0, 240, 255, 0.2)",
        },
        ticks: {
          color: "#e6e6e6",
          callback: function (value) {
            return "₹" + value.toLocaleString();
          },
        },
      },
      x: {
        grid: {
          color: "rgba(0, 240, 255, 0.1)",
          borderColor: "rgba(0, 240, 255, 0.2)",
        },
        ticks: {
          color: "#e6e6e6",
        },
      },
    },
    layout: {
      padding: {
        top: 20,
      },
    },
  },
});