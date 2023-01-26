<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Inertia\Inertia;

class AcountController extends Controller
{
    public function posts($id = 'My')
    {
        $data = ['idUser' => $id];
        if ($id == 'My') {
            $data += ['isUser' => true];
            $data +=['Posts' => $this->getPosts(Auth::user()->posts)];
        }
        else
            $data += ['isUser' => false];                
            
            return Inertia::render('Account/Posts',$data);
    }

    public function medias($id = 'My')
    {
        $data = ['idUser' => $id];
        if($id == 'My')
            $data += ['isUser' => true];                
        else
            $data += ['isUser' => false];                
             
        return Inertia::render('Account/Medias',$data);
    }

    private function getPosts($posts){
        $data = [];
        $length = 0;
        foreach ($posts as $post) {
            $length++;
            $data += [$post->id => []];
            $data[$post->id]+=['id' => $post->id];
            $data[$post->id]+=['text' => $post->text];
            $data[$post->id]+=['price' => $post->price];
            if($post->attachments == '[]'){
                $data[$post->id]+=['attachs' => 'null'];
                $data[$post->id]+=['length' => 0];
            }
            else{
                $data[$post->id]+=['attachs' => $post->attachments];
                $i = 0;
                foreach($post->attachments as $attach){
                    $i += 1;
                }
                $data[$post->id]+=['length' => $i];
            }

        }
        $data +=['length' => $length];
         
         return $data;
    }

}
