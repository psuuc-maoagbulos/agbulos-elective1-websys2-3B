<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Weather for Multiple Cities</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Weather Update</h1>
        <div class="row">
            @foreach ($weatherData as $data)
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">City: {{ $data['city'] }}</h5>
                            @if (isset($data['error']))
                                <p class="card-text text-danger">{{ $data['error'] }}</p>
                            @else
                                <p class="card-text">Temperature: {{ $data['temperature'] }}°C</p>
                                <p class="card-text">Description: {{ $data['description'] }}</p>
                                <p class="card-text">Humidity: {{ $data['humidity'] }}%</p>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>