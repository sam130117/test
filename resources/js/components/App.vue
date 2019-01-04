<template>
    <div>
        <nav class="navbar navbar-expand-sm bg-dark navbar-dark" v-if="isUserLoggedIn">
            <div class="container">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <router-link :to="{name: 'cards'}" class="nav-link">Cards</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'cases'}" class="nav-link">Cases</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'users'}" class="nav-link">Users</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'email'}" class="nav-link">Send email</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{name: 'chat'}" class="nav-link">Chat</router-link>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="container bg-white py-4">
            <router-view></router-view>
        </div>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex';

    export default {
        name: "App",
        computed: {
            ...mapGetters(['isUserLoggedIn'])
        }
    }
</script>
