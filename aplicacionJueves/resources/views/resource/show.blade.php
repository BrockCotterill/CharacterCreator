<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="{{ url('assets/css/show.blade.css') }}">
    <script>
    var img = [
        
        ];
    </script>
</head>
<body>
    <div class="container">
        <div>
            <p><b>Name:</b> {{$resource['name']}}</p><br>
            <p><b>Age:</b> {{$resource['age']}}</p><br>
            <p><b>Class:</b> {{$resource['class']}}</p><br>
        </div><br>
        
        <div id="character" class="character">
        </div>
        <div class="adtributes">
            <div><b>Hp:</b> {{$resource['hp']}}</div>
            <div><b>Atk:</b> {{$resource['atk']}}</div>
            <div><b>Def:</b> {{$resource['def']}}</div>
            <div><b>Mp:</b>{{$resource['mp']}} </div>
            <div><b>Stm:</b> {{$resource['stm']}}</div>
        </div>
        
    </div><div class="aContainer"><a class="returnCh" href="{{ url('resource') }}">Return to Character Page</a><div>
    <script src="{{ url('assets/js/character.blade.js') }}"></script>
    @yield('js')
</body>
</html>