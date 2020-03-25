@extends('layout.principal')
@section('conteudo')
    @if (empty($produtos))
        <div>Você não tem produtos cadastrados.</div>
    @else
        <h1>Lista de produtos</h1>
        <table class="table justify-align-center">
            <tr>
                <th scope="col">Nome</th>
                <th scope="col">Valor</th>
                <th scope="col">Descrição</th>
                <th scope="col">Quantidade</th>
                <th scope="col">Detalhes</th>
                <th scope="col">Deletar</th>
            </tr>
            @foreach ($produtos as $produto)
                <tr scope="row" class="{{ $produto->quantidade <= 1 ? 'bg-danger' : '' }}">
                    <td>{{$produto->nome}}</td>
                    <td>{{$produto->valor}}</td>
                    <td>{{$produto->descricao}}</td>
                    <td>{{$produto->quantidade}}</td>
                    <td><a href="/produtos/mostra/{{$produto->id}}"><img src="icons/search.svg" alt="Mostrar detalhes do produto"></a></td>
                    <td><a href="/produtos/remove/{{$produto->id}}"><img src="icons/trash.svg" alt="Deletar produto"></a></td>
                </tr>
            @endforeach
        </table>
    @endif
    @if(old('nome'))
        <div class="alert alert-success">
            <strong>Sucesso!</strong> O produto {{old('nome')}} foi adicionado.
        </div>
    @endif
@stop