<script setup>
    import ProfileLayout from '@/Layouts/Profile.vue';
import { Head, Link } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        idUser: String,
        isUser: Boolean,
        Posts: Array,
    });
    console.log(props.Posts);
</script>
<template>
    <Head :title="'Posts'"></Head>
    <ProfileLayout :isUser="props.isUser" v-if="Posts">

        <div class="w-full border-c1 isHover focusItem text-center m-1" >
            <h1 class="txt-c1 text-xl">{{ Posts.length }} Posts</h1>
        </div>
        <Link class="w-full text-center m-1 border-b border-c1 isHover" :href="route('profile.medias',{id:props.idUser})"><h1 class="txt-c1 text-xl">Medios</h1></Link>
        
        <div class="col-span-2 w-full text-xl txt-c1">
            <div class="py-4 text-left text-2xl txt-c1" v-for="post in Posts">
                <div class="p-4">{{post.text}}</div>
                <div class="h-96 w-full overflow-hidden"  v-if="post.attachs != null">
                    <h1>{{ post.attachs }}</h1>
                    <div v-for="attach in post.attachs">
                        <img class="object-contain h-96 w-full" :src="'/storage/post/image/'+attach.filename" alt="">
                    </div>
                </div>
                <hr>
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