<template>
    <v-app>
        <v-layout>
            <v-container>
                <v-container v-if="!isBuy">
                    <v-row justify="center">
                        <v-col cols="2" md="1" style="display: flex; justify-content: center">
                            <v-img class="logo" :src="logo"></v-img>
                        </v-col>
                    </v-row>
                    <v-row justify="center" style="display: flex; justify-content: center">
                        <v-col cols="12" md="6">
                            <v-carousel hide-delimiters>
                                <v-carousel-item v-for="item in optionActive.image" :src="item" :key="item"
                                    cover></v-carousel-item>
                            </v-carousel>
                            <v-row class="my-2">
                                <v-col style="cursor: pointer" md="3" v-for="item in optionActive.image" :key="item.name">
                                    <v-img :src="item"></v-img>
                                </v-col>
                            </v-row>
                        </v-col>
                        <v-col cols="12" md="6">
                            <div class="rating" style="display: flex; align-content: center; ">
                                <span style="font-size: 12px; margin-top: 3px">Rated</span>
                                <v-rating v-model="rating" density="compact" color="white" active-color="yellow-accent-4"
                                    size="15"></v-rating>
                                <span style="font-size: 12px;">({{ rating }})</span>
                            </div>
                            <h3>{{ product.name }}</h3>
                            <div class="sale" style="display: flex;">
                                <span
                                    style="text-decoration: line-through; color: gray; font-size: 22px;  padding: 0 10px">{{
                                        product.price
                                    }} £</span>
                                <span style="color: green; font-size: 22px;  padding: 0 10px">{{ product.sale_price }}
                                    £</span>
                                <span
                                    style="color: #fff; font-size: 22px;  padding: 0 10px; background: #fb5607; border-radius: 10px">
                                    {{ 'Save ' + product.sale_text }}</span>
                            </div>
                            <v-divider class="my-4"></v-divider>
                            <div class="description" v-html="description"></div>
                            <div class="sale-ending my-2">
                                <p x>Sale ending in</p>
                                <v-progress-linear class="my-1" color="grey-lighten-1" rounded model-value="20"
                                    :height="8"></v-progress-linear>
                                <b style="color: #c3392f">Hurry up. This deal will end soon!!</b>
                            </div>
                            <div class="options my-2">
                                <h4 class="my-2">Option(Buy 1 Get 1 Free)
                                </h4>
                                <v-row justify="center" align="center">
                                    <v-col md="4" v-for="item in product.options" :key="item.name">
                                        <v-btn density="default" @click="() => changeOptionActive(item)">
                                            {{ item.name }}
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </div>
                            <div class="quantity mt-1">
                                <v-row>
                                    <v-col md="4">
                                        <v-text-field density="compact" v-model="counter" variant="solo"
                                            append-inner-icon="mdi-plus" type="number" prepend-inner-icon="mdi-minus"
                                            outlined @click:prepend-inner="() => { counter-- }"
                                            @click:append-inner="() => { counter++ }">
                                        </v-text-field>
                                    </v-col>
                                    <v-col md="4">
                                        <v-btn class="pa-3" color="orange-darken-4" dark prepend-icon="mdi-card"
                                            bgcolor="#fb5607" size="large" @click="() => isBuy = true">
                                            <b>Buy it now</b>
                                        </v-btn>
                                    </v-col>
                                </v-row>

                            </div>
                            <div>
                                <v-img src="https://cdn.bettamax.com/dev/2023-08-22/safe-checkout.png"></v-img>
                            </div>
                        </v-col>
                    </v-row>
                </v-container>
                <v-container v-else>
                    <v-row>

                        <v-col md="6" cols="12">
                            <v-row>
                                <v-col md="3" cols="12">
                                    <v-img src="https://m.media-amazon.com/images/I/71wGpsLN4ZL._AC_SX522_.jpg" thumbnails>
                                        <span class="counter">{{ counter }}</span>
                                    </v-img>
                                </v-col>
                                <v-col md="9" cols="12">
                                    <p>{{ product.name }}</p>
                                    <b>19.99 £</b>
                                </v-col>
                            </v-row>
                            <v-row justify="space-between">
                                <v-col md="8">
                                    <v-text-field variant="solo" density="compact" label="Discount code"></v-text-field>
                                </v-col>
                                <v-col md="4" style="text-align: right">
                                    <v-btn>Apply</v-btn>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="8">
                                    <p>
                                        <b>Subtotal</b>
                                    </p>
                                </v-col>
                                <v-col md="4">
                                    <p style="text-align: right">
                                        <b>{{ Total.toFixed(2) }} £</b>
                                    </p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="8">
                                    <p>Shipping</p>
                                </v-col>
                                <v-col md="4">
                                    <p style="text-align: right">Enter shipping address</p>
                                </v-col>
                            </v-row>
                            <v-row>
                                <v-col md="8">
                                    <p>
                                        <b>Total</b>
                                    </p>
                                </v-col>
                                <v-col md="4">
                                    <p style="text-align: right">
                                        <b>{{ Total.toFixed(2) }} £</b>
                                    </p>
                                </v-col>
                            </v-row>
                        </v-col>
                        <v-col md="6" cols="12">
                            <v-form @submit.prevent="submit" ref="form">
                                <v-text-field variant="solo" v-model="form.email" label="E-mail"
                                    :rules="[v => !!v || 'E-mail is required', v => /.+@.+\..+/.test(v) || 'E-mail must be valid']"></v-text-field>
                                <h4 class="my-2">Delivery</h4>
                                <v-select v-model="form.country" label="Country Region" variant="solo" size="medium"
                                    :rules="[v => !!v || 'Country is required']" :items="countryRegion">
                                </v-select>
                                <v-row>
                                    <v-col md="6">
                                        <v-text-field v-model="form.first_name" variant="solo"
                                            :rules="[v => !!v || 'First name is required']"
                                            label="First Name"></v-text-field>
                                    </v-col>
                                    <v-col md="6">
                                        <v-text-field v-model="form.last_name" variant="solo"
                                            :rules="[v => !!v || 'Last name is required']" label="Last Name"></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-text-field v-model="form.address" variant="solo" label="Address"></v-text-field>
                                <v-row>
                                    <v-col md="6">
                                        <v-text-field v-model="form.city" variant="solo" label="City"
                                            :rules="[v => !!v || 'City is required']"></v-text-field>
                                    </v-col>
                                    <v-col md="6">
                                        <v-text-field v-model="form.postal_code" variant="solo"
                                            :rules="[v => !!v || 'Postal code is required']"
                                            label="Postal code"></v-text-field>
                                    </v-col>
                                </v-row>
                                <v-text-field v-model="form.phone_number" variant="solo"
                                    :rules="[v => !!v || 'Phone number is required']" label="Phone Number"></v-text-field>
                                <v-row style="flex-flow: column">
                                    <h4 class="my-2">Shipping method</h4>

                                    <div style="background: #EEE; padding: 1rem">
                                        Enter your shipping address to view shipping options.
                                    </div>
                                </v-row>

                                <v-row style="flex-flow: column">
                                    <h4 class="my-2">Payment</h4>
                                    <div>
                                        <p>All transaction are secure and encrypted</p>
                                    </div>
                                </v-row>

                                <!-- // Payment method -->
                                <v-row class="payment_method" style="background: #88bdf161;">
                                    <v-col md="6">
                                        <v-radio-group v-model="paymentMethod">
                                            <v-radio hidden-details label="Credit card" value="credit">
                                            </v-radio>
                                        </v-radio-group>
                                    </v-col>
                                </v-row>
                                <v-row>
                                    <v-col md="12">
                                        <v-text-field v-model="form.card_number" variant="solo"
                                            :rules="[v => !!v || 'Card number is required']"
                                            label="Card number"></v-text-field>
                                    </v-col>

                                    <!-- ngày hết hạn -->
                                </v-row>
                                <v-row>
                                    <v-col md="6">
                                        <v-text-field v-model="form.expiration_date" variant="solo"
                                            :rules="[v => !!v || 'Expiration date is required']"
                                            label="Expiration date"></v-text-field>
                                    </v-col>
                                    <v-col md="6">
                                        <v-text-field v-model="form.security_code" variant="solo"
                                            :rules="[v => !!v || 'Security code is required']"
                                            label="Security code"></v-text-field>
                                    </v-col>

                                </v-row>
                                <v-row>
                                    <v-col md="6">
                                        <v-btn class="pa-3" style="width: 100%" size="large" @click="() => isBuy = false">
                                            <b>Back</b>
                                        </v-btn>
                                    </v-col>
                                    <v-col md="6"><v-btn class="pa-3" color="orange-darken-4" dark prepend-icon="mdi-card"
                                            style="width: 100%" bgcolor="#fb5607" size="large" type="submit">
                                            <b>Buy it now</b>
                                        </v-btn>
                                    </v-col>
                                </v-row>
                            </v-form>
                        </v-col>
                    </v-row>
                </v-container>
            </v-container>
            <v-snackbar v-model="snackbar" :color="snackbarColor" timeout="5000">
                {{ snackbarText }}
            </v-snackbar>
        </v-layout>
    </v-app>
