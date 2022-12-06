<?php

namespace App\Http\Controllers;

use App\Models\Attachment;
use App\Models\Post;
use App\Models\TypeAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;
use Ramsey\Uuid\Uuid;

class PostController extends Controller
{
    public $postId = null;

    public function __invoke()
    {
        $post = new Post();
        $post->user_id = Auth::user()->id;
        $post->save();
        return redirect(route('post.edit',$post->id));
    }

    public function edit($id){
        $post = Post::find($id);
        if(Auth::user()->id == $post->user_id){
            return Inertia::render('Post/Edit',[
                'thumbnails' => Attachment::query()->where('post_id',$id)->get(),
                'text' => $post->text,
                'price' => $post->price,
                'postId' => $post->id,
                'placeholder' => fn () => "Escriba un nuevo post, arrastre y suelte los archivos para añadirlos"]);    
        }
        return redirect(route('/'));
    }

    public function addAttach(Request $request){
        if($request->hasFile('files')){
            foreach($request->file('files') as $file){
                $ext = $file->extension();
                $filepath = '/post';
                $type = $this->get_type($ext);
                $filename = $this->create_attach('.'.$ext,$type,$request->postId );
                $file->storeAs($filepath.'/'.$type,$filename,'public');
            }      
        }
        return redirect(route('post.edit',['id' => $request->postId]));
    }

    public function delAttach(Request $request){
        foreach($request->delAttach as $attach){
            $attachment = Attachment::find($attach);
            $storage = Storage::disk('public');
            $storage->delete('/post/'.TypeAttachment::find($attachment->type_id)->type.'/'.$attachment->filename);
            //$storage->delete('/post/'.TypeAttachment::find($attachment->type_id)->type.'/thumbnail/'.$attachment->filename);
            $attachment->delete();
        }
        return redirect(route('post.edit',['id' => $request->postId]));
    }

    public function Save(Request $request){
        $post = Post::find($request->postId);
        $post->text = $request->text;
        $post->price = $request->price;
        $post->save();
        return redirect(route('dashboard'));
    }

    public function create_attach($ext,$type,$post){
        $filename = '';
        do {
            $filename = Uuid::uuid4()->getHex().$ext;
        } while (Attachment::query()->where('filename', $filename)->first() != null);

        $attachment = new Attachment();
        $attachment->filename = $filename;
        $attachment->driver = 1;
        $attachment->type_id = TypeAttachment::query()->where('type',$type)->first()['id'];
        $attachment->post_id = $post;
        $attachment->save();
        return $filename;        
    }

    public function get_type($ext)
    {
        switch ($ext) {
            case 'avi': case 'mp4': case 'wmw': case 'mpg': case 'mpeg': case 'm4v': case 'moov': case 'mov': case 'mkv': case 'wmv': case 'asf':{
                return 'video';
                break;
            }
            case 'mp3':case 'wav':case 'ogg':{
                return 'music';
                break;
            }
            case 'jpg':case 'png':case 'jpeg':{
                return 'image';
                break;
            }
            case 'pdf':case 'xls':case 'xlsx':{
                return null;
                break;
            }
        }
    }
}
