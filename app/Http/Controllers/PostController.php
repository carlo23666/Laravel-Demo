<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Validator;

use App\Http\Requests;
use App\Http\Controllers\Controller; // Para poder hacer uso de otros controladores
use App\Post; // Solo con esto ya podemos hacer uso de la clase Post sin declararlo

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all(); // Accede al modelo y ejecuta el metodo All [Model]
        return $posts->toJson();
    }
    /**
     * @var InjectionController // Declaramos la variable 
     */
    protected $injectionController;

    //Si quisieramos aplicar un middleware a todo el controlador
    public function __construct(InjectionController $injectionController) { // Hacemos inyeccion de dependencias
        $this->middleware('auth', [
            'only' => 'store' // para solo aplicarlo a un metodo
        ]);
        $this->injectionController = $injectionController;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('dashboard.blog.create');
    }

    public function vista() {
        $posts = Post::all();
        return view('blog.index', compact('posts')); // return view()->with(['post'=posts])
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) // Mediante validator (use validator) podremos validad la request
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required|unique:posts|max:255',
            'body' => 'required',
        ]);

        if($validator->fails()) {
            return redirect('post/create')
            ->withErrors($validator)
            ->withInput($request);
        }

        // Store

        $post = Post::create($request->except('csrf'));
        return redirect(url('/vista'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        return view('blog.singlepost', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Post::destroy($id);
        return 1;
    }
}
