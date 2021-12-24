<template>

        <div class="md:grid md:grid-cols-3 md:gap-6">
            <div class="md:col-span-1">
                <div class="px-4 sm:px-0">
                    <h3 class="text-lg font-medium leading-6 text-gray-900">
                        Profile
                    </h3>
                    <p class="mt-1 text-sm text-gray-600">
                        This information will be displayed publicly so be
                        careful what you share.
                    </p>
                </div>
            </div>
            <div class="mt-5 md:mt-0 md:col-span-2">
                <form @submit.prevent="updateCategory">
                    <div class="shadow sm:rounded-md sm:overflow-hidden">
                        <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                            <div class="grid grid-cols-3 gap-6">
                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="company_website"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        Name
                                    </label>

                                    <input
                                        type="text"
                                        name="company_website"
                                        id="company_website"
                                        class="
                                            focus:ring-indigo-500
                                            focus:border-indigo-500
                                            flex-1
                                            block
                                            w-full
                                            rounded-none rounded-r-md
                                            sm:text-sm
                                            border-gray-300
                                        "
                                        placeholder="Name"
                                        v-model="category.name"
                                    />
                                </div>

                                <div class="col-span-3 sm:col-span-2">
                                    <label
                                        for="company_website"
                                        class="
                                            block
                                            text-sm
                                            font-medium
                                            text-gray-700
                                        "
                                    >
                                        Description
                                    </label>

                                    <ckeditor
                                        :editor="editor"
                                        v-model="category.desc"
                                    ></ckeditor>
                                </div>


                            </div>
                        </div>
                        <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                            <button
                                type="submit"
                                class="
                                    inline-flex
                                    justify-center
                                    py-2
                                    px-4
                                    border border-transparent
                                    shadow-sm
                                    text-sm
                                    font-medium
                                    rounded-md
                                    text-white
                                    bg-indigo-600
                                    hover:bg-indigo-700
                                    focus:outline-none
                                    focus:ring-2
                                    focus:ring-offset-2
                                    focus:ring-indigo-500
                                "
                            >
                                Save
                            </button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

</template>








<script>
import { reactive } from "vue";
import Layout from "@/Pages/Admin/Dashboard.vue";
import { Inertia } from "@inertiajs/inertia";

import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
    layout: Layout,
    props: {
        errors: Object,
        category: Object,
    },
    data() {
        return {
            editor: ClassicEditor
        }
    },
    setup(props) {
        const category = reactive({
            id: props.category.id,
            name: props.category.name,
            desc: props.category.desc,
        });
        const updateCategory = () => {
            const data = {
                name: category.name,
                desc: category.desc,
            };
            Inertia.put(
                route("product-categories.update", category.id),
                data
            );
        };

        return { category,updateCategory };
    },
    components: {
        Layout,
        ckeditor: CKEditor.component
     }
};
</script>

<style scoped>

</style>
