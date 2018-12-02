<template>
    <div>
        <nav class="navbar navbar-expand-md navbar-light navbar-laravel">
            <div class="container">
                <router-link :to="{name: 'home'}" class="navbar-brand">Home</router-link>
                <router-link :to="{name: 'users'}" class="navbar-brand">Users</router-link>
                <router-link :to="{name: 'cards'}" class="navbar-brand">Cards</router-link>
                <router-link :to="{name: 'cases'}" class="navbar-brand">Cases</router-link>
            </div>
        </nav>
        <main class="py-4">
            <router-view></router-view>
        </main>
    </div>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
