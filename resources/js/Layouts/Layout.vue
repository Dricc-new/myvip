<script setup>
import { Head, Link } from '@inertiajs/inertia-vue3';

var root = document.querySelector(':root');


/*     
    root.style.setProperty('--sidebar-txt-color-1'      ,style.sb_txt_c_1;
    root.style.setProperty('--sidebar-txt-color-2'      ,style.sb_txt_c_2;
    root.style.setProperty('--sidebar-bg-color-1'       ,style.sb_bg_c_1;
    root.style.setProperty('--sidebar-bg-color-2'       ,style.sb_bg_c_2;
    root.style.setProperty('--sidebar-border-color-1'   ,style.sb_br_c_1;
    root.style.setProperty('--sidebar-border-color-2'   ,style.sb_br_c_2;
    root.style.setProperty('--txt-color-1'              ,style.;
    root.style.setProperty('--txt-color-2'              ,style.;
    root.style.setProperty('--border-color-1'           ,style.;
    root.style.setProperty('--border-color-2'           ,style.;
    root.style.setProperty('--background-color-1'       ,style.;
    root.style.setProperty('--background-color-2'       ,style.;
    root.style.setProperty('--border-size'              ,style.;
    root.style.setProperty('--border-radius'            ,style.;
*/

</script>

<template>
    <Head :title="title" />
    <div class="font-['Arial']">
        <aside class="sidebar">
            <Link :href="route('settings.theme')">
                <div class="fa fa-user-circle text-5xl p-1 py-5"></div>
            </Link>
            <nav>
                <h1>
                    <div class="m-3 pl-1 fa fa-search"></div>
                    <input type="text" class="m-2 w-48 h-8 rounded focus:border-none" placeholder="Search..." name="" id="">
                </h1>
            </nav>
            <ul>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa fa-home-lg"></i>Home</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class=" text-2xl pl-1 fa fa-bell fa-shake"></i>Notificaciones</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa fa-message"></i>Mensajes</h1>
                    </Link>
                </li>
                
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa fa-play-circle"></i>Streams</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa fa-tags"></i>Marcadores</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa fa-list"></i>Listas</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="fa fa-users"></i>Subscripciones</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa fa-wrench"></i>Settings</h1>
                    </Link>
                </li>
                <br class="p-5">
                <br class="p-5">
                <li>
                    <Link :href="route('home')"> 
                        <h1>
                        <i class="mx-1 fa-solid fa-circle-dot"></i>ir en directo</h1>
                    </Link>
                </li>
                <li>
                    <Link :href="route('post.new')"> 
                        <h1>
                        <i class="mx-1 fa fa-plus-square"></i>Nuevo Post</h1>
                    </Link>
                </li>
            </ul>
        </aside>
        <main class="mx-16">
            <slot />
        </main>
        <footer class="fixed bottom-0 inset-x-0 z-40  p-3 ">
            <h1 class="mx-16">© 2022 Galerias VIP. Todos los derechos reservados.</h1>
            <i class="fixed right-2 bottom-1 m-2 text-2xl fa-brands fa-tiktok" aria-hidden="true"></i>
            <i class="fixed right-12 bottom-1 m-2 text-2xl fa-brands fa-facebook" aria-hidden="true"></i>
            <i class="fixed right-24 bottom-1 m-2 text-2xl fa-brands fa-instagram" aria-hidden="true"></i>
        </footer>
    </div>
</template>