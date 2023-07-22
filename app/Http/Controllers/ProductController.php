<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Repositories\ProductRepository;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse as RedirectResponseAlias;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    /**
     * @var ProductRepository
     */
    public ProductRepository $repository;

    /**
     * Construct Function
     */
    public function __construct()
    {
        $this->repository = new ProductRepository();
    }

    /**
     * @return View
     */
    public function index(): View
    {
        $products = Product::all();
        return view('products/index', compact('products'));
    }

    /**
     * @return View
     */
    public function create(): View
    {
        return view('products/form');
    }

    /**
     * @param Request $request
     * @return RedirectResponseAlias
     */
    public function store(Request $request): RedirectResponseAlias
    {
        $data = $this->repository->sanitizeDataValues($request->all());
        DB::beginTransaction();
        try {
            Product::create($data);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Desculpe, não foi possível salvar os dados.');
        }

        return redirect()->route("products.index")->with('success', 'Cadastro feito com sucesso!');
    }

    /**
     * @param string $id
     * @return View
     */
    public function show(string $id): View
    {
        $item = Product::findOrFail($id);

        return view(".products.form",[
            "item" => $item
        ]);
    }

    /**
     * @param Request $request
     * @param string $id
     * @return RedirectResponseAlias
     */
    public function update(Request $request, string $id): RedirectResponseAlias
    {
        $data = $this->repository->sanitizeDataValues($request->all());
        DB::beginTransaction();
        try {
            $item = Product::findOrFail($id);
            $item->fill($data);
            $item->save();
            DB::commit();
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Desculpe, não foi possível atualizar os dados.');
        }

        return redirect()->route("products.index")->with('success', 'Produto atualizado com sucesso!');
    }

    /**
     * @param string $id
     * @return RedirectResponseAlias
     */
    public function destroy(string $id): RedirectResponseAlias
    {
        DB::beginTransaction();

        try {
            $item = Product::findOrFail($id);
            $item->delete();
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->withInput()->with('error', 'Desculpe, não foi possível excluir o Produto.');
        }

        return redirect()->route("products.index")->with('success', 'Produto excluido com sucesso!');
    }

}
