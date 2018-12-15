<template>
    <div>
        <h2>Cards</h2>
        <!--<span>{{ getCardsTotalValueSum }}</span>- -->
        <!--<span>{{ getCardsMaxTotalValue }}</span>-->
        <!--<button v-on:click="reduceTotalValue(5)">sdsd</button>-->
        <div>
            <hr/>
            <div class="row">
                <div class="col-sm-3">
                    <input class="form-control" type="text" placeholder="Search...">
                </div>
            </div>
            <hr/>

            <div class="container">
                <div class="row">
                    <div class="col-sm-3 p-3 card" v-for="card in cards">
                        <router-link :to="{name: 'card', params: { cardId: card.id }}" class="card-link">
                            <h5 class="row">
                            <span class="col-sm-8">
                                <span>{{ card.name }}</span>
                            </span>
                                <span class="col-sm-4">
                                <span class="badge" v-bind:class="getColorClassesByType(card.card_type)">
                                    {{ card.card_type }}
                                </span>
                            </span>
                            </h5>
                        </router-link>
                        <hr/>
                        <p class="my-1">Last Number: {{ card.last_number }}</p>
                        <p class="my-1">Total Value: {{ card.total_value }}</p>
                        <p class="my-1">Close Date: {{ card.close_date }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';
    import {cardConstants}          from '../constants/index';

    export default {
        name    : "Cards",
        computed: {
            cards()
            {
                return this.$store.state.cards;
            },
            ...mapGetters(['getCardsTotalValueSum', 'getCardsMaxTotalValue'])
        },
        methods : {
            ...mapActions(['reduceTotalValue']),

            getColorClassesByType(type)
            {
                let classes = {};
                if (type === cardConstants.TYPE_CREDIT)
                    classes['badge-primary'] = true;
                else
                    classes['badge-success'] = true;
                return classes;
            }
        },
        mounted()
        {
            this.$store.dispatch('getCards');
        }
    }
</script>

