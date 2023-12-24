<template>
    <v-app>
        <v-layout>
            <v-container>
                <v-container v-if="!isBuy" class="con">
                    <v-row>
                        <v-col cols="3" md="1" style="display: flex; justify-content: center">
                            <v-img width="120px" class="logo" :src="logo"></v-img>
                        </v-col>
                    </v-row>
                    <v-row justify="center" style="display: flex; justify-content: center">

                        <v-col cols="12" md="6">
                            <v-row>
                                <v-col cols="12" md="12">
                                    <swiper :style="{
                                        '--swiper-navigation-color': '#fff',
                                        '--swiper-pagination-color': '#fff',
                                    }" :spaceBetween="10" :navigation="true" :thumbs="{ swiper: thumbsSwiper }"
                                        :modules="modules" class="mySwiper2">
                                        <swiper-slide v-for="item in optionActive.image" :key="item.name">
                                            <v-img :src="item"></v-img>
                                        </swiper-slide>
                                    </swiper>
                                </v-col>
                                <v-col cols="12" md="12">
                                    <swiper @swiper="setThumbsSwiper" :spaceBetween="10" :slidesPerView="4" :freeMode="true"
                                        :watchSlidesProgress="true" :modules="modules" class="mySwiper">
                                        <swiper-slide v-for="item in optionActive.image" :key="item.name">
                                            <v-img style="cursor: pointer" :src="item"></v-img>
                                        </swiper-slide>
                                    </swiper>
                                </v-col>
                            </v-row>

                        </v-col>




                        <v-col cols="12" md="6">
                            <div class="rating" style="display: flex; align-content: center; ">
                                <span style="font-size: 12px; margin-top: 3px">Rated</span>
                                <v-rating v-model="rating" disabled density="compact" color="white"
                                    active-color="yellow-accent-4" size="15"></v-rating>
                                <span style="font-size: 12px;">({{ rating }})</span>
                            </div>
                            <h3>{{ product.name }}</h3>
                            <div class="sale" style="display: flex;">
                                <span
                                    style="text-decoration: line-through; color: gray; font-size: 1.3em;  padding: 0 10px; align-self:center">{{
                                        product.price
                                    }} £</span>
                                <span style="color: green; font-size: 1.3em;  padding: 0 10px; align-self:center">{{
                                    product.sale_price }}
                                    £</span>
                                <span
                                    style="color: #fff; font-size: 1.3em;  padding: 5px 10px; background: #fb5607; border-radius: 10px; align-self:center">
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
                                <v-row align="center">
                                    <v-col cols="12" md="12" class="d-flex justify-content-between"
                                        style="justify-content: space-between">
                                        <v-btn class="my-2" density="default" @click="() => changeOptionActive(item)"
                                            v-for="item in product.options" :key="item.name"
                                            :class="optionActive.name == item.name ? 'active' : ''">
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
                    <v-divider class="my-4"></v-divider>
                    <v-container>
                        <v-row class="pe-3">
                            <v-col md="6" cols="12">
                                <h1 class="a-size-base-plus a-text-bold"> Description </h1>
                            </v-col>
                            <v-col md="6" cols="12">
                                <div id="featurebullets_feature_div" class="celwidget" data-feature-name="featurebullets"
                                    data-csa-c-type="widget" data-csa-c-content-id="featurebullets"
                                    data-csa-c-slot-id="featurebullets_feature_div" data-csa-c-asin="B09KHBBCKW"
                                    data-csa-c-is-in-initial-active-row="false" data-csa-c-id="pdl04t-hy8lce-v9kdnu-mm1j2a"
                                    data-cel-widget="featurebullets_feature_div">
                                    <div id="feature-bullets" class="a-section a-spacing-medium a-spacing-top-small">
                                        <h1 class="a-size-base-plus a-text-bold"> About this item </h1>
                                        <ul class="a-unordered-list a-vertical a-spacing-mini">
                                            <li class="a-spacing-mini"><span class="a-list-item"> Sturdy Die-Cast
                                                    Aluminum Body:
                                                    The reinforced die-cast aluminum construction of this kitchen pots
                                                    and pans
                                                    set ensures durability and reliability for long-term use while still
                                                    maintaining a lightweight design. This lightweight feature brings
                                                    convenience to your cooking experience. </span></li>
                                            <li class="a-spacing-mini"><span class="a-list-item"> CAROTE 10-Piece
                                                    Cookware Set
                                                    Includes :9.5 inch Frying Pan, 11 inch Frying Pan, 2.4 QT Saucepan
                                                    with Lid
                                                    and steamer, 4.3QT Casserole Pot with Lid, 4.5QT Saute Pan with Lid,
                                                    White
                                                    Silicone Turner. Our favorite non stick pots and pans set meets all
                                                    your
                                                    need for every day cooking </span></li>
                                            <li class="a-spacing-mini"><span class="a-list-item"> Eco-friendly White
                                                    Granite – A
                                                    top level, harder nonstick granite material with 10x Ultra Non-stick
                                                    performance,SGS &amp; EUROFIN approved, PFOS/PFOA free, our cookware
                                                    ensures
                                                    your daily cooking is always safer and healthier. </span></li>
                                            <li class="a-spacing-mini"><span class="a-list-item"> Easy To Clean – Just
                                                    wipe it
                                                    with a paper towel or rinse it with water, Less CO2 emission and
                                                    Less water
                                                    wasted.Recommend hand wash the cookware as it is really easy to
                                                    clean.
                                                </span></li>
                                            <li class="a-spacing-mini"><span class="a-list-item"> Suitable For All
                                                    Stoves –
                                                    Heats up quickly and evenly with extended bottom design. High
                                                    magnetic
                                                    conductive stainless steel base allows our nonstick cookware to work
                                                    on all
                                                    cooktops, including induction. </span></li>
                                            <li class="a-spacing-mini"><span class="a-list-item"> Service &amp;
                                                    Guarantee – Each
                                                    CAROTE cookware passes strict multi inspection process.In case you
                                                    received
                                                    defect items caused by delivery, please don't hesitate to reach out,
                                                    thanks.
                                                    You will be guaranteed to get 100% refund or a new replacement.
                                                </span></li>
                                        </ul> <!-- Loading EDP related metadata -->
                                    </div>
                                </div>
                            </v-col>
                        </v-row>
                        <v-divider class="my-4"></v-divider>
                        <v-row class="pe-3">
                            <v-col md="6" cols="12">
                                <h1 class="a-size-base-plus a-text-bold"> Review </h1>
                            </v-col>
                            <v-col md="6" cols="12">
                                <div v-for="review in reviews" :key="review.id" class="mt-2">
                                    <v-avatar color="surface-variant">{{ review.initials }}</v-avatar>
                                    <span style="margin-left: 10px">{{ review.name }}</span>
                                    <p>
                                        <v-rating disabled v-model="review.rating" density="compact" color="white"
                                            active-color="yellow-accent-4" size="15"></v-rating>
                                    </p>
                                    <p>
                                        {{ review.createdAt }}
                                    </p>
                                    <p>
                                        {{ review.content }}
                                    </p>
                                </div>

                            </v-col>

                        </v-row>
                    </v-container>


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
import { Swiper, SwiperSlide } from 'swiper/vue';
import 'swiper/css';
import 'swiper/css/free-mode';
import 'swiper/css/navigation';
import 'swiper/css/thumbs';

