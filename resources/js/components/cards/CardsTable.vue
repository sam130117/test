<template>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th width="25%">Name</th>
            <th width="12%">Last Number</th>
            <th>Total Value</th>
            <th width="12%">Card Type</th>
            <th width="14%">Close Date</th>
            <th width="60px"></th>
        </tr>
        </thead>
        <tbody>
        <cards-table-item :key="card.id" :card="card" :mode="mode" :errors="errors" v-for="card in cards"></cards-table-item>
        </tbody>
    </table>
</template>

<script>
    import CardsTableItem from '../cards/CardsTableItem';

    export default {
        name      : "Card",
        props     : {
            cards : {
                type   : Array,
                default: []
            },
            errors: {
                type   : Object,
                default: {}
            },
            mode  : {
                type: String,
            }
        },
        components: {
            CardsTableItem
        }
    }
</script>

<style scoped>

</style>
