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
                <form @submit.prevent="discountStore">
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
                                        v-model="discount.name"
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
                                        v-model="discount.desc"
                                    ></ckeditor>
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
                                        Discount
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
                                        placeholder="Discount dalam decimal"
                                        v-model="discount.discount_percent"
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
                                        Active
                                    </label>

                                    <Switch
                                        v-model="discount.active"
                                        :class="[
                                            discount.active
                                                ? 'bg-indigo-600'
                                                : 'bg-gray-200',
                                            'relative inline-flex flex-shrink-0 h-6 w-11 border-2 border-transparent rounded-full cursor-pointer transition-colors ease-in-out duration-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500',
                                        ]"
                                    >
                                        <span class="sr-only">Use setting</span>
                                        <span
                                            aria-hidden="true"
                                            :class="[
                                                discount.active
                                                    ? 'translate-x-5'
                                                    : 'translate-x-0',
                                                'pointer-events-none inline-block h-5 w-5 rounded-full bg-white shadow transform ring-0 transition ease-in-out duration-200',
                                            ]"
                                        />
                                    </Switch>
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
import { ref } from 'vue'
import { Switch } from '@headlessui/vue'
import CKEditor from '@ckeditor/ckeditor5-vue';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import Layout from '@/Pages/Admin/Dashboard.vue';

export default {
layout: Layout,
data() {
        return {
            editor: ClassicEditor
        }
    },
    setup() {
        const enabled = ref(0)
        const discount = useForm({
            name: null,
            desc: null,
            discount_percent: null,
            active: false
        })
        return {
            discount, enabled
        }
    },

    methods: {
        discountStore() {
            this.discount.post(route('product-discounts.store'));
        }
    },

    components: {ckeditor: CKEditor.component, Switch,Layout}
}
</script>
