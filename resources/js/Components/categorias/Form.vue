<script>
export default {
    name: "CategoriaForm",
}
</script>
<script setup>
import {Link} from "@inertiajs/vue3";
import InputError from "@/Components/InputError.vue";

defineProps({
    form: {
        type: Object,
        required: true
    },
    updating: {
        type: Boolean,
        required: false,
        default: false
    }
})
defineEmits(['submit'])
</script>

<template>
    <form @submit.prevent="$emit('submit')">
        <div class="space-y-12">
            <div class="sm:col-span-4">
                <label for="nombre"
                       class="block text-sm font-medium leading-6 text-gray-900">
                    {{ updating ? 'Editar Categoria' : 'Crear Categoria' }}
                </label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Categoria:</span>
                        <input type="text" v-model="form.nombre" id="nombre" autocomplete="nombre"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                    </div>
                    <InputError :message="$page.props.errors.nombre" class="mt-2"/>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="route('categorias.index')" class="text-sm font-semibold leading-6 text-gray-900">
                    Cancelar
                </Link>
                <button type="submit"
                        class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-indigo-500 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
                    {{ updating ? 'Actualizar' : 'Crear' }}
                </button>
            </div>
        </div>
    </form>
</template>

<style scoped>

</style>
