<script setup>

import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";
import {Inertia} from "@inertiajs/inertia";
defineProps({
    categoria: {
        type: Object,
        required: true
    }

})
const eliminarFunko = (id) => {
    if (confirm('¿Estás seguro de eliminar este funko?')) {
        Inertia.delete(route('funkos.destroy', id))
    }
}
</script>

<template>
    <AppLayout title="Detalle Categoria">
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Detalle Categoria
            </h2>
        </template>
        <div class="py-12">
            <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="p-6 bg-white border-b border-gray-200 background-size">
                    <div>
                        <div class="px-4 sm:px-0">
                            <h3 class="text-base font-semibold leading-7 text-gray-900">ID:</h3>
                            <p class="mt-1 max-w-2xl text-sm leading-6 text-gray-500">{{categoria.id}}</p>
                        </div>
                        <div class="mt-6 border-t border-gray-100">
                            <dl class="divide-y divide-gray-100">
                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0">
                                    <dt class="text-sm font-medium leading-6 text-gray-900">Categoria: </dt>
                                    <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0">{{categoria.nombre}}</dd>
                                </div>

                                <div class="px-4 py-6 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-0" v-if="$page.props.user.permissions.includes('update category')">
                                        <dt class="text-sm font-medium leading-6 text-gray-900">Acciones:</dt>
                                        <dd class="mt-1 text-sm leading-6 text-gray-700 sm:col-span-2 sm:mt-0 flex gap-4 items-center">
                                            <Link :href="route('categorias.edit', categoria.id)"
                                                  class="text-white bg-indigo-500 hover:bg-indigo-600 px-3 py-2 rounded text-sm max-w-xs">
                                                Editar
                                            </Link>
                                            <button @click="eliminarFunko(categoria.id)"
                                                    class="text-white bg-red-600 hover:bg-red-700 px-3 py-2 rounded text-sm max-w-xs">
                                                Eliminar
                                            </button>
                                            <Link :href="route('categorias.index')"
                                                  class="text-white bg-gray-500 hover:bg-gray-600 px-3 py-2 rounded text-sm max-w-xs">
                                                Volver a la lista
                                            </Link>
                                        </dd>
                                </div>
                            </dl>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AppLayout>
</template>

<style scoped>

</style>
