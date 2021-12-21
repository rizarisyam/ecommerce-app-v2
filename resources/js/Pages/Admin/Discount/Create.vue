<template>
    <form @submit.prevent="discountStore">
        <div>
            <label for=""></label>
            <input type="text" v-model="form.name">
        </div>

        <div>
            <label for=""></label>
            <textarea name="" id="" cols="30" rows="10" v-model="form.desc"></textarea>
        </div>

        <div>
            <label for=""></label>
            <input type="text" v-model="form.discount_percent">
        </div>

        <div>
            <label for="checkbox">{{ form.active }}</label>
            <input type="checkbox" v-model="form.active">
        </div>
        <div>
           <button type="submit">Submit</button>
        </div>
    </form>
</template>

<script>
import {useForm} from '@inertiajs/inertia-vue3';
export default {
    setup() {
        const form = useForm({
            name: null,
            desc: null,
            discount_percent: null,
            active: 0,
        })
        return {
            form
        }
    },

    methods: {
        discountStore() {
            this.form.post(route('product-discounts.store'));
        }
    }
}
</script>
