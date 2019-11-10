<div class="form-group">
    <label for="name" class="col-sm-2 control-label">Nome</label>
    <div class="col-sm-10">
        <input type="text" class="form-control" id="name" name="name" placeholder="Nome" value="{{ @$project->name }}">
    </div>
</div>
<div class="form-group">
    <label for="cost" class="col-sm-2 control-label">Custo</label>
    <div class="col-sm-10">
    <input type="text" class="form-control" id="cost" name="cost" placeholder="Custo" value="{{ @$project->cost }}">
    </div>
</div>
<div class="form-group">
    <label for="client_id" class="col-sm-2 control-label">Cliente</label>
    <div class="col-sm-10">
        <select type="text" class="form-control" id="client_id" name="client_id">
            <option>Selecione o cliente</option>
            @foreach($clients as $client)
                <option value="{{$client->id}}" {{@$project->client_id == $client->id ? 'selected' : ''}} >{{$client->name}}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="form-group">
    <label for="description" class="col-sm-2 control-label">Descrição</label>
    <div class="col-sm-10">
        <textarea class="form-control" id="description" name="description" placeholder="Descrição">{{ @$project->description }}</textarea>
    </div>
</div>

<div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
    <button type="submit" class="btn btn-default">Salvar</button>
    </div>
</div>
