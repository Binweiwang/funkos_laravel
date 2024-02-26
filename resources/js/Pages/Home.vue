<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
import {usePage} from "@inertiajs/vue3";
const { props } = usePage();
const num_categorias = props.categorias.length;
const num_funkos = props.funkos.length;

</script>

<template>
    <AppLayout title="Home">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Home
            </h2>
        </template>


        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                    <div class="flex flex-row">
                        <div class="w-2/4 p-8">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 mb-4">
                                <img src="https://ui-avatars.com/api/?name=C+T" alt="" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a :href="route('categorias.index')">Ver todas Categorías ></a>
                                    </h3>
                                </div>
                                <p class="text-sm font-medium text-gray-900">{{num_categorias}}</p>
                            </div>
                        </div>
                        <div class="w-2/4 p-8">
                            <div class="aspect-h-1 aspect-w-1 w-full overflow-hidden rounded-md bg-gray-200 lg:aspect-none group-hover:opacity-75 lg:h-80 mb-4">
                                <img src="https://ui-avatars.com/api/?name=F+K" alt="" class="h-full w-full object-cover object-center lg:h-full lg:w-full" />
                            </div>
                            <div class="flex justify-between items-center">
                                <div>
                                    <h3 class="text-sm text-gray-700">
                                        <a :href="route('funkos.index')">Ver todos Funkos ></a>
                                    </h3>
                                </div>
                                <p class="text-sm font-medium text-gray-900">{{num_funkos}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
