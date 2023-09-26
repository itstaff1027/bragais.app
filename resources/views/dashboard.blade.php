<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 graph_container"> {{-- CONTAINER --}}
                    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                    <div class="daily_container">
                        <div class="online_container">

                            <canvas id="online_chart" class="max-h-50 max-w-full"></canvas>

                            <button>Summary</button>

                            <script>
                                const onlineChart = document.getElementById('online_chart');
  
                                new Chart(onlineChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Online Daily Sales',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>


                        </div>
                        <div class="store_container">
                            <canvas id="store_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const storeChart = document.getElementById('store_chart');
  
                                new Chart(storeChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Store Daily Sales',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="monthly_container">
                        <canvas id="monthly_chart" class="max-h-50 max-w-full"></canvas>
                        <button>Summary</button>
                        <script>
                            const monthlyChart = document.getElementById('monthly_chart');
  
                                new Chart(monthlyChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Montly Sales',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                        </script>
                    </div>
                    <div class="yearly_quarterly_container">
                        <div class="yearly_container">
                            <canvas id="yearly_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const yearlyChart = document.getElementById('yearly_chart');
  
                                new Chart(yearlyChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Yearly Sales',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                        <div class="quarterly_container">
                            <canvas id="quarterly_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const quarterlyChart = document.getElementById('quarterly_chart');
  
                                new Chart(quarterlyChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Quarterly Sales',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="top_agent_container">
                        <canvas id="topAgent_chart" class="max-h-50 max-w-full"></canvas>
                        <button>Summary</button>
                        <script>
                            const topAgentChart = document.getElementById('topAgent_chart');
  
                                new Chart(topAgentChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Top Agent',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                        </script>
                    </div>
                    <div class="per_container">
                        <div class="model_container">
                            <canvas id="model_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const modelChart = document.getElementById('model_chart');
  
                                new Chart(modelChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Per Model',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                        <div class="category_container">
                            <canvas id="category_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const categoryChart = document.getElementById('category_chart');
  
                                new Chart(categoryChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Per Category',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="high_low_sale">
                        <div class="high_container">
                            <canvas id="high_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const highChart = document.getElementById('high_chart');
  
                                new Chart(highChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Highest Sale',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                        <div class="low_container">
                            <canvas id="lowest_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const lowestChart = document.getElementById('lowest_chart');
  
                                new Chart(lowestChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Lowest',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                    </div>
                    <div class="most_used_container">
                        <div class="courier_container">
                            <canvas id="courier_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const courierChart = document.getElementById('courier_chart');
  
                                new Chart(courierChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Most used Courier',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                        <div class="mop_contianer">
                            <canvas id="mop_chart" class="max-h-50 max-w-full"></canvas>
                            <button>Summary</button>
                            <script>
                                const mopChart = document.getElementById('mop_chart');
  
                                new Chart(mopChart, {
                                type: 'bar',
                                data: {
                                    labels: ['Red', 'Blue', 'Yellow', 'Green', 'Purple', 'Orange'],
                                    datasets: [{
                                    label: 'Most used Mode of Payment',
                                    data: [12, 19, 3, 5, 2, 3],
                                    borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                                });
                            </script>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>