</template>

<script>
import CountryList from 'country-list';
import axios from 'axios';
export default {
    data() {
        return {
            logo: 'https://i.postimg.cc/G3P0C815/logo.jpg',
            rating: 5,
            description: `<p style="color: green">Currently unavailable.</p>
            <p>We don't know when or if this item will be back in stock.</p>
            `,
            counter: 1,
            isBuy: false,
            countryRegion: CountryList.getNames(),
            subToTal: 0,
            Total: 0,
            product: {
                name: 'Pots and Pans Set Nonstick, White Granite Induction Kitchen Cookware Sets, 10 Pcs Non Stick Cooking Set w/Frying Pans & Saucepans(PFOS, PFOA Free)',
                price: 99.99,
                sale_price: 19.99,
                sale_text: '80%',
                options: [
                    {
                        name: '10 price',
                        image: [
                            // 'https://m.media-amazon.com/images/I/71+3MYsW3XL._AC_SX425_.jpg',
                            'https://m.media-amazon.com/images/I/71UR3jPdDKL._AC_SX425_.jpg',

                            'https://m.media-amazon.com/images/I/71+3MYsW3XL._AC_SX425_.jpg',
                            'https://m.media-amazon.com/images/I/71jq1KRcbVL._AC_SX425_.jpg'

                        ]
                    },
                    {
                        name: '11 price',
                        image: [
                            'https://m.media-amazon.com/images/I/717QS+5nIeL._AC_SX522_.jpg',
                            'https://m.media-amazon.com/images/I/71jq1KRcbVL._AC_SX425_.jpg'
                        ]
                    },
                    {
                        name: '12 price',
                        image: [
                            'https://m.media-amazon.com/images/I/71vhfewgcGL._AC_SX425_.jpg',
                            'https://m.media-amazon.com/images/I/71jq1KRcbVL._AC_SX425_.jpg'
                        ]
                    }
                ]
            },
            form: {
                email: '',
                first_name: '',
                last_name: '',
                country: '',
                address: '',
                city: '',
                postalCode: '',
                phone_number: '',
                card_number: '',
                expiration_date: '',
                security_code: ''
            },
            paymentMethod: 'credit',
            optionActive: {},
            snackbar: false,
            snackbarText: '',
            snackbarColor: 'green'
        }
    },
    methods: {
        changeOptionActive(item) {
            this.optionActive = item
        },
        submit() {
            const isValid = this.$refs.form.validate()
            if (!isValid) return
            axios.post('/buy', this.form)
                .then(res => {
                    console.log(res)
                    this.snackbar = true
                    this.snackbarColor = 'green'
                    this.snackbarText = 'Buy success'
                    this.isBuy = false
                })
                .catch(err => {
                    console.log(err)
                    this.snackbarColor = 'red'
                    this.snackbar = true
                    this.snackbarText = 'Buy fail'
                })
        }
    },
    created() {
        this.optionActive = this.product.options[0]
        this.Total = this.product.sale_price * this.counter
    },
    watch: {
        counter(value) {
            this.Total = this.product.sale_price * value
        }
    }
}
</script>
<style>
.v-rating__item {
    font-size: 12px;
    font-weight: 600;
    color: #fff;
}

.options .v-btn {
    box-shadow: none !important;
    border: 1px solid #ccc !important;
}

.v-label--clickable {
    width: 100%;
}

.payment_method .v-input__details {
    display: none !important;
}

.counter {
    position: absolute;
    right: 0;
    background: #000;
    border-radius: 50%;
    color: #fff;
    width: 20px;
    height: 20px;
    text-align: center;
}
</style>