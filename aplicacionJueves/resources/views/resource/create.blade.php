<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.88.1">
    <title>Jumbotron example · Bootstrap v5.1</title>
   <link href="{{ url('assets/css/create.blade.css') }}" rel="stylesheet">
  </head>
  <body>
    <main>
        <header>
            Create your character
        </header>
      <form action="{{ url('resource') }}" method="post">
    @csrf
    <input value="{{ old('name') }}" type="text" name="name" placeholder="Name of character" min-length="5" max-length="30" required />
    <input value="{{ old('age') }}" type="number" name="age" placeholder="age" min-length="1" step="1" required />
    <input value="{{ old('class') }}" type="text" name="class" placeholder="Class Name" min-length="1" max-length="30" required />
    <p>Atributes:</p>
    <input value="{{ old('hp') }}" type="number" name="hp"  placeholder="hp"min-length="1" step="1" required />
    <input value="{{ old('atk') }}" type="number" name="atk"placeholder="atk"  min-length="1" step="1" required />
    <input value="{{ old('def') }}" type="number" name="def" placeholder="def" min-length="1" step="1" required />
    <input value="{{ old('mp') }}" type="number" name="mp" placeholder="mp" min-length="1" step="1" required />
    <input value="{{ old('stm') }}" type="number" name="stm" placeholder="stm" min-length="1" step="1" required />
    <input type="submit" value="Create"/>
</form>
  </body>
</html>