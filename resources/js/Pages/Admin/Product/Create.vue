<template>
    <form @submit.prevent="productStore">
        <div>
            <label for="">Name</label>
            <input type="text" v-model="form.name">
        </div>

        <div>
            <label for="">Desc</label>
           <textarea name="" id="" cols="30" rows="10" v-model="form.desc"></textarea>
        </div>

         <div>
            <label for="">SKU</label>
           <textarea name="" id="" cols="30" rows="10" v-model="form.SKU"></textarea>
        </div>

         <div>
            <label for="">Category Product</label>
            <select name="" id=""  v-model="form.category_id">
                <option v-for="row in categories" :key="row.id" :value="row.id" >{{ row.name }}</option>
            </select>
        </div>

        <div>
            <label for="">Discount Product</label>
            <select name="" id="" v-model="form.discount_id">
                <option  v-for="row in discounts" :key="row.id" :value="row.id">{{ row.name }}</option>
            </select>
        </div>

         <div>
            <label for="">Inventory</label>
            <input type="text" v-model="form.quantity">
        </div>

         <div>
            <label for="">Price</label>
            <input type="text" v-model="form.price">
        </div>

        <div>
            <button type="submit">Submit</button>
        </div>
    </form>

    <div v-if="errors">
        {{errors}}
    </div>
</template>

<script>
import { useForm } from '@inertiajs/inertia-vue3';

export default {
    props: {
        categories: Object,
        discounts: Object,
        errors: Object
    },
    setup() {
        const form = useForm({
            name: null,
            desc: null,
            SKU: null,
            category_id: null,
            quantity: 0,
            price: 0,
            discount_id: null
        })

        return {form}
    },
    methods: {
        productStore() {
            this.form.post(route('products.store'));
        }
    }
}
</script>
