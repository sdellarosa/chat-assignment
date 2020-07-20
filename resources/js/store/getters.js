let getters = {
    user: state => {
        return state.user
    },
    selectedUser: state => {
        return state.selectedUser
    },
    messages: state => {
        return state.messages
    },
    latestMessages: state => {
        return state.latestMessages
    },
    showForm: state => {
        return state.showForm
    }
}

export default  getters