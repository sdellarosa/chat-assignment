<template>
    <div class="list-group">
        <a v-for="latestMessage in latestMessages" @click="setSelectedUser(latestMessage.connected_user_id)" href="#" class="list-group-item list-group-item-action flex-column align-items-start" data-toggle="list">
            <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ latestMessage.connected_user }}</h5>
            <small>{{ latestMessage.created_at }}</small>
            </div>
            <p class="mb-1">{{ latestMessage.content }}</p>
        </a>
    </div>
</template>

<script>
    import {mapGetters} from 'vuex'

        export default {
            name: "LatestMessages",
            created() {
                this.$store.dispatch('setUser', this.$user)
            },
            mounted() {
                this.$store.dispatch('fetchLatestMessages', this.$user)
            },
            methods: {
                setSelectedUser(selectedUser) {
                    this.$store.dispatch('setSelectedUser', selectedUser)
                }
            },
            computed: {
                ...mapGetters([
                    'user',
                    'selectedUser',
                    'latestMessages',
                ])
            }
        }
</script>
