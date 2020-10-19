<template>
    <div class="container" v-if="isHidden">
        <div class="row">
            <div class="col-md-8">
                <img :src="products.prodImage" width="200px" height="200px" alt="">
                <h2>{{ title() }}</h2>
            </div>
            <div class="col-md-8">
                <p>RM {{ roundPrice() }}</p>
                <li v-for="description in products.prodDescription" :key="description.prodDescription">
                    {{ description }}
                </li> 
            </div>
        </div>
        <div class="row">
            <button @click="decrement()" :count="temp.product_quantity">-</button>
                {{ temp.product_quantity }}
            <button @click="increment()" :count="temp.product_quantity">+</button>
        </div>
        <div class="row">
              <button class="btn btn-primary" @click.prevent="createCart(); totalPrice()">
                Add to Cart
            </button> 
            {{ message }}
        </div>
    </div>
</template>

<script>

    import {bus} from '../app';

    export default {
        props: {
            isHidden: {
                type: Boolean
            }
        },
        data() {
            return {
                products: {
                    prodId: '',
                    prodName: '',
                    prodBrand: '',
                    prodDescription: [],
                    prodPrice: 0,
                    prodproduct_quantity: 0,
                    prodImage: ''
                },
                temp: {
                    product_id: '', 
                    product_name: '',
                    product_brand: '',
                    product_price: 0,
                    product_quantity: 1
                },
                message: ''
            }
        },
        methods: {
            title() {
                return this.products.prodBrand + " " + this.products.prodName
            },
            roundPrice() {
                return this.products.prodPrice.toFixed(2);
            },
            toggleView() {
                if (this.isHidden == false) {
                    this.isHidden = true 
                }
                else if (this.isHidden == true){
                    this.isHidden = false
                }
            },
            increment() {
                return this.temp.product_quantity++;
            },
            decrement() {
                if(this.temp.product_quantity == 1) {
                    return this.temp.product_quantity = 1;
                }
                else {
                    return this.temp.product_quantity--;
                }
            },
            createCart: function createCart() {
                var input = this.temp;
                axios.post('/storeCart', input);
                this.message = "Successfully added to cart";
            },
            totalPrice() {
                this.temp.product_price = this.products.prodPrice * this.temp.product_quantity
            }
        },

        computed: {
        },

        mounted() {
            bus.$on('sending_data', (data) => {
                this.products = data;
                this.temp.product_id = data.prodId;
                this.temp.product_name = data.prodName;
                this.temp.product_brand = data.prodBrand;
            }),
            bus.$on('hide', (hidden) => {
                this.isHidden = hidden;
            }),
            bus.$on('list_hide', (list) => {
                this.isHidden = list;
            })
        },

        created() {
            
        }
    }
</script>
