<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    public function index(){
        // $query = trim($request->input('query'));
        if(!Auth::user()){
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
        else{
            $data = User::paginate(10);
            return view('page.user.user', compact('data'));
        }
        // try{
            
        // }catch(\Exception $e){
            
        // }
    }
    public function profile_view(){
        try{
            $data = Auth::user();
            if($data->bio != null){
                return view('page.user.profile');
            }
            return view('page.user.profile');

        }catch(\Exception $e){
            return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }
        
    }
    public function upload(Request $request, $id){ 
        $request->validate([
            'image' => 'required|mimes:jpeg,png,jpg,gif|max:3048',
        ]);
        $imageName = Auth::User()->image;
        $data_update = User::find($id);
        $data_update->name = $request->user_name;
        $data_update->bio = $request->bio;
        $data_update->birth = $request->birth;
        $data_update->image = $request->image;
        
        $file = $request->file('image');
       
        $extenstion = $file->getClientOriginalExtension();  
        $filename = time().'.'.$extenstion;
      
        $file->move('uploads', $filename);
        $data_update->image = $filename;

        $imagePath = public_path('uploads/' . $imageName);

        if (File::exists($imagePath)) {
            // Delete the image file
            File::delete($imagePath);
        } 
        $data_update->update();
        return Redirect::back();
        
    }
    public function search(Request $request)
    {
        if(!Auth::user()){
             return redirect()->route('login')
                ->withErrors([
                'email' => 'Please login to access the dashboard.',
            ])->onlyInput('email');
        }else{
            $query = trim($request->input('query_user'));
            $results = User::where('name', 'LIKE', '%' . $query . '%')->get();
            $counts = User::count();   
            // return response()->json($results);
            if($query != null){
            return view('page.user.serach_user', compact('results','query','counts'));
            }
            return redirect()->back();
           
        }
        
    }
}
