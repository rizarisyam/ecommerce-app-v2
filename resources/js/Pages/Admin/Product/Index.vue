<template>
<!-- This example requires Tailwind CSS v2.0+ -->

  <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
      Manage Products
    </h3>

    <div class="mt-3 sm:mt-0 sm:ml-4">
        <a :href="route('products.create')">

      <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Create Product
      </button>
        </a>


    </div>
  </div>



    <div class="my-4">
        <input type="text" v-model="searchTerm" placeholder="Search.....">
    </div>

        <table-lite
            :is-static-mode="true"
            :is-slot-mode="true"
            :is-loading="table.isLoading"
            :columns="table.columns"
            :rows="table.rows"
            :total="table.totalRecordCount"
            :sortable="table.sortable"
            @is-finished="table.isLoading = false"
        >
        <template v-slot:active="data">
            <span v-if="data.value.active" class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-blue-100 text-blue-800">
    Active
  </span>
 <span v-if="!data.value.active" class="inline-flex items-center px-2.5 py-0.5 rounded-md text-sm font-medium bg-red-100 text-red-800">
    Not active
  </span>
        </template>

 <template v-slot:category="data">
     <!-- const {name, desc} = data.value.category; -->
                {{data.value.category.name}}
            </template>
             <template v-slot:inventory="data">
                {{data.value.inventory.quantity}}
            </template>
            <template v-slot:actions="data">
                <div class="w-32 flex justify-around text-xl">
                    <a :href="
                            route('products.edit', data.value.id)
                        ">
                        <i class="fa-light fa-pen-to-square"></i>
                    </a>


                    <button
                    @click.prevent="deleteProducts(data.value.id)"
                    >
                        <i class="fa-solid fa-trash-can"></i>
                    </button>




                </div>
            </template>
        </table-lite>


</template>

<script>
import Layout from "@/Pages/Admin/Dashboard.vue";
import TableLite from "vue3-table-lite";

import { computed, defineComponent, reactive, ref } from "vue";

import { Inertia } from "@inertiajs/inertia";

import ModalAlert from "@/Components/ModalAlert.vue";

export default defineComponent({
    name: "ProductIndex",
    components: { TableLite, ModalAlert},
    layout: Layout,

    data() {
        return {
            number: 1,
            show: false
        };
    },
    props: {
        products: Object,
    },
    methods: {

    },
    updated() {
        window.location.reload();
        // console.log('updated run');
    },
    setup(props) {
        const searchTerm = ref("")
        const data = reactive(props.products.data)
        // Init Your table settings
        const table = reactive({
            isLoading: false,
            columns: [
                {
                    label: "ID",
                    field: "id",
                    width: "3%",
                    sortable: true,
                    isKey: true,
                },
                {
                    label: "Name",
                    field: "name",
                    width: "10%",
                    sortable: true,
                },
                {
                    label: "Description",
                    field: "desc",
                    width: "15%",
                    sortable: true,
                    display: function(row) {
                        return row.desc;
                    }
                },
                {
                    label: "SKU",
                    field: "SKU",
                    width: "15%",
                    sortable: true,
                    display: function(row) {
                        return row.desc;
                    }
                },
                {
                    label: "Category",
                    field: "category",
                    width: "15%",
                    sortable: true,

                },
                {
                    label: "Inventory",
                    field: "inventory",
                    width: "15%",
                    sortable: true,
                },
                {
                    label: "Actions",
                    field: "actions",
                    width: "15%",
                },
            ],

            rows: computed(() => {
                // return data
                return data.filter((value) => {
                    return value.name.toLowerCase().includes(searchTerm.value.toLowerCase())
                })
            }),
            totalRecordCount: computed(() => {
                return table.rows.length;
            }),
            sortable: {
                order: "id",
                sort: "asc",
            },
        })

        const deleteProducts = (id) => {
            Inertia.delete(route('products.destroy', id));
        }

        return {
            table,
            deleteProducts,
            searchTerm
        };
    },

});
</script>

<style scoped>
.card ::v-deep(.table .thead-dark th) {
    color: #fff;
  background-color: #42b983;
  border-color: #42b983;
}



.card ::v-deep(select) {
    width: 60px;
}
</style>
