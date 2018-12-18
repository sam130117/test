<template>
    <tr>
        <td>
            <div class="form-group mb-0">
                <span v-model="card.name" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ card.name }}</span>
                <input class="form-control" v-bind:class="{'is-invalid': this.errors[`cards.${card.id}.name`] ? true : false}" type="text" v-model="card.name" v-else/>
                <strong class="invalid-feedback">{{this.errors[`cards.${card.id}.name`] ? this.errors[`cards.${card.id}.name`][0] : ''}}</strong>
            </div>
        </td>
        <td>
            <div class="form-group mb-0">
                <span v-model="card.last_number" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ card.last_number }}</span>
                <input class="form-control" v-bind:class="{'is-invalid': false}" type="text" v-model="card.last_number" v-else/>
                <!--<strong class="invalid-feedback">{{errors.cards[card.id] && errors.cards[card.id].last_number ? errors.cards[card.id].last_number[0] : ''}}</strong>-->
            </div>
        </td>
        <td>
            <div class="form-group mb-0">
                <span v-model="card.total_value" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ totalValueMoneyFormat }}</span>
                <input class="form-control" v-bind:class="{'is-invalid': false}" type="number" v-model="card.total_value" v-else/>
                <!--<strong class="invalid-feedback">{{errors.cards[card.id] && errors.cards[card.id].total_value ? errors.cards[card.id].total_value[0] : ''}}</strong>-->
            </div>
        </td>
        <td>
            <div class="form-group mb-0">
                <span v-model="card.card_type" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ card.card_type }}</span>
                <select class="form-control" v-bind:class="{'is-invalid': false}" v-model="card.card_type" v-else>
                    <option value="">Select Card Type</option>
                    <option v-for="cardType in cardTypes">
                        {{ cardType }}
                    </option>
                </select>
                <!--<strong class="invalid-feedback">{{errors.cards[card.id] && errors.cards[card.id].card_type ? errors.cards[card.id].card_type[0] : ''}}</strong>-->
            </div>
        </td>
        <td>
            <div class="form-group mb-0">
                <span v-model="card.close_date" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ card.close_date }}</span>
                <input class="form-control" v-bind:class="{'is-invalid': false}" type="date" v-model="card.close_date" v-else/>
                <!--<strong class="invalid-feedback">{{errors.cards[card.id] && errors.cards[card.id].close_date ? errors.cards[card.id].close_date[0] : ''}}</strong>-->
            </div>
        </td>
        <td>
            <span class="btn fa fa-trash float-right mb-2 mx-1" v-on:click="deleteCard"></span>
        </td>
    </tr>
</template>

<script>
    import {commonConstants} from "../../constants/index"

    export default {
        name    : "CardsTableItem",
        props   : {
            card  : {
                type   : Object,
                default: {}
            },
            errors: {
                type   : Object,
                default: {}
            },
            mode  : {
                type: String,
            }
        },
        data    : () => {
            return {
                cardTypes      : [],
                commonConstants: commonConstants,
            }
        },
        computed: {
            totalValueMoneyFormat()
            {
                return accounting.formatMoney(this.card.total_value);
            },
        },
        methods : {
            deleteCard()
            {
                console.log('delete');
            }
        },
        created(){
            this.errors = this.$props.errors;
        }
    }
</script>

<style scoped>

</style>
