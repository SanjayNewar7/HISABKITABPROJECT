document.addEventListener('DOMContentLoaded', () => {
    // Sample data for categories
    const salesData = [
        { category: 'Tea', totalOrders: 120, revenue: 6000 },
        { category: 'Coffee', totalOrders: 80, revenue: 4000 },
        { category: 'Soft Drinks', totalOrders: 150, revenue: 4500 },
        { category: 'Momos', totalOrders: 60, revenue: 3000 },
        { category: 'Sizzler', totalOrders: 30, revenue: 9000 },
        { category: 'Combo', totalOrders: 90, revenue: 4500 },
        { category: 'Cigarettes', totalOrders: 40, revenue: 2000 },
        { category: 'Lassi', totalOrders: 70, revenue: 3500 },
        { category: 'Khaja Set', totalOrders: 50, revenue: 2500 },
        { category: 'Breakfast', totalOrders: 20, revenue: 2000 }
    ];

    // Data for pie chart
    const labels = salesData.map(data => data.category);
    const totalOrders = salesData.map(data => data.totalOrders);
    const revenue = salesData.map(data => data.revenue);
    const backgroundColors = [
        'green', // Tea
        'brown', // Coffee
        'blue', // Soft Drinks
        'orange', // Momos
        'purple', // Sizzler
        'red', // Combo
        'grey', // Cigarettes
        'yellow', // Lassi
        'pink', // Khaja Set
        'lightblue' // Breakfast
    ];

    // Create the pie chart
    const ctx = document.getElementById('salesChart').getContext('2d');
    const salesChart = new Chart(ctx, {
        type: 'pie',
        data: {
            labels: labels,
            datasets: [{
                data: totalOrders,
                backgroundColor: backgroundColors,
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    position: 'top',
                },
                tooltip: {
                    callbacks: {
                        label: function(tooltipItem) {
                            const dataIndex = tooltipItem.dataIndex;
                            const percentage = ((totalOrders[dataIndex] / totalOrders.reduce((a, b) => a + b)) * 100).toFixed(2);
                            return `${tooltipItem.label}: ${percentage}% (${totalOrders[dataIndex]} orders)`;
                        }
                    }
                }
            }
        }
    });

    // Populate the table with sales data
    const salesDataBody = document.getElementById('salesDataBody');
    salesData.forEach(data => {
        const percentage = ((data.totalOrders / totalOrders.reduce((a, b) => a + b)) * 100).toFixed(2);
        const row = `
            <tr>
                <td>${data.category}</td>
                <td>${data.totalOrders}</td>
                <td>${data.revenue}</td>
                <td>${percentage}</td>
            </tr>
        `;
        salesDataBody.innerHTML += row;
    });
});
