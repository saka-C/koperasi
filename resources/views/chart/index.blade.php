@extends('layout.main')

@section('main-content')
    <h3>Statistik Transaksi</h3>

    <canvas id="myChart" style="width:100%;"></canvas>
@endsection

@section('right-content')
    <div class="form-container">
        <h3>Statistik Transaksi</h3>
        <form id="chartForm">
            <div class="form-group">
                <select name="type" id="type">
                    <option value="Pemasukan">Pemasukan</option>
                    <option value="Pengeluaran">Pengeluaran</option>
                </select>
            </div>
            <div class="form-group">
                <button type="button" onclick="getData()">Tampilkan Dichart</button>
            </div>
        </form>
    </div>
@endsection


{{-- <script src="{{ asset('js/chart.js') }}"></script> --}}
<script>
    // Function to fetch data and render chart
    function getData(type) {
        fetch('/chart/getByType?type=' + type)
            .then(response => response.json())
            .then(data => {
                var labels = [];
                var amounts = [];
                if (data.length === 0) {
                    renderNoDataMessage("Belum ada transaksi dengan tipe ini");
                } else {
                    data.forEach(transaction => {
                        labels.push(transaction.category.category);
                        amounts.push(transaction.amount);
                    });
                    renderChart(labels, amounts);
                }
            })
            .catch(error => {
                renderNoDataMessage('Error: ' + error.message);
            });
    }

    // Function to render chart
    function renderChart(labels, amounts) {
        var colors = [];
        for (var i = 0; i < labels.length; i++) {
            colors.push(getRandomColor());
        }

        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'pie',
            data: {
                labels: labels,
                datasets: [{
                    data: amounts,
                    backgroundColor: colors,
                }]
            },
            options: {
                title: {
                    display: true,
                    text: 'Statistik Transaksi'
                }
            }
        });
    }

    // Function to render no data message
    function renderNoDataMessage(message) {
        var ctx = document.getElementById('myChart').getContext('2d');
        ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
        ctx.font = '20px Arial';
        ctx.fillText(message, 10, 50);
    }

    // Function to generate random color
    function getRandomColor() {
        var letters = '0123456789ABCDEF';
        var color = '#';
        for (var i = 0; i < 6; i++) {
            color += letters[Math.floor(Math.random() * 16)];
        }
        return color;
    }

    // Automatically load pie chart with 'Pemasukan' data when page is loaded
    document.addEventListener('DOMContentLoaded', function() {
        getData('Pemasukan');
    });
</script>
