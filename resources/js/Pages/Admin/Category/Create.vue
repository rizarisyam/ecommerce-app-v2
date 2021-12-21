<template>
    <form @submit.prevent="categoryPost">
        <div>
            <label for=""></label>
            <input type="text" v-model="form.name">
        </div>
         <div>
            <label for=""></label>
            <textarea v-model="form.desc"></textarea>
        </div>
         <div>
          <button type="submit">Submit</button>
        </div>
    </form>
</template>

<script>
import {useForm} from '@inertiajs/inertia-vue3';
import Layout from '@/Pages/Admin/Dashboard.vue';

export default {
    layout: Layout,
    props: {
        errors: Object
    },
    setup() {
        const form = useForm({
            name: null,
            desc: null
        })

        return {form}
    },
    methods: {
        categoryPost() {
            this.form.post(route('product-categories.store'))
        }
    },
    components: {Layout}
}
</script>
