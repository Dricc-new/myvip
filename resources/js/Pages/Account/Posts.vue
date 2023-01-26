<script setup>
    import ProfileLayout from '@/Layouts/Profile.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        idUser: String,
        isUser: Boolean,
        Posts: Array,
    });

    function closed(){
        document.getElementById('boxMedia').style.display = "none";
    }

    function showImg(id){
        document.getElementById('boxMedia').style.display = "";
        
        var img = document.getElementById(id);
        var imgFull = document.getElementById('imgfullscreen');
        imgFull.src = img.src;
        imgFull.alt = img.alt;
        imgFull.title = id;
    }

    function backShowImg(){
        var imgFull = document.getElementById('imgfullscreen');
        if(imgFull.alt != 0)
            imgFull.src = "/storage/post/image/"+props.Posts[imgFull.title].attachs[--imgFull.alt].filename;
        else
            imgFull.src = "/storage/post/image/"+props.Posts[imgFull.title].attachs[imgFull.alt = props.Posts[imgFull.title].length-1].filename;

        var img = document.getElementById(imgFull.title);
        img.src = imgFull.src;
        img.alt = imgFull.alt;
    }

    function nextShowImg(){
        var imgFull = document.getElementById('imgfullscreen');
        if(props.Posts[imgFull.title].length-1 > imgFull.alt)
            imgFull.src = "/storage/post/image/"+props.Posts[imgFull.title].attachs[++imgFull.alt].filename;
        else
            imgFull.src = "/storage/post/image/"+props.Posts[imgFull.title].attachs[imgFull.alt = 0].filename;

        var img = document.getElementById(imgFull.title);
        img.src = imgFull.src;
        img.alt = imgFull.alt;
    }

    function backImg(id){
        var img = document.getElementById(id);
        if(img.alt != 0)
            img.src = "/storage/post/image/"+props.Posts[id].attachs[--img.alt].filename;
    }

    function nextImg(id){
        var img = document.getElementById(id);
        if(props.Posts[id].length-1 > img.alt)
            img.src = "/storage/post/image/"+props.Posts[id].attachs[++img.alt].filename;
    }


</script>
<template >
    <div id="boxMedia" class="fullScreenMedia w-full h-full z-50 bg-zinc-800 justify-center flex items-center">
        <i class="absolute right-3 text-center text-3xl top-4 fas fa-times-circle text-zinc-300 text-opacity-50 hover:text-opacity-100 cursor-pointer" @click="closed()"></i>
        <i class="absolute right-6 text-center text-3xl fas fa-angle-right text-zinc-300 text-opacity-50 hover:text-opacity-100 cursor-pointer" @click="nextShowImg()"></i>
        <i class="absolute left-6 text-center text-3xl fas fa-angle-left text-zinc-300 text-opacity-50 hover:text-opacity-100 cursor-pointer" @click="backShowImg()"></i>
        <img id="imgfullscreen" src="" alt="" class="h-full">
    </div>  
    <Head :title="'Posts'"></Head>
    <ProfileLayout :isUser="props.isUser" v-if="Posts">

        <div class="w-full border-c1 isHover focusItem text-center m-1" >
            <h1 class="txt-c1 text-xl">{{ Posts.length }} Posts</h1>
        </div>
        <Link class="w-full text-center m-1 border-b border-c1 isHover" :href="route('profile.medias',{id:props.idUser})"><h1 class="txt-c1 text-xl">Medios</h1></Link>
        
        <div class="col-span-2 w-full text-xl txt-c1">
            <div v-for="post in Posts">
                <div class="text-left text-2xl txt-c1" v-if="post !== Posts.length">

                    <div class="inline-block m-2 ">
                        <img :src="'/img/avatar.jpg'" class="object-cover w-16 h-16 rounded-full inline-block mb-7" alt="">
                        <div class="inline-block m-2">
                            <h1 class="font-bold text-lg">{{ "User Name" }}</h1>
                            <h1 class="text-lg">{{ "@u0000000" }}</h1>
                        </div>
                    </div>
                    <div class="text-center float-right border border-c1 rounded px-2 m-2"><h1 class="text-xl relative bottom-1">...</h1></div>
                    <h1 class="text-lg float-right m-2">{{ 1 }}s ago</h1>
                    <p class="mx-4 text-lg">{{post.text}}</p>
                    <div class="w-full overflow-hidden" v-if="post.attachs != 'null'">
                        <i class="fa fa-chevron-circle-left relative opacity-30 hover:opacity-80 float-left left-3 top-52 text-4xl cursor-pointer" @click="backImg(post.id)"></i>
                        <i class="fa fa-chevron-circle-right relative opacity-30 hover:opacity-80 float-right right-3 top-52 text-4xl cursor-pointer" @click="nextImg(post.id)"></i>
                        <img class="object-cover h-96 w-full cursor-pointer" @click="showImg(post.id)" :id="post.id" :alt="0" :src="'/storage/post/image/'+post.attachs[0].filename">
                    </div>
                    <i class="far fa-heart p-3"></i>
                    <i class="fa  fa-heart p-3 hidden"></i>
                    <i class="far fa-comment p-3"></i>
                    <h1 class="float-right inline-block m-3 text-xl">{{0}} tips</h1>
                    <h1 class="float-right inline-block m-3 text-xl">{{0}} comments</h1>
                    <h1 class="float-right inline-block m-3 text-xl">{{0}} likes</h1>
                    <hr class="mt-2">
                </div>
            </div>
        </div>

    </ProfileLayout>
    <ProfileLayout :isUser="props.isUser" v-else>

        <div class="bg-color-primary-2 rounded w-full text-center m-1" >
            <h1 class="txt-c1 text-xl"> No hay publicaciones</h1>
        </div>
        <div class="w-full text-center m-1"><h1 class="txt-c2 text-xl">No medios</h1></div>
        
        <div class="col-span-2 bg-color-primary-2 rounded w-full p-4 text-xl txt-c1">
            <img class="w-1/2" src="/img/no-content-available.svg" alt="">
        </div>            
    </ProfileLayout>
</template>