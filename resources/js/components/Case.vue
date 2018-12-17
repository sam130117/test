<template>
    <div class="container">
        <card v-bind:key="card.id" v-bind:card="card" v-for="card in cards"></card>
    </div>
</template>

<script>
    import Card from './Card';

    export default {
        name      : "Case",
        components: {Card},
        data      : () => {
            return {
                case  : {},
                errors: {},
            }
        },
        computed  : {
            cards()
            {
                return this.case.cards;
            }
        },
        methods   : {
            getCase()
            {
                let id = this.$route.params.caseId;
                axios.get(`/storage/cases/${id}`)
                    .then((response) => {
                        if (response.status === 200) {
                            this.case = response.data.case;
                        }
                    })
                    .catch((error) => console.error(error));
            }
        },
        mounted()
        {
            this.getCase();
        }
    }
</script>

<style scoped>

</style>
