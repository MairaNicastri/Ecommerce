<?php

namespace App\Http\Controllers;

use App\Mail\GrazieMail;
use App\Models\Category;
use App\Mail\WorkadminMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class PublicController extends Controller
{
    public function index(){
        $announcements= Announcement::where('is_accepted' , true)->orderBy('created_at' , 'DESC')->take(5)->get();
        $categorie= Category::all();

        
        return view("welcome" , compact('categorie' , 'announcements'));
    }

    public function adsbycat ($name , $category_id){

        $category = Category::find($category_id);
        $announcements = $category->announcements()->where('is_accepted', true)->orderBy('created_at' , 'DESC')->paginate(5);
        return view('adscat' , compact('category' , 'announcements'));

    }

    public function search(Request $request){

        $q = $request->input('q');
        $category = $request->input('categoria');
        $announcements= Announcement::search($q)->where('category_id' , $category)->where('is_accepted', true)->get();


//          $cat= Category::find($category);
//          $pippo = $cat->announcements()->where('is_accepted', true)->get();
// //  foreach($pippo as $pi){
// //      if($pi->search($q))
// //      $pippo = $pi;
// // }
// $topolino=$pippo->search($q)->get();
        // // $announcements1 = $cat->announcements()->search($q)->where('is_accepted', true)->orderBy('created_at' , 'DESC')->get();
        // $announcements2=[];
        // foreach ($announcements as $announcement){
        //     if($announcement->search($q))

        //     array_push($announcements2, $announcement);
        // };
    
        
        return view('search_results', compact('q' , 'announcements'));
        }

        Public function locale($locale)
        {
        session()->put('locale' , $locale);
        return redirect()->back();
        }


//nuove aggiunte hai aggiunto anche le rotte

        
        public function workWithUs(){
            return view('welcome');
        }
    
        public function workSubmit(Request $request){
            $name=$request->input('name');
            $email=$request->input('email');
            $message=$request->input('message');
            $eta=$request->input('eta');
            $disponibilita=$request->input('disponibilita');
            $dati= compact('name' , 'email' , 'message' , 'eta' , 'disponibilita');
    
            Mail::to("amministrazione@mail.it")->send(new WorkadminMail($dati));
            Mail::to($email)->send(new GrazieMail($dati));
            return redirect(route('grazie'));
        }
        public function grazie (){
            $name=Auth::user()->name;
               return view("mails.grazievista" , compact('name'));
           }
        

}
