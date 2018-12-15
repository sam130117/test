<template>
    <div>
        <h2>Card Details <span class="badge badge-light float-right mode-area" v-on:click="changeMode">Edit</span></h2>
        <table class="table table-bordered">
            <tbody>
            <tr>
                <th width="30%">Name</th>
                <td>
                    <span v-model="card.name" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.name }}</span>
                    <input class="form-control" type="text" v-model="card.name" v-else/>
                </td>
            </tr>
            <tr>
                <th>Last Number</th>
                <td>
                    <span v-model="card.last_number" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.last_number }}</span>
                    <input class="form-control" type="text" v-model="card.last_number" v-else/>
                </td>
            </tr>
            <tr>
                <th>Total Value</th>
                <td>
                    <span v-model="card.total_value" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.total_value }}</span>
                    <input class="form-control" type="text" v-model="card.total_value" v-else/>
                </td>
            </tr>
            <tr>
                <th>Card Type</th>
                <td>
                    <span v-model="card.card_type" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.card_type }}</span>
                    <input class="form-control" type="text" v-model="card.card_type" v-else/>
                </td>
            </tr>
            <tr>
                <th>Close Date</th>
                <td>
                    <span v-model="card.close_date" v-if="this.mode === this.cardConstants.GENERAL_MODE">{{ card.close_date }}</span>
                    <input class="form-control" type="text" v-model="card.close_date" v-else/>
                </td>
            </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
    import {cardConstants} from '../constants/index';

    export default {
        name   : "Card",
        data   : () => {
            return {
                cardConstants: cardConstants,
                mode         : cardConstants.GENERAL_MODE,
                card         : {},
            }
        },
        mounted()
        {
            let id = this.$route.params.cardId;
            axios.get(`/storage/cards/${id}`)
                .then((response) => {
                    if (response.status === 200)
                        this.card = response.data.card;
                })
                .catch((error) => {
                    console.error(error);
                });
        },
        methods: {
            changeMode()
            {
                this.mode = this.mode === cardConstants.GENERAL_MODE ? cardConstants.EDIT_MODE : cardConstants.GENERAL_MODE;
            }
        }
    }
</script>

<style scoped>

</style>
