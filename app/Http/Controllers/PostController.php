<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;

class PostController extends Controller
{
    public function Create(){
        $post = new Post(['user_id' => Auth::user()->id]);
        $post->save();
        return Inertia::render('Post/Create',[
            'idPost'=>$post->id,
            'placeholder' => "Escriba un nuevo post, arrastre y suelte los archivos para añadirlos"]);
    }

    public function AddAttachments(Request $request){
        /* 
        return 'sooooo'; */
        if($request->hasFile('files')){
            $temp = ['idPost' => $request['idPost'],
                     'placeholder' => $request['placeholder'],
                     'text'=> $request['text'],
                     'thumbnails' => [
                        'src' => [],
                        'type' =>[],
                     ],
                    ];
            $storage = Storage::disk('public');
            foreach($request->file('files') as $file){
                do {
                    $fileId = Uuid::uuid4()->getHex();
                } while (Attachment::query()->where('filename', $fileId)->first() != null);
                $filePath = 'post/';
                $attachment = new Attachment(['filename' => $fileId.'.png',
                                              'driver' => 1,
                                              'type_id' => 1,
                                              'post_id' => $request['idPost'],]);
                $filePath = $filePath.$fileId.'.png';
                $storage->put($filePath,file_get_contents($file));
                Arr::add($temp['thumbnails']['src'],null,$filePath);
                Arr::add($temp['thumbnails']['type'],null,'image');
                
            }
            return Inertia::render('Post/Create',$temp);
            
        }
        return Inertia::render('Post/Create',$request);
    }

    public function Save(){
        return 'save';
    }
}
