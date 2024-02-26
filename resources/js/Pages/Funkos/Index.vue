<script>
export default {
  name: 'FunkoIndex'
}
</script>
<script setup>
import AppLayout from "@/Layouts/AppLayout.vue";
import {Link} from "@inertiajs/vue3";
import {Menu, MenuButton, MenuItem, MenuItems} from '@headlessui/vue'
import {ChevronDownIcon} from '@heroicons/vue/20/solid'
import {defineProps} from 'vue'
import {Inertia} from '@inertiajs/inertia'
import {ChevronLeftIcon, ChevronRightIcon} from '@heroicons/vue/20/solid'

defineProps({
  funkos: {
    type: Object,
    required: true
  }
})
const deleteFunko = (id) => {
  if (confirm('¿Estás seguro de eliminar esta funko?')) {
    Inertia.delete(route('funkos.destroy', id))
  }
}
</script>

<template>
  <AppLayout title="Funkos">
    <template #header>
      <h2 class="font-semibold text-xl text-gray-800 leading-tight">
        Funkos
      </h2>
    </template>
    <div class="py-12">
      <div class="relative max-w-7xl mx-auto sm:px-6 lg:px-8">
        <div class="p-6 bg-white border-b border-gray-200 background-size">
          <div class="justify-between">
            <Link :href="route('funkos.create')"
                  class="text-white bg-indigo-500 hover:bg-indigo-600 py-2 px-4 rounded"
                  v-if="$page.props.user.permissions.includes('create funko')">Crear Funko
            </Link>

            <ul role="list" class="divide-y divide-gray-100">
              <li v-for="funko in funkos.data" :key="funko.id"
                  class="flex justify-between gap-x-6 py-5">
                <div class="flex min-w-0 gap-x-4">
                  <div class="flex items-center gap-x-4">
                    <img  :src="`/storage/${funko.imagen}`" alt="Funko" class="h-16 w-16 rounded-lg object-cover"/>
                    <div class="flex flex-col min-w-0 flex-auto">
                      <p class="text-sm font-semibold leading-6 text-gray-900">{{ funko.nombre }}</p>
                      <p class="text-xs leading-5 text-gray-500">Precio: {{ funko.precio }} €</p>
                    </div>
                  </div>
                </div>
                <div class="hidden shrink-0 sm:flex sm:flex-col sm:items-end">
                  <Menu as="div" class="relative inline-block text-left">
                    <div>
                      <MenuButton
                          class="inline-flex w-full justify-center gap-x-1.5 rounded-md bg-white px-3 py-2 text-sm font-semibold text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 hover:bg-gray-50">
                        Opciones
                        <ChevronDownIcon class="-mr-1 h-5 w-5 text-gray-400"
                                         aria-hidden="true"/>
                      </MenuButton>
                    </div>

                    <transition enter-active-class="transition ease-out duration-100"
                                enter-from-class="transform opacity-0 scale-95"
                                enter-to-class="transform opacity-100 scale-100"
                                leave-active-class="transition ease-in duration-75"
                                leave-from-class="transform opacity-100 scale-100"
                                leave-to-class="transform opacity-0 scale-95">
                      <MenuItems
                          class="absolute right-0 z-10 mt-2 w-56 origin-top-right divide-y divide-gray-100 rounded-md bg-white shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none">
                        <div class="py-1"
                             v-if="$page.props.user.permissions.includes('update funko')">
                          <MenuItem v-slot="{ active }">
                            <Link :href="route('funkos.edit', funko.id)"
                                  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                              Editar
                            </Link>
                          </MenuItem>
                        </div>
                        <div class="py-1"
                             v-if="$page.props.user.permissions.includes('read funko')">
                          <MenuItem v-slot="{ active }">
                            <Link :href="route('funkos.show', funko.id)"
                                  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                              Detalle
                            </Link>
                          </MenuItem>
                        </div>
                        <div class="py-1"
                             v-if="$page.props.user.permissions.includes('update funko')">
                          <MenuItem v-slot="{ active }">
                            <Link :href="route('funkos.editImagen', funko.id)"
                                  :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm']">
                              Cambiar Imagen
                            </Link>
                          </MenuItem>
                        </div>
                        <div class="py-1"
                            >
                          <MenuItem v-slot="{ active }">
                            <button @click="deleteFunko(funko.id)"
                                    :class="[active ? 'bg-gray-100 text-gray-900' : 'text-gray-700', 'block px-4 py-2 text-sm text-red-600 w-full sm:text-left']">
                              Eliminar
                            </button>
                          </MenuItem>
                        </div>
                      </MenuItems>
                    </transition>
                  </Menu>
                </div>
              </li>
            </ul>
          </div>
          <div class="absolute inset-x-0 bottom-0 pb-4">
            <nav class="flex justify-center -space-x-px rounded-md " aria-label="Pagination">
              <Link v-if="funkos.prev_page_url" :href="funkos.prev_page_url"
                    class="relative inline-flex items-center rounded-l-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Previous</span>
                <ChevronLeftIcon class="h-5 w-5" aria-hidden="true"/>
              </Link>
              <template v-if="funkos.last_page>1" v-for="page in funkos.last_page" :key="page">
                <Link :href="`?page=${page}`"
                      class="relative inline-flex items-center px-4 py-2 text-sm font-semibold text-gray-900 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0"
                      :class="{'z-10 bg-indigo-600 text-white focus-visible:outline focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600': funkos.current_page === page}"
                      :aria-current="funkos.current_page === page ? 'page' : undefined">
                  {{ page }}
                </Link>
              </template>
              <Link v-if="funkos.next_page_url" :href="funkos.next_page_url"
                    class="relative inline-flex items-center rounded-r-md px-2 py-2 text-gray-400 ring-1 ring-inset ring-gray-300 hover:bg-gray-50 focus:z-20 focus:outline-offset-0">
                <span class="sr-only">Next</span>
                <ChevronRightIcon class="h-5 w-5" aria-hidden="true"/>
              </Link>
            </nav>
          </div>
        </div>
      </div>
    </div>
  </AppLayout>
</template>

<style scoped>
.background-size {
  width: 100%;
  height: 590px;
}
</style>
