

<div class="form-group">
    Nome: <input type="text" id="name" name="name" class="form-control" placeholder="Nome" value="{{ old('name', @$client->name) }}">
    E-mail: <input type="text" id="name" name="email" class="form-control" placeholder="E-mail" value="{{ old('email'. @$client->email) }}">
    Idade: <input type="number" id="age" name="age" class="form-control" placeholder="Idade" value="{{ old('age', @$client->age) }}">
    Foto: <input type="file" id="photo" name="photo" value="{{ old('photo', @$client->photo) }}">
</div>
<div class="form-group">
    <input class="btn btn-success" type="submit" value="SALVAR">
    <a class="btn btn-default" href="{{ route('clients.index') }}">Listar Clientes</a>
</div>