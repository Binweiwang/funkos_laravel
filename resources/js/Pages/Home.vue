<script setup>
import AppLayout from '@/Layouts/AppLayout.vue';
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
                        <div class="basis-2/4">
                            <div class="font-semibold text-sm text-gray-800 leading-tight ">Categorias</div>
                            {{ $page.props}}
                        </div>
                        <div class="basis-3/4">
                            <div class="font-semibold text-sm text-gray-800 leading-tight ">Funkos</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>
