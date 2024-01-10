<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\Comic;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreComicRequest;
use App\Http\Requests\UpdateComicRequest;

class ComicController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     *
     */
    public function index(Request $request): View
    {
        if(!empty($request->query('search'))){
            $search = $request->query('search');
            $comics = Comic::where('type', $search)->get();
        }else {
            $comics = Comic::all();
        }
        return view('comics.index', compact('comics'));
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     */
    public function create()
    {
        return view('comics.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     *
     */
    public function store(StoreComicRequest $request)
    {
        $formData = $this->validation($request->all());
        $formData = $request->validated();
        $newComic = Comic::create($formData);
        // $newComic = new Comic();
        // $newComic->title = $formData['title'];
        // $newComic->description = $formData['description'];
        // $newComic->price = $formData['price'];
        // $newComic->series = 'a piacere';
        // $newComic->sale_date = '2020-01-01';
        // $newComic->type = $formData['type'];
        // $newComic->save();
        return to_route('comics.show', $newComic->id);
    }

    /**
     * Display the specified resource.
     *
     *
     */
    public function show(Comic $comic)
    {
        return view('comics.show', compact('comic'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     *
     */
    public function edit(Comic $comic)
    {
        return view('comics.edit', compact('comic'));
    }

    /**
     * Update the specified resource in storage.
     *
     *
     */
    public function update(UpdateComicRequest $request, Comic $comic)
    {
        $formData = $this->validation($request->all());
        $formData = $request->validated();
        $comic->fill($formData);
        $comic->update();
        return to_route('comics.show', $comic->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     *
     */
    public function destroy(Comic $comic)
    {
        $comic->delete();
        return to_route('comics.index')->with('deleted', 'Hai eliminato ' . $comic->title);
    }

    private function validation($data){
        $validation = Validator::Make($data, [
            'title'=>'required|min:5|max:255|unique:comics',
            'description'=>'required|max:1000',
            'price'=>'required|numeric',
            'series'=>'required|max:50',
            'sale_date'=>'required|date_format:Y-m-d',
            'type'=>'required|max:50',
        ],
        [
            'title.unique' => 'Il titolo deve essere univoco',
            'title.min' => 'Il titolo deve avere almeno :min caratteri',
            'title.max' => 'Il titolo deve avere massimo :max caratteri',
            'title.required' => 'Il titolo è obbligatorio',
            'description.required' => 'La descrizione è obbligatoria',
            'description.max' => 'La descrizione deve avere massimo :max caratteri',
            'price.required' => 'Il prezzo è obbligatorio',
            'price.numeric' => 'Il prezzo deve essere un numero',
            'series.required' => 'La serie è obbligatoria',
            'series.max' => 'La serie deve avere massimo :max caratteri',
            'sale_date.required' => 'La data di vendita è obbligatoria',
            'type.max' => 'Il tipo deve avere massimo :max caratteri',
            'type.required' => 'Il tipo è obbligatorio',
            'sale_date.date_format' => 'Data non valida',

        ])->validate();
        return $validation;
    }
}
