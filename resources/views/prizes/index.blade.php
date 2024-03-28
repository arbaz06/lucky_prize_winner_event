@extends('default')

@section('content')


    @include('prob-notice')


    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="d-flex justify-content-end mb-3">
                    <a href="{{ route('prizes.create') }}" class="btn btn-info">Create</a>
                </div>
                <h1>Prizes</h1>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Title</th>
                            <th>Probability</th>
                            <th>Awarded</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($prizes as $prize)
                            <tr>
                                <td>{{ $prize->id }}</td>
                                <td>{{ $prize->title }}</td>
                                <td>{{ $prize->probability }}</td>
                                <td>0</td>
                                <td>
    <div class="d-flex gap-2">
        <a href="{{ route('prizes.edit', ['id' => $prize->id]) }}" class="btn btn-primary">Edit</a>
        <form method="POST" action="{{ route('prizes.destroy', ['id' => $prize->id]) }}">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger">Delete</button>
        </form>
    </div>
</td>

                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        <hr>
        <div class="row">
    <div class="col-md-6 offset-md-3">
        <div class="card">
            <div class="card-header">
                <h3>Simulate</h3>
            </div>
            <div class="card-body">
                <form method="POST" action="{{ route('simulate') }}">
                    @csrf
                    <div class="form-group">
                        <label for="number_of_prizes">Number of Prizes</label>
                        <input type="number" name="number_of_prizes" value="10" class="form-control">
                    </div>
                    <button type="submit" class="btn btn-primary">Simulate</button>
                </form>
            </div>

            <br>

            <div class="card-body">
                <form method="POST" action="{{ route('reset') }}">
                    @csrf
                    <button type="submit" class="btn btn-primary">Reset</button>
                </form>
            </div>

        </div>
    </div>
</div>




<div class="container mb-4">
    <div class="row">
        <div class="col-md-6">
            <h2>Probability Settings</h2>
            <canvas id="probabilityChart" width="400" height="400"></canvas>
        </div>
        <div class="col-md-6">
            <h2>Actual Rewards</h2>
            <canvas id="awardedChart" width="400" height="400"></canvas>
        </div>
    </div>
</div>



@stop


@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels@2"></script>

    <script>
    // Probability Settings Chart
    var probabilityChartCtx = document.getElementById('probabilityChart').getContext('2d');
    var probabilityChartData = {
        labels: ['Label 1', 'Label 2', 'Label 3'], // Example labels
        datasets: [{
            label: 'Probability',
            data: [10, 20, 30], // Example data
            backgroundColor: 'rgba(255, 99, 132, 0.2)', // Example background color
            borderColor: 'rgba(255, 99, 132, 1)', // Example border color
            borderWidth: 1
        }]
    };
    var probabilityChartOptions = {
        // Provide your chart options here
    };
    new Chart(probabilityChartCtx, {
        type: 'bar',
        data: probabilityChartData,
        options: probabilityChartOptions
    });

    // Actual Rewards Chart
    var awardedChartCtx = document.getElementById('awardedChart').getContext('2d');
    var awardedChartData = {
        labels: ['Label 1', 'Label 2', 'Label 3'], // Example labels
        datasets: [{
            label: 'Rewards',
            data: [50, 60, 70], // Example data
            fill: false,
            borderColor: 'rgb(75, 192, 192)',
            tension: 0.1
        }]
    };
    var awardedChartOptions = {
        // Provide your chart options here
    };
    new Chart(awardedChartCtx, {
        type: 'line',
        data: awardedChartData,
        options: awardedChartOptions
    });
</script>

@endpush
