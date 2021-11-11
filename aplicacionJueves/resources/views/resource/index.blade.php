

<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <link href="{{ url('assets/css/index.blade.css') }}" rel="stylesheet">
    <title>Jumbotron example · Bootstrap v5.1</title>
  </head>
  <body>
    <main>
      
        <header>
        Characters
    </header>
    <p>Here you will be able to see your custom characters:</p>
    <table>
        <tr>
            <td>id</td><td>name</td><td>age</td><td>class</td><td>hp</td><td>atk</td><td>def</td><td>mp</td><td>stm</td><td>edit</td><td>show</td><td>delete</td>
        </tr>
        @foreach ($resources as $resource)
        <tr>
            <td>{{$resource['id']}}</td>
            <td>{{$resource['name']}}</td>
            <td>{{$resource['age']}}</td>
            <td>{{$resource['class']}}</td>
            <td>{{$resource['hp']}}</td>
            <td>{{$resource['atk']}}</td>
            <td>{{$resource['def']}}</td>
            <td>{{$resource['mp']}}</td>
            <td>{{$resource['stm']}}</td>
            <td><a class="buttonA" href ="{{ url('resource/' . $resource['id'] . '/edit') }}">edit</a></td>
            <td><a class="buttonA" href="{{ url('resource/' . $resource['id']) }}">show</a> </td>
            <td> 
                <form class="deleteForm" action="{{ url('resource/' . $resource['id']) }}" method="post">
                    @method('delete')
                    @csrf
                    <input type="submit" value="delete 1"/> 
                </form>
            </td>
        </tr>
        @endforeach
    </table>
    <div class="aContainer"><a class="createCh" href="{{ url('resource/create') }}">Create New Characters</a><div><br>
       <div class="aContainer"><a class="createCh" href="{{ url('/') }}">Return Characters</a><div>
  </body>
</html>