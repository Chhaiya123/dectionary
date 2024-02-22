<?php

namespace App\Http\Controllers\Word;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Word;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Validation\Rules\Unique;
use PhpOption\None;
// use Illuminate\Validation\Rule;

class WordController extends Controller
{
    public function words(){
        try {
            $user_id = Auth::user()->id;
            $data = Word::join('users', 'words.user_id', '=', 'users.id')
            ->where('users.id', $user_id)
            ->select('words.*')
            ->paginate(10);
            return view('page.PageWords', compact('data'));


        } catch (\Exception $e) {
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
                ])->onlyInput('email');
        }
        
    }
    public function create(){
            return view('page.CreateWord');
    }
    public function store(Request $request){ 
        
        $user_id = Auth::user()->id;

        $rules = [
            'word' => ['required','string','max:255',
                Rule::unique('words')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'word_km' => ['required','string','max:255',
                Rule::unique('words')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'word_en' => ['required','string','max:255',
                Rule::unique('words')->where(function ($query) use ($user_id) {
                    return $query->where('user_id', $user_id);
                }),
            ],
            'description' => 'required|max:255',
            'description_km' => 'required|max:255',
            'description_en' => 'required|max:255',
            // other validation rules...
        ];
        $customMessages = [
            'word.required' => 'The word field is required.',
            'word.unique' => 'The word has already been taken.',
            'description.required' => 'The description field is required.',
            // custom messages km
            'word_km.required' => 'The word field is required.',
            'word_km.unique' => 'The word has already been taken.',
            'description_km.required' => 'The description field is required.',
            // custom messages en
            'word_en.required' => 'The word field is required.',
            'word_en.unique' => 'The word has already been taken.',
            'description_en.required' => 'The description field is required.',
            
        ];
        $request->validate($rules, $customMessages);
           
        $data = new Word();
        $data->word= $request->word;
        $data->word_km= $request->word_km;
        $data->word_en= $request->word_en;
        $data->user_id= $user_id;
        $data->description= $request->description;
        $data->description_km= $request->description_km;
        $data->description_en= $request->description_en;
        $data->save();
        return redirect()->route('words');        
    }
    public function edit($id){
        $data_up = Word::find($id);
        return view('page.UpdateWord',compact('data_up'));
    }
    public function update(Request $request,$id){
        $rules = [
            'word' => 'required|string|max:255',
            'description' => 'required|max:255',
            // other validation rules
            'word_km' => 'required|string|max:255',
            'description_km' => 'required|max:255',
            // other validation rules
            'word_en' => 'required|string|max:255',
            'description_en' => 'required|max:255',
            // other validation rules
        ];
        $customMessages = [
            'word.required' => 'The word field is required.',
            'word.unique' => 'The word has already been taken.',
            'description.required' => 'The description field is required.',
            // other custom messages
            'word_km.required' => 'The word field is required.',
            'word_km.unique' => 'The word has already been taken.',
            'description_km.required' => 'The description field is required.',
            // other custom messages
            'word_en.required' => 'The word field is required.',
            'word_en.unique' => 'The word has already been taken.',
            'description_en.required' => 'The description field is required.',
            // other custom messages
        ];
       
        $data_update = Word::find($id); 
        // dd($data_update);
        if($request->description != $data_update->description || $request->description_km != $data_update->description_km || $request->description_en != $data_update->description_en && $rules){  
            $data_update->description = $request->description;
            $data_update->description_km = $request->description_km;
            $data_update->description_en = $request->description_en;
            $data_update->update();
        }
        
        $request->validate($rules, $customMessages);
        
        $data_update->word = $request->word;
        $data_update->description = $request->description;
        $data_update->word_km = $request->word_km;
        $data_update->description_km = $request->description_km;
        $data_update->word_en = $request->word_en;
        $data_update->description_en = $request->description_en;
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
        if(!Auth::user()){
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
                ])->onlyInput('email');

        }else{
            $query = trim($request->input('query'));
            $results = Word::where('word', 'LIKE', '%' . $query . '%')
            ->orwhere('word_km', 'LIKE', '%' . $query . '%')
            ->orwhere('word_en', 'LIKE', '%' . $query . '%')
            ->get();    
            $counts = Word::count();    
            // return response()->json($results);
            if($query != null){
                return view('page.search', compact('results','query','counts'));
            }
            return redirect()->route('words');
        }
        
    }
}
