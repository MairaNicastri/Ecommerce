<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use App\Models\AnnouncementImage;
use Illuminate\Http\Request;

class RevisorController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth.revisor');
    }

    public function index(){
        $announcement=Announcement::where('is_accepted', null)->orderBy('created_at', 'DESC')->first();
        

        return view('revisor.index', compact('announcement'));

    }

    public function setAccepted($announcement_id,$value)
    {
        $announcement=Announcement::find($announcement_id);
        $announcement->is_accepted=$value;
        $announcement->save();
        return redirect(route('indexrevisor'));
    }

    public function accept($announcement_id)
    {
      return $this->setAccepted($announcement_id, true);
    }

    public function reject($announcement_id)
    {
      return $this->setAccepted($announcement_id, false);
    }

    public function setAccepted1($announcement_id,$value)
    {
        $announcement=Announcement::find($announcement_id);
        $announcement->is_accepted=$value;
        $announcement->save();
        return redirect()->back();
    }

    public function accept1($announcement_id)
    {
      return $this->setAccepted1($announcement_id, true);
    }

    public function reject1($announcement_id)
    {
      return $this->setAccepted1($announcement_id, false);
    }


    public function indexconferm(){
      $announcementtrue=Announcement::where('is_accepted', true)->orderBy('created_at', 'DESC')->get();
      $announcementfalse=Announcement::where('is_accepted', false)->orderBy('created_at', 'DESC')->get();
      return view('revisor.indexconferm' , compact('announcementtrue' , 'announcementfalse'));
    }


}

