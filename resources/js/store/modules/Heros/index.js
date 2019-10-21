function initialState() {
    return {
        all: [],
        loading: false,
    }
}

const getters = {
    heros: state => state.all,
    loading: state => state.loading
}

const actions = {
    fetchData({ commit, state }) {

        commit('setLoading', true);

        axios.get('/api/heros')
            .then(response => {
                commit('setHeros', response.data.data);
            })
            .catch(error => {
                let message = error.response.data.message || error.message;
                console.log(message);
            })
            .finally(() => {
                commit('setLoading', false);
            })
    }
}

const mutations = {
    setHeros(state, items) {
        state.all = items;
    },
    setLoading(state, value) {
        state.loading = value;
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
