<script setup>
import { useForm,Head } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        placeholder: String,
        thumbnails:[],
        idPost: null,
        text: String,
    });

    const form = useForm({
      files: [],
      idPost: props.idPost,
      text: props.text,
      thumbnails: props.thumbnails,
      placeholder: props.placeholder,
    })

    console.log(props)
    function save() {
      form.post(route('post.save'),{
            forceFormData: true,
        });
    }
    
    function loadFiles(files){
       /*  thumbnails.push({src:'http://127.0.0.1:8000/img/LOGO.svg'}); */
        /* console.log(thumbnails); */
        
        form.files = files.target.files;
        form.post(route('post.addAttachments'),{
            forceFormData: true,
        });
    }
</script>

<template>
    <Head title="Create Post" />
    <div>
        <form @submit.prevent="submit" enctype="multipart/form-data">
            <h1 class="text-2xl text-center">Nueva publicacion</h1>
            <div class="block m-2">
                <textarea class="rounded-md border-2 w-full" v-model="form.text" cols="30" rows="10" :placeholder="placeholder"></textarea>
            </div>
            
            <button class="rounded-md border-2 relative mx-2 text-red-600 border-red-600 px-5 py-1" onclick="document.getElementById('getFile').click()">Añadir Archivo</button>
            <input id="getFile" type="file" class="hidden" multiple @change="loadFiles"/>
            <!-- <progress class="rounded-md border-2 h-5" v-if="form.progress" :value="form.progress.percentage" max="100">
            {{ form.progress.percentage }}%
            </progress> -->
            <button class="rounded-md border-2 relative mr-3 text-red-600 border-red-600 px-5 py-1" @click="save">Publicar</button>
        </form>
    </div>
    <h1>akdfjhlksahfsdahylkh</h1>
    <ul class="w-auto h-48 m-3" id="box-files">
        <li v-for="thumbnail in thumbnails">
            <div class="rounded-lg w-24 h-24 p-5 bg-slate-800">
                <img :src="thumbnail" >
            </div>
        </li>
    </ul>
    
</template>
