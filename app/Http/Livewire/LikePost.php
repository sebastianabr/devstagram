<?php

namespace App\Http\Livewire;

use Livewire\Component;

class LikePost extends Component
{
    public $post;
    public $likes;
    public $isLiked;
    public function mount($post){
        $this->isLiked=$post->checkLike(auth()->user());
        $this->likes=$post->likes->count();
    }
    public function click(){
        if($this->post->checkLike(auth()->user())){
            $this->post->likes()->where('user_id',auth()->user()->id)->delete();
            $this->likes--;
            $this->isLiked=false;


   
        }
        else{
            $this->post->likes()->create([
                "user_id"=>auth()->user()->id]);
                $this->isLiked=true;
                $this->likes++;

        }
    }

    public function render()
    {
        return view('livewire.like-post');
    }
}
