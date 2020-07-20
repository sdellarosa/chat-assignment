let actions = {
    setUser({commit}, user) {
        commit('SET_USER', user)
    },
    setUsername({commit}, username) {
        commit('SET_USERNAME', username)
    },
    setSelectedUser({commit}, selectedUser) {
        commit('SET_SELECTED_USER', selectedUser)
    },
    fetchLatestMessages({commit}, user) {
        axios.get(`/api/messages/${user}`)
            .then(res => {
                commit('FETCH_LATEST_MESSAGES', res.data)
            })
            .catch(err => {
                console.log(err)
            })
    },
    createMessage({commit}, message) {
        message.author = this.state.user
        message.recipient = this.state.selectedUser
        axios.post('/api/messages', message)
            .then(res => {
                commit('CREATE_MESSAGE', res.data)
            }).catch(err => {
            console.log(err)
        })
    },
    fetchMessages({commit}) {
        const user = this.state.user
        const selectedUser = this.state.selectedUser
        if (selectedUser != 0) {
            axios.get(`/api/messages/${user}/${selectedUser}`)
                .then(res => {
                    commit('FETCH_MESSAGES', res.data)
                    commit('SET_SHOW_FORM', true)
                })
                .catch(err => {
                    console.log(err)
                })
        }
    },
    deleteMessage({commit}, message) {
        axios.delete(`/api/messages/${message.id}`)
            .then(res => {
                if (res.data === 'ok')
                    commit('DELETE_MESSAGE', message)
            })
            .catch(err => {
                console.log(err)
            })
    }
}

export default actions