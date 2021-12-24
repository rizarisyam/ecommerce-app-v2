<template>
   <div class="pb-5 border-b border-gray-200 sm:flex sm:items-center sm:justify-between">
    <h3 class="text-lg leading-6 font-medium text-gray-900">
      Manage Category
    </h3>

    <div class="mt-3 sm:mt-0 sm:ml-4">
        <a :href="route('product-categories.create')">

      <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
        Create Category
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
            <template v-slot:actions="data">
                <div class="w-32 flex justify-around text-xl">
                    <a :href="
                            route('product-categories.edit', data.value.id)
                        ">
                        <i class="fa-light fa-pen-to-square"></i>
                    </a>

                    <button
                    @click.prevent="deleteCategory(data.value.id)"
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


export default defineComponent({
    name: "Index",
    components: { TableLite },
    layout: Layout,

    data() {
        return {


        };
    },
    props: {
        categories: Object,
    },
    methods: {

    },
    updated() {
        // window.location.reload();
        // console.log('updated run');
    },
    setup(props) {
        const searchTerm = ref("")
        const data = reactive(props.categories)
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
                    label: "Descriptian",
                    field: "desc",
                    width: "15%",
                    sortable: true,
                    display: function(row) {
                        return row.desc;
                    }
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

        const deleteCategory = (id) => {
            Inertia.delete(route('product-categories.destroy', id));
        }

        return {
            table,
            deleteCategory,
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
