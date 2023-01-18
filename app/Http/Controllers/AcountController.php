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
            $data +=['Posts' => []];
            $length = 0;
            foreach(Auth::user()->posts as $post){
                $length++;
                $data['Posts'] += [$post->id => []];
                $data['Posts'][$post->id]+=['text' => $post->text];
                $data['Posts'][$post->id]+=['price' => $post->price];
                $data['Posts'][$post->id]+=['attachs' => $post->attachments];
            }
            $data['Posts'] +=['length' => $length];
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

}
