<template>
    <div class="container" v-if="!isHidden">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div v-for="(product, index) in products" :key="product.prodId" class="card">
                    <div class="card-header">
                        <a href="#" @click="isHidden=true; sendTrue(); sendData(index)">
                            {{ title(index) }}
                        </a>
                    </div>
                    <div class="card-body">
                        <a href="#" @click="isHidden=true; sendTrue(); sendData(index)">
                            <img :src="product.prodImage" width="100px" height="100px" alt="Photo">
                        </a>
                        <div>
                            Name: <a href="#" @click="isHidden=true; sendTrue(); sendData(index)">{{ product.prodName }}<br></a> 
                            Price: RM{{ roundPrice(index) }} <br>
                            Details: 
                            <li v-for="description in product.prodDescription" :key="description.prodDescription">
                                {{ description }}
                            </li> 
                        </div>      
                    </div>
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
                products: [
                    {
                        prodId: '121',
                        prodName: 'Gudetama Cup',
                        prodBrand: 'Sanrio',
                        prodDescription: ['Dimensions: 9.5cmHx8cmW/3.7"Hx3.1"W', 
                                    'Composition: 100% Stoneware'],
                        prodPrice: 10.00,
                        prodQuantity: 20,
                        prodImage: 'images/gudetama mug.jpg'
                    },
                    {
                        prodId: '122',
                        prodName: 'Hello Kitty Cup',
                        prodBrand: 'Sanrio',
                        prodDescription: ['Dimensions: 9.5cmHx8cmW/3.7"Hx3.1"W', 
                                    'Composition: 100% Stoneware'],
                        prodPrice: 15.00,
                        prodQuantity: 35,
                        prodImage: 'images/hello kitty mug.jpg'
                    },
                    {
                        prodId: '123',
                        prodName: 'Aggretsuko Cup',
                        prodBrand: 'Sanrio',
                        prodDescription: ['Dimensions: 9.5cmHx8cmW/3.7"Hx3.1"W', 
                                    'Composition: 100% Stoneware'],
                        prodPrice: 14.00,
                        prodQuantity: 12,
                        prodImage: 'images/aggretsuko mug.jpg'
                    },
                    {
                        prodId: '101',
                        prodName: 'Calathea Potted Plant',
                        prodBrand: 'IKEA',
                        prodDescription: ['Diameter of pot: 18cm', 
                                    'Height of plant: 50cm to 100cm'],
                        prodPrice: 23.60,
                        prodQuantity: 40,
                        prodImage: 'images/calathea potted plant.jpg'
                    },
                    {
                        prodId: '102',
                        prodName: 'Monstera Potted Plant',
                        prodBrand: 'IKEA',
                        prodDescription: ['Pot Size: Diameter(15cm), Height(12.5cm)', 
                                    'Plant Size: Height from pot base(60cm)'],
                        prodPrice: 27.60,
                        prodQuantity: 15,
                        prodImage: 'images/monstera potted plant.jpg'
                    },
                    {
                        prodId: '131',
                        prodName: 'Unicorn Memo Pad',
                        prodBrand: 'Meyoco',
                        prodDescription: ['Size: 7.2cm x 7.2cm', 
                                    'Page: 80pcs'],
                        prodPrice: 4.70,
                        prodQuantity: 26,
                        prodImage: 'images/unicorn-memo-pad.jpg'
                    },
                    {
                        prodId: '132',
                        prodName: 'Simple Memo Pad',
                        prodBrand: 'Basic Studio',
                        prodDescription: ['Size: 100mm x 100mm', 
                                    'Page: 50'],
                        prodPrice: 4.00,
                        prodQuantity: 35,
                        prodImage: 'images/lined memo pad.jpg'
                    }
                ]
            }
        },
        methods: {
            title(index) {
                return this.products[index].prodBrand + " " + this.products[index].prodName
            },
            sendData: function(index){
                const payload = {
                    prodId: this.products[index].prodId,
                    prodName: this.products[index].prodName,
                    prodBrand: this.products[index].prodBrand,
                    prodPrice: this.products[index].prodPrice,
                    prodImage: this.products[index].prodImage,
                    prodDescription: this.products[index].prodDescription,
                    prodQuantity: this.products[index].prodQuantity
                    
                }
                bus.$emit('sending_data', payload);
            },
            sendTrue() {
                bus.$emit('list_hide', true)
            },
            roundPrice(index) {
                return this.products[index].prodPrice.toFixed(2);
            }
        },

        computed: {
        },

        mounted() {
            bus.$on('hide', (hidden) => {
                this.isHidden = hidden;
            }) 
        }
    }
</script>
