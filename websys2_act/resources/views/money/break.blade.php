<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
</div>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .blue{ color: blue;}
        .green{ color: green}
    </style>
</head>
<body>
    <h1>Money:</h1>
    <h2>Amount: <span class="{{ $color }}">{{$i}}</span></h2>
    <ul>
        @foreach ($break as $denom => $count)
        <li>{{$denom}} : {{$count}}</li>
        @endforeach
    </ul>
</body>
</html>