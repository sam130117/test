<template>
    <div class="container">
        <h4 class="mt-4">
            <span>Case</span>
            <template>
                <span class="btn fa fa-edit float-right" v-on:click="changeMode" v-if="this.mode === this.commonConstants.GENERAL_MODE"></span>
                <span class="btn fa fa-save float-right" v-on:click="save" v-else></span>
            </template>
        </h4>
        <div class="row">
            <div class="col-lg-3">
                <table class="table table-bordered">
                    <tbody>
                    <tr>
                        <th width="30%">Title</th>
                        <td>
                            <div class="form-group mb-0">
                                <span v-model="caseData.title" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ caseData.title }}</span>
                                <input class="form-control" v-bind:class="{'is-invalid': this.errors.title}" type="text" v-model="caseData.title" v-else/>
                                <strong class="invalid-feedback">{{this.errors.title ? this.errors.title[0] : ''}}</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Client Email</th>
                        <td>
                            <div class="form-group mb-0">
                                <span v-model="caseData.client_email" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ caseData.client_email }}</span>
                                <input class="form-control" v-bind:class="{'is-invalid': this.errors.client_email}" type="text" v-model="caseData.client_email" v-else/>
                                <strong class="invalid-feedback">{{this.errors.client_email ? this.errors.client_email[0] : ''}}</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Website</th>
                        <td>
                            <div class="form-group mb-0">
                                <span v-model="caseData.website" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ caseData.website }}</span>
                                <input class="form-control" v-bind:class="{'is-invalid': this.errors.website}" type="text" v-model="caseData.website" v-else/>
                                <strong class="invalid-feedback">{{this.errors.website ? this.errors.website[0] : ''}}</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Country</th>
                        <td>
                            <div class="form-group mb-0">
                                <span v-model="caseData.country" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ caseData.country }}</span>
                                <input class="form-control" v-bind:class="{'is-invalid': this.errors.country}" type="text" v-model="caseData.country" v-else/>
                                <strong class="invalid-feedback">{{this.errors.country ? this.errors.country[0] : ''}}</strong>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <th>Agent</th>
                        <td>
                            <div class="form-group mb-0">
                                <span v-model="caseData.user_id" v-if="this.mode === this.commonConstants.GENERAL_MODE">{{ caseData.user ? caseData.user.name : '' }}</span>
                                <select class="form-control" v-bind:class="{'is-invalid': this.errors.user_id}" v-model="caseData.user_id" v-else>
                                    <option selected value="null">Select Agent</option>
                                    <option v-for="user in users" :value="user.id">{{ user.name}}</option>
                                </select>
                                <strong class="invalid-feedback">{{this.errors.user_id ? this.errors.user_id[0] : ''}}</strong>
                            </div>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-lg-9">
                <cards-table :cards="cards" :errors="errors" :mode="mode" v-if="cards"></cards-table>
            </div>
        </div>
    </div>
</template>

<script>
    import CardsTable        from './cards/CardsTable';
    import {commonConstants} from '../constants';

    export default {
        name      : "Case",
        components: {
            CardsTable,
        },
        data      : () => {
            return {
                caseData       : {},
                errors         : {},
                users          : [],
                mode           : commonConstants.GENERAL_MODE,
                commonConstants: commonConstants,
            }
        },
        computed  : {
            cards()
            {
                return this.caseData.cards;
            }
        },
        methods   : {
            getCase()
            {
                let id = this.$route.params.caseId;
                axios.get(`/storage/cases/${id}`)
                    .then((response) => {
                        if (response.status === 200) {
                            this.caseData = response.data.case;
                            this.users = response.data.users;
                        }
                    })
                    .catch((error) => console.error(error));
            },
            changeMode()
            {
                this.mode = (this.mode === commonConstants.GENERAL_MODE) ? commonConstants.EDIT_MODE : commonConstants.GENERAL_MODE;
            },
            save()
            {
                let id = this.caseData.id;
                axios.put(`/storage/cases/${id}`, this.caseData)
                    .then((response) => {
                        if (response.status === 200) {
                            this.mode = (this.mode === commonConstants.GENERAL_MODE) ? commonConstants.EDIT_MODE : commonConstants.GENERAL_MODE;
                        }
                    })
                    .catch((error) => {
                        if(error.response) {
                            this.errors = error.response.data.errors;
                        }
                        console.error(error)
                    });
            },
        },
        created()
        {
            this.getCase();
        }
    }
</script>

<style scoped>

</style>
