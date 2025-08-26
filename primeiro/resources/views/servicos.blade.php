@extends('layouts.layout-main')

@section('conteudo')
<div>
    <h2>Serviços</h2>
    <div>
        <form action="{{ route('inserir') }}" method="POST" autocomplete="off" enctype="multipart/form-data">
            @csrf

            <div>
                <label for="foto">Foto</label><br>
                <input type="file" name="foto" id="foto">
            </div>

            <div>
                <label for="nome">Nome</label><br>
                <input type="text" name="nome" id="nome" placeholder="Nome*" required>
            </div>
            
            <div>
                <label for="clube">Clube</label><br>
                <input type="text" name="clube" id="clube" placeholder="Clube*" required>
            </div>
            <div>
                <label for="nacionalidade">nacionalidade</label><br>
                <input type="text" name="nacionalidade" id="nacionalidade" placeholder="Nacionalidade">
            </div>
            <div>
                <label for="sobre">Sobre</label><br>
                <input type="text" name="sobre" id="sobre" placeholder="Sobre"> 
            </div>
            <div>
                <label for="titulos">Nª Titulos</label> <br>
                <input type="number" name="titulos" id="titulos" placeholder="total de titulos"> 
            </div>
            <button type="submit">Cadastrar</button>
        </form>
    </div>
</div>
@endsection