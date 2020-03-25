<?php 

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Produto;
use App\Http\Requests\ProdutoRequest;
use Request;

class ProdutoController extends Controller {

    public function __construct()
    {
        $this->middleware('auth', ['only' => ['adiciona', 'remove']]);
    }

    public function lista ()
    {
        //$produtos = DB::select('select * from produtos');
        /*  
        $data = ['produtos' => $produtos];
        return view('listagem', $data);
        */
        /*
        $data = [];
        $data['produtos'] = $produtos;
        return view('listagem', $data);
        */
        //return view('listagem', ['produtos' => $produtos]);
        //return view('listagem')->with('produtos', $produtos);
        /*
        if (view()->exists('listagem')) {
        
        }
        */
        // view()->file('/caminho/da/view');
        $produtos = Produto::all();
        return view('produto.listagem')->withProdutos($produtos);
    }

    public function mostra($id)
    {
        //$id = Request::input('id', '0');
        //$id = Request::route('id');
        //$reposta = DB::select("select * from produtos where id = $id");
        $produto = Produto::find($id);
        if (empty($produto)) :
            return "Este produto não existe.";
        endif;
        return view('produto.detalhes')->withProduto($produto);
    }

    public function novo()
    {
        return view('produto.formulario');
    }

    public function adiciona(ProdutoRequest $produtoRequest)
    {
        //Produto::create(Request::all());
        /*
        $params = Request::all();
        $produto = new Produto($params);
        $produto->save();
        /*
        $nome = Request::input('nome');
        $descricao = Request::input('descricao');
        $valor = Request::input('valor');
        $valor = str_replace(',', '.', $valor);
        $quantidade = Request::input('quantidade');
        DB::insert('insert into produtos (nome, descricao, valor, quantidade) values (?, ?, ?, ?)', array($nome, $descricao, $valor, $quantidade));
        */
        Produto::create($produtoRequest->all());
        return redirect()->action('ProdutoController@lista')->withInput(Request::only('nome'));
    }

    public function listaJson()
    {
        $produtos = Produto::all();
        return $produtos; 
    }

    public function remove($id)
    {
        Produto::destroy($id);
        return redirect()->action('ProdutoController@lista');
    }
}