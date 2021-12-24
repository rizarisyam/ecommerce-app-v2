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
                <form @submit.prevent="categoryPost">
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
<input type="file" @input="category.imageFile = $event.target.files[0]" />
    <progress v-if="category.progress" :value="category.progress.percentage" max="100">
      {{ category.progress.percentage }}%
    </progress>
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
import {useForm} from '@inertiajs/inertia-vue3';
import Layout from '@/Pages/Admin/Dashboard.vue';
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import { only } from '@/helper';
export default {
    layout: Layout,
    props: {
        errors: Object,
    },
    data() {
        return {
            editor: ClassicEditor
        }
    },
    setup() {
        const category = useForm({
            name: null,
            desc: null,
            imageFile: ""
        })

         function categoryPost() {
            category.transform((form) => {
                        const transformed = only(form, ['name', 'imageFile', 'desc']);
                        return transformed;
                    }).post(route('product-categories.store'))
        }

        return {category,categoryPost}
    },
    methods: {
        // categoryPost() {
        //     this.category.post(route('product-categories.store'))
        //     this.closeModal();
        // },

    },
    components: {Layout, ckeditor: CKEditor.component}
}
</script>
