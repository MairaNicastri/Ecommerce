<?php

namespace App\Models;

use App\Models\User;
use App\Models\Category;
use Laravel\Scout\Searchable;
use App\Models\AnnouncementImage;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Announcement extends Model
{
    use HasFactory;

    protected $fillable=[
        'title','description','category_id', 'price' ,
    ];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function user(){
        return $this->belongsTo(User::class);
        }

    public function images(){
        return $this->hasMany(AnnouncementImage::class);
        }

    static function ToBeRevisionedCount(){
        return Announcement::where('is_accepted', null)->count();
    }
    use Searchable;
    public function toSearchableArray(){

        $category=$this->category;

        $array=[

            'id'=>$this->id,
            'title'=>$this->title,
            'description'=>$this->description,
            'price'=>$this->price,
            'category'=>$category,

        ];
        return $array;
    }



}
