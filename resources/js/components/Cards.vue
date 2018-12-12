<template>
    <div>
        <h2>Cards</h2>
        <div class="row">

            <span>{{ getCardsTotalValueSum }}</span>
            <span>{{ getCardsMaxTotalValue }}</span>
            <button v-on:click="reduceTotalValue(5)">sdsd</button>
            <div class="col-3" v-for="card in cards">
                <span>{{card.name}}</span>
                <span>{{card.last_number}}</span>
                <span>{{card.total_value}}</span>
            </div>
        </div>
    </div>
</template>

<script>
    import {mapGetters, mapActions} from 'vuex';

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
            ...mapActions(['reduceTotalValue'])
        },
        mounted()
        {
            // axios.get('https://api.coindesk.com/v1/bpi/currentprice.json')
            //     .then(response => {
            //         this.info = response.data.bpi
            //     })
            //     .catch(error => {
            //         console.log(error);
            //         this.errored = true
            //     })
            //     .finally(() => this.loading = false)
        }
    }
</script>

