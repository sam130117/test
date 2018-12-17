<template>
    <div>
        <h4>Card #{{ card.id }}
            <span class="badge badge-light float-right mode-area" v-on:click="changeMode">Edit</span>
        </h4>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="30%">Name</th>
                <td>
                    <div class="form-group mb-0">
                        <span v-model="card.name" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.name }}</span>
                        <input class="form-control" v-bind:class="{'is-invalid': this.errors.name}" type="text" v-model="card.name" v-else/>
                        <strong class="invalid-feedback">{{this.errors.name ? this.errors.name[0] : ''}}</strong>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Last Number</th>
                <td>
                    <div class="form-group mb-0">
                        <span v-model="card.last_number" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.last_number }}</span>
                        <input class="form-control" v-bind:class="{'is-invalid': this.errors.last_number}" type="text" v-model="card.last_number" v-else/>
                        <strong class="invalid-feedback">{{this.errors.last_number ? this.errors.last_number[0] : ''}}</strong>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Total Value</th>
                <td>
                    <div class="form-group mb-0">
                        <span v-model="card.total_value" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ totalValueMoneyFormat }}</span>
                        <input class="form-control" v-bind:class="{'is-invalid': this.errors.total_value}" type="number" v-model="card.total_value" v-else/>
                        <strong class="invalid-feedback">{{this.errors.total_value ? this.errors.total_value[0] : ''}}</strong>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Card Type</th>
                <td>
                    <div class="form-group mb-0">
                        <span v-model="card.card_type" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.card_type }}</span>
                        <select class="form-control" v-bind:class="{'is-invalid': this.errors.card_type}" v-model="card.card_type" v-else>
                            <option value="">Select Card Type</option>
                            <option v-for="cardType in cardTypes">
                                {{ cardType }}
                            </option>
                        </select>
                        <strong class="invalid-feedback">{{this.errors.card_type ? this.errors.card_type[0] : ''}}</strong>
                    </div>
                </td>
            </tr>
            <tr>
                <th>Close Date</th>
                <td>
                    <div class="form-group mb-0">
                        <span v-model="card.close_date" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.close_date }}</span>
                        <input class="form-control" v-bind:class="{'is-invalid': this.errors.close_date}" type="date" v-model="card.close_date" v-else/>
                        <strong class="invalid-feedback">{{this.errors.close_date ? this.errors.close_date[0] : ''}}</strong>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="clearfix" v-if="this.mode === this.cardConstants.EDIT_MODE">
            <button class="btn btn-success btn float-right" v-on:click="save"> Save</button>
        </div>
    </div>
</template>

<script>
    import {cardConstants} from '../constants/index';

    export default {
        name    : "Card",
        props   : {
            card: {
                type   : Object,
                default: {}
            },
        },
        data    : () => {
            return {
                cardConstants: cardConstants,
                mode         : cardConstants.GENERAL_MODE,
                errors       : {},
                cardTypes    : [],
            }
        },
        computed: {
            totalValueMoneyFormat()
            {
                return accounting.formatMoney(this.card.total_value);
            },
        },
        methods : {
            changeMode()
            {
                this.mode = (this.mode === cardConstants.GENERAL_MODE) ? cardConstants.EDIT_MODE : cardConstants.GENERAL_MODE;
            },
            save()
            {
                axios.put(`/storage/cards/${this.card().id}`, this.card)
                    .then((response) => {
                        if (response.status === 200)
                            this.card = response.data.card;
                        this.changeMode();
                    })
                    .catch((error) => {
                        if (error.response)
                            this.errors = error.response.data.errors;
                        console.error(error);
                    });
            }
        }
    }
</script>

<style scoped>

</style>
