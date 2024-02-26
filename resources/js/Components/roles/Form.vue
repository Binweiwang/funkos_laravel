<script>
export default {
    name: "RoleForm",
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
    },
    roles: {
        type: Object,
        required: true
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
                    {{ updating ? 'Editar Usuario' : 'Crear Usuario' }}
                </label>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">username:</span>
                        <input type="text" v-model="form.name" id="nombre" autocomplete="nombre"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                    </div>
                    <InputError :message="$page.props.errors.name" class="mt-2"/>
                </div>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Email:</span>
                        <input type="text" v-model="form.email" id="nombre" autocomplete="nombre"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                    </div>
                    <InputError :message="$page.props.errors.email" class="mt-2"/>
                </div>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <span class="flex select-none items-center pl-3 text-gray-500 sm:text-sm">Contraseña:</span>
                        <input type="text" v-model="form.password" id="nombre" autocomplete="nombre"
                               class="block flex-1 border-0 bg-transparent py-1.5 pl-1 text-gray-900 placeholder:text-gray-400 focus:ring-0 sm:text-sm sm:leading-6"/>
                    </div>
                    <InputError :message="$page.props.errors.password" class="mt-2"/>
                </div>
                <div class="mt-2">
                    <div
                        class="flex rounded-md shadow-sm ring-1 ring-inset ring-gray-300 focus-within:ring-2 focus-within:ring-inset focus-within:ring-indigo-600 sm:max-w-md">
                        <select v-model:="form.role"
                                class="mt-1 sm:mt-0 form-select block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md shadow-sm">
                            <option disabled selected>Selecciona una role</option>
                            <option v-for="role in roles" :key="role.id" :value="role.id">
                                {{ role.name }}
                            </option>
                        </select>
                    </div>
                    <InputError :message="$page.props.errors.role" class="mt-2"/>
                </div>
            </div>
            <div class="mt-6 flex items-center justify-end gap-x-6">
                <Link :href="route('funkos.index')"
                      class="rounded-md bg-gray-500 px-3 py-2 text-sm font-semibold text-white shadow-sm hover:bg-gray-600 focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">
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
