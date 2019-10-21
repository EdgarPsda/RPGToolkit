function initialState() {
    return {
        hero: {
            firstName: null,
            lastName: null,
            race: null,
            class: null,
            weapon: null,
            stats: null
        },
        attributes: {
            firstName: '',
            race: ''
        },
        nameEnum: [
            { value: 'Bheizer', label: 'Bheizer' },
            { value: 'Khazun', label: 'Khazun' },
            { value: 'Grirgel', label: 'Grirgel' },
            { value: 'Murgil', label: 'Murgil' },
            { value: 'Edraf', label: 'Edraf' },
            { value: 'En', label: 'En' },
            { value: 'Grognur', label: 'Grognur' },
            { value: 'Grum', label: 'Grum' },
            { value: 'Surhathion', label: 'Surhathion' },
            { value: 'Lamos', label: 'Lamos' },
            { value: 'Melmedjad', label: 'Melmedjad' },
            { value: 'Shouthes', label: 'Shouthes' },
            { value: 'Che', label: 'Che' },
            { value: 'Jun', label: 'Jun' },
            { value: 'Rircurtun', label: 'Rircurtun' },
            { value: 'Zelen', label: 'Zelen' }
        ],
        raceEnum: [
            { value: 'Human', label: 'Human' },
            { value: 'Elf', label: 'Elf' },
            { value: 'Halfling', label: 'Halfling' },
            { value: 'Dwarf', label: 'Dwarf' },
            { value: 'Half-orc', label: 'Half-orc' },
            { value: 'Half-elf', label: 'Half-elf' },
            { value: 'Dragonborn', label: 'Dragonborn' }
        ],
        loading: false,
    }
}

const getters = {
    hero: state => state.hero,
    loading: state => state.loading,
    nameEnum: state => state.nameEnum,
    raceEnum: state => state.raceEnum,
}

const actions = {

    setFirstName({ commit }, value) {
        commit('setFirstName', value);
    },
    setRace({ commit }, value) {
        commit('setRace', value);
    },

    getElfLastName({ commit, state }) {

        return new Promise((resolve, reject) => {
            let params = new FormData();

            for (let fieldName in state.hero) {
                let fieldValue = state.hero[fieldName];
                if (typeof fieldValue !== "object") {
                    params.set(fieldName, fieldValue);
                } else {
                    if (fieldValue && typeof fieldValue[0] !== "object") {
                        params.set(fieldName, fieldValue);
                    } else {
                        for (let index in fieldValue) {
                            params.set(
                                fieldName + "[" + index + "]",
                                fieldValue[index]
                            );
                        }
                    }
                }
            }

            // params.set('firstName', state.hero.firstName);

            axios.get('/api/heros/validate-name/' + params  )
                .then(response => {
                    console.log(response.data.data);
                })

        })
    }
}

const mutations = {
    setFirstName(state, value) {
        state.hero.firstName = value;
    },
    setRace(state, value) {
        state.hero.race = value;
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
