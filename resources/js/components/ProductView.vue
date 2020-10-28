<template>
    <div class="container" v-if="isHidden"> 
        <h3 class="text-center text-uppercase">{{ title() }}</h3>
        <div class="row my-5">
            <div class="col-md-6">
                <img :src="products.prodImage" class="list-image">
            </div>
            <div class="col-md-6">
                <div class="view-item">
                    <div class="d-flex">
                        <p>Quantity </p>
                        <div class="input-group w-25">
                            <p @click="decrement(); totalPrice()" :count="temp.product_quantity">-</p>
                            <input type="text" class="form-control text-center" v-model="temp.product_quantity" aria-describedby="basic-addon1">
                            <p @click="increment(); totalPrice()" :count="temp.product_quantity">+</p>
                        </div>
                    </div>
                    
                    <p>RM{{ roundPrice() }}</p>
                    <button class="btn btn-primary btn-lg" @click.prevent="createCart()">
                        Add to Cart
                    </button> 
                
                    <hr/>
                    
                    <p>Description</p>
                    <ul v-for="desc in products.prodDescription" :key="desc.prodDescription">
                        <li>{{ desc }}</li>
                    </ul>
                </div>
            </div>
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
                    prodQuantity: 0,
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
