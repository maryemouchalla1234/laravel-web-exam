<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Offre;
use DataTables;

class offreController extends Controller
{
    public function index(){
        $offres = Offre::inRandomOrder()->take(4)->get();
        return view('offres.index')->with('offres', $offres);
    }              

    public function show($id)
    {
        $offres = Offre::where('id', $id)->firstOrFail();

        return view('offres.show')->with('offre', $offres);
    }
    
    public function store(Request $request)
    {
        $offres  = Offre::create($request->input());
        return response()->json($offres );
    }
    public function update(Request $request, $offre_id)
    {
        $offres = Offre::find($offre_id);
        $offres->adrese = $request->adrese;
        $offres->prix = $request->prix;
        $offres->capacite = $request->capacite;
        $offres->image = $request->image;
        $offres->save();
        return response()->json($offres);
    }

    public function destroy($offre_id)
    {
        $offres = Product::destroy($offre_id);
        return response()->json($offres);
    }

    public function create(){
        return view('offres.create_offre');
    }
     
        
    
     
     
    public function crud(){
        $offres = Offre::all();
        return view('offres.crudoffre', ['offres' => $offres]);
    }

    
}
