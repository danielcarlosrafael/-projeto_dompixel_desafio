@extends('layout')

@section('content')
    <div class="container mt-4">
        <h2 class="d-flex justify-content-between">
            Catálogo de Produtos
            <a title="Novo" class="btn btn-success ml-auto" href="{{ route('products.create') }}">Novo</a>
        </h2>

        <div class="table-responsive">
            <table id="productsTable" class="table table-bordered">
                <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Preço</th>
                    <th>Quantidade em Estoque</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr>
                        <td>{{ $product->name }}</td>
                        <td>R$ {{ number_format($product->price, 2) }}</td>
                        <td>{{ $product->quantity }}</td>
                        <td class="text-end">
                            <div class="justify-content-end">
                                <a title="Editar" href="{{ route('products.show', $product->id) }}" class="btn btn-sm btn-primary">
                                    <i class="fa fa-edit"></i>
                                </a>
                                <a title="Remover" class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $product->id }}">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </div>
                        </td>
                        <div class="modal fade" id="deleteModal{{ $product->id }}" tabindex="-1" aria-labelledby="deleteModal{{ $product->id }}Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel">Confirmar exclusão</h5>
                                        <button title="Fechar" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Você tem certeza que deseja excluir este produto?</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button title="Canceçar" type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <!-- Botão para executar a exclusão após a confirmação -->
                                        <a title="Excluir" class="btn btn-danger" onclick="event.preventDefault(); document.getElementById('delete-form-{{ $product->id }}').submit();">
                                            Excluir
                                        </a>
                                        <!-- Formulário para executar a exclusão -->
                                        <form id="delete-form-{{ $product->id }}" action="{{ route('products.destroy', $product->id) }}" method="POST" style="display: none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#productsTable').DataTable({
                language: {
                    "sEmptyTable": "Nenhum registro encontrado",
                    "sInfo": "Mostrando _START_ até _END_ de _TOTAL_ registros",
                    "sInfoEmpty": "Mostrando 0 até 0 de 0 registros",
                    "sInfoFiltered": "(Filtrados de _MAX_ registros)",
                    "sInfoPostFix": "",
                    "sInfoThousands": ".",
                    "sLengthMenu": "_MENU_ resultados por página",
                    "sLoadingRecords": "Carregando...",
                    "sProcessing": "Processando...",
                    "sZeroRecords": "Nenhum registro encontrado",
                    "sSearch": "Pesquisar",
                    "oPaginate": {
                        "sNext": "Próximo",
                        "sPrevious": "Anterior",
                        "sFirst": "Primeiro",
                        "sLast": "Último"
                    },
                    "oAria": {
                        "sSortAscending": ": Ordenar colunas de forma ascendente",
                        "sSortDescending": ": Ordenar colunas de forma descendente"
                    },
                    "select": {
                        "rows": {
                            "_": "Selecionado %d linhas",
                            "0": "Nenhuma linha selecionada",
                            "1": "Selecionado 1 linha"
                        }
                    }
                }
            });
        });
    </script>
@endsection
