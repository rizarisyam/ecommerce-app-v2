<template>
    <div class="md:grid md:grid-cols-3 md:gap-6">
        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h3 class="text-lg font-medium leading-6 text-gray-900">Profile</h3>
                <p class="mt-1 text-sm text-gray-600">
                    This information will be displayed publicly so be careful
                    what you share.
                </p>
            </div>
        </div>
        <div class="mt-5 md:mt-0 md:col-span-2">
            <form @submit.prevent="productStore" enctype="multipart/form-data">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">
                        <div class="grid grid-cols-3 gap-6">
                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >Name</label>

                                <input
                                    type="text"
                                    name="company_website"
                                    id="company_website"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Name"
                                    v-model="product.name"
                                />
                            </div>
<input type="file" @input="product.imageFile = $event.target.files[0]" />
    <progress v-if="product.progress" :value="product.progress.percentage" max="100">
      {{ product.progress.percentage }}%
    </progress>
                            <!-- <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="cover_photo"
                                    class="block text-sm font-medium text-gray-700"
                                >Photo product</label>
                                <div class="w-32">
                                    <img :src="previewImage" />
                                </div>
                                <div
                                    class="mt-1 flex justify-center px-6 pt-5 pb-6 border-2 border-gray-300 border-dashed rounded-md"
                                >
                                    <div class="space-y-1 text-center">
                                        <svg
                                            class="mx-auto h-12 w-12 text-gray-400"
                                            stroke="currentColor"
                                            fill="none"
                                            viewBox="0 0 48 48"
                                            aria-hidden="true"
                                        >
                                            <path
                                                d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                                stroke-width="2"
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                            />
                                        </svg>
                                        <div class="flex text-sm text-gray-600">
                                            <label
                                                for="file-upload"
                                                class="relative cursor-pointer bg-white rounded-md font-medium text-indigo-600 hover:text-indigo-500 focus-within:outline-none focus-within:ring-2 focus-within:ring-offset-2 focus-within:ring-indigo-500"
                                            >
                                                <span>Upload a file</span>
                                                <input
                                                    id="file-upload"
                                                    @input="product.imageFile = $event.target.files[0]"
                                                    type="file"

                                                    class="sr-only"
                                                />
                                            </label>
                                            <p class="pl-1">or drag and drop</p>
                                        </div>
                                        <p class="text-xs text-gray-500">PNG, JPG, GIF up to 2MB</p>
                                    </div>
                                </div>
                            </div> -->

                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >SKU</label>

                                <ckeditor :editor="editor" v-model="product.SKU"></ckeditor>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >Description</label>

                                <ckeditor :editor="editor" v-model="product.desc"></ckeditor>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >Category product</label>

                                <select
                                    v-model="product.category_id"
                                    id="location"
                                    name="location"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                >
                                    <option selected>Category product</option>
                                    <option
                                        v-for="cat in categories"
                                        :key="cat.id"
                                        :value="cat.id"
                                    >{{ cat.name }}</option>
                                    <!-- <option>EU</option> -->
                                </select>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >Discount Product</label>

                                <select
                                    v-model="product.discount_id"
                                    id="location"
                                    name="location"
                                    class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md"
                                >
                                    <option selected>Discount product</option>
                                    <option
                                        v-for="discount in discounts"
                                        :key="discount.id"
                                        :value="discount.id"
                                    >
                                        {{ discount.name }} :
                                        {{ discount.discount_percent }}
                                    </option>
                                </select>
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >Inventory</label>

                                <input
                                    type="text"
                                    name="company_website"
                                    id="company_website"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Inventory"
                                    v-model="product.quantity"
                                />
                            </div>

                            <div class="col-span-3 sm:col-span-2">
                                <label
                                    for="company_website"
                                    class="block text-sm font-medium text-gray-700"
                                >Price</label>

                                <input
                                    type="text"
                                    name="company_website"
                                    id="company_website"
                                    class="focus:ring-indigo-500 focus:border-indigo-500 flex-1 block w-full rounded-none rounded-r-md sm:text-sm border-gray-300"
                                    placeholder="Name"
                                    v-model="product.price"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="px-4 py-3 bg-gray-50 text-left sm:px-6">
                        <button
                            type="submit"
                            class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                        >Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>

import CKEditor from "@ckeditor/ckeditor5-vue";
import ClassicEditor from "@ckeditor/ckeditor5-build-classic";
import { only } from '@/helper';
import Layout from "@/Pages/Admin/Dashboard.vue";
import { reactive, ref } from '@vue/reactivity';
import { Inertia } from '@inertiajs/inertia';
import { useForm } from "@inertiajs/inertia-vue3";

export default {
    components: { ckeditor: CKEditor.component, Layout },
    data() {
        return {
            editor: ClassicEditor,
        };
    },
    layout: Layout,
    props: {
        categories: Object,
        discounts: Object,
        errors: Object,
    },
    setup() {
        const previewImage = ref("");

        const product = useForm({
            name: null,
            desc: null,
            SKU: null,
            imageFile: "",
            category_id: -1,
            quantity: 0,
            price: 0,
            discount_id: -1,
        });

        const uploadFile = (e) => {
            const file = e.target.files[0];
            previewImage.value = URL.createObjectURL(file);
        }

        const productStore = () => {
            product.transform((form) => {
                        const transformed = only(form, ['name', 'imageFile', 'desc', 'SKU', 'quantity', 'price']);
                        if (form.category_id > 0) {
                            transformed.category_id = form.category_id;
                        }
                        if (form.discount_id > 0) {
                            transformed.discount_id = form.discount_id;
                        }

                        return transformed;
                    }).post(route('products.store'));
            // // console.log(imageFile.value);
            // // console.log(product.imageFile);
            // const formData = new FormData();
            // formData.append('imageFile', product.imageFile);

            // console.log(formData.get('imageFile'));

            // Inertia.post(route('products.store'), {...product, formData})
            }
        return { product, previewImage, uploadFile, productStore };

    }
                // methods: {
                // productStore() {
                //     console.log(this.product);
                //     const formData = new FormData();

                //         formData.append('imageFile', this.product.imageFile)

                //     this.product.transform((form) => {
                //         const transformed = only(form, ['name', 'imageFile', 'desc', 'SKU', 'quantity', 'price']);
                //         if (form.category_id > 0) {
                //             transformed.category_id = form.category_id;
                //         }
                //         if (form.discount_id > 0) {
                //             transformed.discount_id = form.discount_id;
                //         }

                //         return transformed;
                //     }).post(route("products.store"), formData, {
                //          headers: {
                //     'Content-Type': 'multipart/form-data'
                //   }
                //     });
                // },
                // uploadFile(event) {
                //     console.log(event.target.files[0]);
                //     this.imageFile = URL.createObjectURL(event.target.files[0]);
                //     // this.product.imageFile = event.target.files;
                // }

};
</script>
