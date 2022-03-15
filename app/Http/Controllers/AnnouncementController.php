<?php

namespace App\Http\Controllers;

use App\Mail\GrazieMail;
use App\Models\Category;
use App\Jobs\ResizeImage;
use App\Mail\WorkadminMail;
use App\Models\Announcement;
use Illuminate\Http\Request;
use App\Models\AnnouncementImage;
use App\Jobs\GoogleVisionWatermark;
use App\Jobs\GoogleVisionLabelImage;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Mail;
use App\Jobs\GoogleVisionRemoveFaces;
use Illuminate\Support\Facades\Storage;
use App\Jobs\GoogleVisionSafeSearchImage;
use App\Http\Requests\AnnouncementRequest;


class AnnouncementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
    $this->middleware('auth')->except('show' , 'index');
    }


    public function index()
    {
        $categorie= Category::all();
        $announcements= Announcement::where('is_accepted' , true)->orderBy('created_at' , 'DESC')->paginate(6);
        $immagini= AnnouncementImage::all();

  
        return view('announcements.indexads' , compact('announcements' , 'categorie' , 'immagini'));
    }
//magari questa rotta la usiamo per il profilo utente



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $categorie= Category::all();
        $uniqueSecret = $request->old('uniqueSecret' , base_convert(sha1(uniqid(mt_rand())), 16, 36));
        return view('announcements.adsform' , compact ('categorie' , 'uniqueSecret'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     
    public function store(AnnouncementRequest $request)
    {

        
        $user=Auth::user();
        
        $announcement= $user->usannouncements()->create([
            'title'=>$request->title,
            'description'=>$request->description,
            'price'=>$request->price,
            "category_id"=>$request->categoria, 
        ]);



        $uniqueSecret = $request->input('uniqueSecret');
        $images = session()->get("images.{$uniqueSecret}", []);
        $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
        $images=array_diff($images, $removedImages);
        
        foreach($images as $image){
        $i = new AnnouncementImage();
        $fileName = basename($image);
        $newFileName="public/announcements/{$announcement->id}/{$fileName}";
        Storage::move($image , $newFileName);
        
        // dispatch(new ResizeImage(
        //     $newFileName,
        //     300,
        //     150
        //     ));
        // dispatch(new ResizeImage(
        //     $newFileName,
        //     400,
        //     300
        // ));

        $i->file = $newFileName;
        $i->announcement_id = $announcement->id;
        $i->save();

        // dispatch(new GoogleVisionSafeSearchImage($i->id));
        
        // dispatch(new GoogleVisionLabelImage($i->id));

        GoogleVisionSafeSearchImage::withChain([
        new GoogleVisionLabelImage($i->id),
        new GoogleVisionRemoveFaces($i->id),
        new ResizeImage( $newFileName, 300, 150),
        new ResizeImage($newFileName, 400, 300)
        ])->dispatch($i->id);
        }
        File::deleteDirectory(storage_path("/app/public/temp/{$uniqueSecret}"));

//metodo vecchio
    //    $ads = Announcement::create([
    //        'title'=>$request->title,
    //        'description'=>$request->description,
    //        'price'=>$request->price,
    //        "category_id"=>$request->categoria,
    //    ]);
//per frontend
//    @foreach    
//        <select name="categoria" class="form-select">
//        @foreach($categorie as $categoria)
//        <option value="{{$categoria->id}}" >{{$categoria->name}}</option>

//    @endforeach
   
// @error('categoria')
// <div>{{ $message }}</div>
// @enderror
// </select>
// </div>

       return redirect(route('index'))->with('annunciocreato' , "il tuo annuncio ė ora online");
    }


    public function uploadImage(Request $request){
       
        $uniqueSecret=$request->input('uniqueSecret');
        $fileName = $request->file('file')->store("public/temp/{$uniqueSecret}");
  dispatch(new ResizeImage(
      $fileName,
      120,
      120
      ));
        session()->push("images.{$uniqueSecret}" , $fileName);
        return response()->json(['id'=>$fileName]);
        }

    public function removeImage(Request $request){
            $uniqueSecret = $request->input('uniqueSecret');
            $fileName = $request->input('id');
            session()->push("removedimages.{$uniqueSecret}", $fileName);
            Storage::delete($fileName);
            return response()->json('ok');
            }

    public function getImages(Request $request){
            $uniqueSecret=$request->input('uniqueSecret');
            $images=session()->get("images.{$uniqueSecret}", []);
            $removedImages = session()->get("removedimages.{$uniqueSecret}", []);
            $images= array_diff($images, $removedImages);
            $data = [];
            foreach($images as $image){
                $data[] = [
                'id' => $image,
                //  'src' => Storage::url($image),
                'src' => AnnouncementImage::getUrlByFilePath($image, 120, 120),
                ];
                }
            return response()->json($data);
                }
                           
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function show(Announcement $announcement)
    {
        $related_announcements= Announcement::where('user_id' , $announcement->user->id)->get();
    $immagini= AnnouncementImage::where('announcement_id' , $announcement->id)->get();

        return view ('announcements.adsdetail' , compact('announcement' , 'immagini' , 'related_announcements'));
    }
    // nel pulsante 'vai al dettaglio' deve esserci href="{{route(showads, compact("Announcement"))}}

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function edit(Announcement $announcement)
    {
        return view("announcements.adsedit" , compact("announcement"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function update(AnnouncementRequest $request, Announcement $announcement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Announcement  $announcement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Announcement $announcement)
    {
        //
    }


    //hai commentato per fare il tentativo

    // public function workWithUs(){
    //     return view('mails.workWithUs');
    // }

    // public function workSubmit(Request $request){
    //     $name=$request->input('name');
    //     $email=$request->input('email');
    //     $message=$request->input('message');
    //     $eta=$request->input('eta');
    //     $disponibilita=$request->input('disponibilita');
    //     $dati= compact('name' , 'email' , 'message' , 'eta' , 'disponibilita');

    //     Mail::to("amministrazione@mail.it")->send(new WorkadminMail($dati));
    //     Mail::to($email)->send(new GrazieMail($dati));
    //     return redirect(route('grazie'));
    // }

    // public function grazie (){
    //  $name=Auth::user()->name;
    //     return view("mails.grazievista" , compact('name'));
    // }
}
