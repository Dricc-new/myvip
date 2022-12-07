<script setup>
import { useForm,Head } from '@inertiajs/inertia-vue3';
    const props = defineProps({
        postId: Number,
        placeholder: String,
        thumbnails: Array,
        text: String,
        price: Number,
    });

    const form = useForm({
        postId: props.postId,
        price: props.price,
        files: [],
        text: props.text,
        thumbnails: props.thumbnails,
    })
    
    const formDel = useForm({
        delAttach: [],
        postId: props.postId,
    })

    function save() {
      form.post(route('post.save'),{
            forceFormData: true,
            preserveState: true,
        });
    }

    function cancel(){
        
    }
    
    function delAttach(id){
        formDel.delAttach = [id];
        formDel.post(route('post.delAttach'),{
            preserveState: true,
        });
    }

    function loadFiles(files){
        form.files = files.target.files;
        form.post(route('post.addAttach'),{
            forceFormData: true,
            preserveState: true,
        });
    }
    function hello(ev){
        console.log(ev.dataTransfer.items[0].getAsFile());
    }

    function dragOver(ev) {
    console.log('File(s) in drop zone');

    // Prevent default behavior (Prevent file from being opened)
        ev.preventDefault();
    }

</script>

<template>
    <Head title="Create Post"/>
    <form @submit.prevent="submit" enctype="multipart/form-data">
    <div class="grid grid-rows-2 gap-1 mx-2 font-['Arial']">
        <div>
            <h1 class="text-3xl text-center text-slate-700 p-2">Nueva publicacion</h1>
            <div @dragleave="dragOver($event)" @drop="hello($event)" draggable="true">
                <ul class="overflow-auto h-64 border rounded" id="box-files" v-if="(thumbnails[0])">
                    <li class="inline-block " v-for="thumbnail in thumbnails">
                        <div v-if="(thumbnail.attachment_type_id==1)" class="grid relative m-2 w-32 h-32 rounded justify-items-center shadow-slate-800 hover:shadow-lg hover:shadow-slate-800">
                            <div class="fa fa-xmark text-2xl shadow-sm justify-self-end mx-2 text-red-400 hover:text-red-500 absolute" @click="delAttach(thumbnail.id)"></div>
                            <div class="fa fa-image text-2xl place-self-center text-gray-400 absolute"></div>
                            <img class=" object-contain w-32 h-32 rounded shadow-md bg-slate-100 inline-block " :src="'/storage/post/image/'+thumbnail.filename" >
                        </div>
                        <div v-else-if="(thumbnail.attachment_type_id==2)" class="grid relative m-2 justify-items-center">
                            <div :class="'fa fa-'+thumbnail.type+' text-2xl place-self-center text-gray-400 absolute'"></div>
                            <div class="fa fa-xmark text-2xl justify-self-end mx-2 text-red-400 absolute"></div>
                            <img class=" object-contain w-32 h-32 rounded shadow-md bg-slate-100 shadow-slate-800 hover:shadow-lg inline-block hover:shadow-slate-800 " :src="'/storage/post/music/'+thumbnail.filename" >
                        </div>
                        <div v-else-if="(thumbnail.attachment_type_id==3)" class="grid relative m-2 justify-items-center">
                            <div :class="'fa fa-'+thumbnail.type+' text-2xl place-self-center text-gray-400 absolute'"></div>
                            <div class="fa fa-xmark text-2xl justify-self-end mx-2 text-red-400 absolute"></div>
                            <img class=" object-contain w-32 h-32 rounded shadow-md bg-slate-100 shadow-slate-800 hover:shadow-lg inline-block hover:shadow-slate-800 " :src="thumbnail.filename" >
                        </div>
                    </li>
                </ul>
                <div v-else class="border-dashed border-2 p-24 border-gray-400 flex justify-around">
                    <h1 class="font-bold text-4xl text-center text-gray-400">ARRASTRE Y SUELTE LOS ARCHIVOS</h1>
                </div>
            </div>
        </div>
        <div>    
            <textarea class="rounded-md border w-full" v-model="form.text" cols="30" rows="10" :placeholder="placeholder"></textarea>
            <input id="getFile" type="file" class="hidden" multiple @change="loadFiles"/>
            <div class="columns-2 content-start">
                <div>
                    <button class="rounded-md border m-2 text-red-600 border-red-600 px-5 py-1" onclick="document.getElementById('getFile').click()">Añadir Archivo</button>
                    <button class="rounded-md border m-2 text-red-600 border-red-600 px-5 py-1" >Fijar precio</button>
                </div>
                <div class="flex justify-end">
                    <button class="rounded-md border m-2 text-red-600 border-red-600 px-5 py-1" @click="cancel">Cancelar</button>
                    <button class="rounded-md border m-2 text-red-600 border-red-600 px-5 py-1" @click="save">Publicar</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</template>