import { FreeMode, Navigation, Thumbs } from 'swiper/modules';
export default {
    data() {
        return {
            logo: 'https://i.ibb.co/rd9GjSq/logo-removebg-preview.png',
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
                            'https://m.media-amazon.com/images/I/714tSUgJElL._AC_SX425_.jpg',
                            'https://m.media-amazon.com/images/I/71UR3jPdDKL._AC_SX425_.jpg',

                            'https://m.media-amazon.com/images/I/71+3MYsW3XL._AC_SX425_.jpg',
                            'https://m.media-amazon.com/images/I/71jq1KRcbVL._AC_SX425_.jpg'

                        ]
                    },
                    {
                        name: '11 price',
                        image: [
                            'https://m.media-amazon.com/images/I/717QS+5nIeL._AC_SX522_.jpg',
                            'https://m.media-amazon.com/images/I/71jq1KRcbVL._AC_SX425_.jpg',
                            'https://m.media-amazon.com/images/I/71+3MYsW3XL._AC_SX425_.jpg',
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
            snackbarColor: 'green',
            thumbsSwiper: null,
            modules: [Navigation, Thumbs, FreeMode],
            reviews: [
                {
                    id: 1,
                    name: '	jose navarrete',
                    initials: 'JN',
                    avatar: 'https://cdn.bettamax.com/dev/2023-08-22/Amelia.png',
                    content: `The CAROTE 10-Piece Pots and Pans Set is a true game-changer in the world of cookware. Not only does it deliver exceptional performance in the kitchen, but it also prioritizes your health and the environment.The standout feature of this cookware set is its eco- friendly classic granite material.It's not just non-stick; it's also SGS and EUROFIN approved, ensuring that it's free from harmful substances like PFOS and PFOA. With this set, you can cook with confidence, knowing that your daily culinary creations are both safe and healthy.`,
                    rating: 5,
                    createdAt: 'Reviewed in the United States on October 16, 2023'
                },
                {
                    id: '2',
                    name: 'Michael R.',
                    initials: 'MR',
                    avatar: 'https://cdn.bettamax.com/dev/2023-08-22/Amelia.png',
                    content: `I recently invested in the CAROTE Nonstick Cookware Set, and I am delighted to share my positive experience with this kitchen gem. From its stylish design to its exceptional performance, this cookware set has truly exceeded my expectations. The nonstick coating on these pots and pans is a game-changer. Cooking and cleanup have become an absolute breeze. Whether it's eggs, stir-fries, or delicate sauces, the food effortlessly glides off the surface, leaving me with minimal mess and a stack of spotless cookware. Also, the build quality is outstanding. The pots and pans feel substantial and well-crafted, providing even heat distribution for consistent cooking results. I appreciate the sturdy construction without the excessive weight, making them a joy to handle in the kitchen. The versatility of this cookware set is another highlight. From stovetop to oven, these pots and pans can handle a variety of cooking methods with ease. The lids fit securely, locking in flavors and moisture, whether I'm simmering a stew or sautéing vegetables. Overall, the set has truly elevated my cooking experience.`,
                    createdAt: 'Reviewed in the United States on July 8, 2023',
                    rating: 5,
                },

            ]
        }
    },
    components: {
        Swiper,
        SwiperSlide,
    },

    methods: {
        setThumbsSwiper(swiper) {
            this.thumbsSwiper = swiper
        },
        onSwiper(swiper) {
        },
        onSlideChange() {
        },
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
body {
    font-family: 'Poppins', sans-serif;
}

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

.swiper-button-prev,
.swiper-button-next {
    color: #007aff;
}

button.active {
    background: #FBC507 !important;
    color: #000 !important;
}

.v-responsive.v-img {
    border-radius: 7px;
}

ul li {
    list-style: disc;
    margin-bottom: 4px;
    font-size: 14px;
}


@media only screen and (min-width: 1200px) {
    .con {
        padding: 0 15%;
    }
}
</style>
