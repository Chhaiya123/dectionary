<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Word;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use PhpOption\None;
// use Illuminate\Validation\Rule;

class WordController extends Controller
{
    public function words(){
        $data = Word::paginate(10);
        return view('page.PageWords', compact('data'));
    }
    public function create(){
            return view('page.CreateWord');
    }
    public function store(Request $request){ 
        $rules = [
            'word' => 'required|string|max:255|unique:words,word',
            'description' => 'required|max:255',
            // validation rules
        ];
        $customMessages = [
            'word.required' => 'The word field is required.',
            'word.unique' => 'The word has already been taken.',
            'description.required' => 'The description field is required.',
            // custom messages
        ];
        $request->validate($rules, $customMessages);
        $data = new Word();
        $data->word= $request->word;
        $data->description= $request->description;
        $data->save();
        return redirect()->route('words');
    }
    public function edit($id){
        $data_up = Word::find($id);
        return view('page.UpdateWord',compact('data_up'));
    }
    public function update(Request $request,$id){
        $rules = [
            'word' => 'required|string|max:255|unique:words,word',
            'description' => 'required|max:255',
            // other validation rules
        ];
        $customMessages = [
            'word.required' => 'The word field is required.',
            'word.unique' => 'The word has already been taken.',
            'description.required' => 'The description field is required.',
            // other custom messages
        ];
       
        $data_update = Word::find($id); 
        // dd($data_update);
        if($request->description != $data_update->description && $rules){  
            $data_update->description = $request->description;
            $data_update->update();
        }
        
        $request->validate($rules, $customMessages);
        
        $data_update->word = $request->word;
        $data_update->description = $request->description;
        $data_update->update();
        // }else if($request->description == $data_update->description || $request->word != $data_update->word){
            
        //     $data_update = Word::find($id);
        //     $data_update->word = $request->word;
        //     $data_update->description = $request->description;
        //     $data_update->update();
        // }
        // else{
       
        // }
        return redirect()->back();
       
    }
    public function remove($id){
        $data = Word::find($id);
        $data->delete();
        return redirect()->route('words');
    }
    public function search(Request $request)
    {
        $query = trim($request->input('query'));
        $results = Word::where('word', 'LIKE', '%' . $query . '%')->get();    
        // return response()->json($results);
        if($query != null){
            return view('page.search', compact('results','query'));
        }
        return redirect()->route('words');
    }
}
