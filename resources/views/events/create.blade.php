@extends('layouts.main')
@section('title','Criar Evento')
@section('content')
<div id="event-create-container" class="container p-5 my-5 border">
     <h1>Crie seu evento</h1> 
     <form action="/events" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="image">Imagem do evento:</label>
            <input type="file" id="image" name="image" class="form-control-file">
        </div>
        <div class="form-group">
            <label for="title">Evento:</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Nome do evento">
        </div>
        <div class="form-group">
            <label for="date">Data do evento:</label>
            <input type="date" class="form-control" id="date" name="date" placeholder="Nome do evento">
        </div>
        <div class="form-group">
            <label for="title">Cidade:</label>
            <input type="text" class="form-control" id="city" name="city" placeholder="Cidade do evento">
        </div>
        <div class="form-group">
            <label for="title">Publico/Privado:</label>
            <select name="private" id="private" class="form-control">
                <option value="0">Publico</option>
                <option value="1">Privado</option>
            </select>
        </div>
        <div class="form-group">
            <label for="title">Descrição:</label>
           <textarea name="description" id="description"class="form-control" placeholder="descrição do evento"></textarea>
        </div>
        <input type="submit" class=" btn-input " value="Criar Evento">
     </form>
</div>
 @endsection