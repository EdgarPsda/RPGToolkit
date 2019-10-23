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
        lastNameEnum: [
            {value: 'Nema', label: 'Nema'},
            {value: 'Dhusher', label: 'Dhusher'},
            {value: 'Burningsun', label: 'Burningsun'},
            {value: 'Hawkglow', label: 'Hawkglow'},
            {value: 'Nav', label: 'Nav'},
            {value: 'Kadev', label: 'Kadev'},
            {value: 'Lightkeeper', label: 'Lightkeeper'},
            {value: 'Heartdancer', label: 'Heartdancer'},
            {value: 'Fivrithrit', label: 'Fivrithrit'},
            {value: 'Suechit', label: 'Suechit'},
            {value: 'Tuldethatvo', label: 'Tuldethatvo'},
            {value: 'Vrovakya', label: 'Vrovakya'},
            {value: 'Hiao', label: 'Hiao'},
            {value: 'Chiay', label: 'Chiay'},
            {value: 'Hogoscu', label: 'Hogoscu'},
            {value: 'Vedrimor', label: 'Vedrimor'}
        ],
        loading: false,
    }
}

const getters = {
    hero: state => state.hero,
    loading: state => state.loading,
    nameEnum: state => state.nameEnum,
    raceEnum: state => state.raceEnum,
    lastNameEnum: state => state.lastNameEnum
}

const actions = {

    setFirstName({ commit, dispatch, state }, value) {
        commit('setFirstName', value.value);
        if(state.hero.race == 'Elf'){
            dispatch('reversedName', value.value);
        }
    },

    setLastName({ commit }, value){
        commit('setLastName', value.value);
    },

    setRace({ commit }, value) {
        if(value.value == 'Half-orc' || value.value == 'Dragonborn'){
            commit('setRace', value.value);
            commit('setLastName', '');
            
        }else{
            commit('setRace', value.value);
        }
        
    },

    // Assign Elf last name method
    reversedName({ commit }, name) {
        let tempName = name.charAt(0).toLowerCase() + name.slice(1);
        tempName = tempName.split("").reverse().join("");
        let elfLastName = tempName.charAt(0).toUpperCase() + tempName.slice(1);
        commit('setLastName', elfLastName);
    }
}

const mutations = {
    setFirstName(state, value) {
        state.hero.firstName = value;
    },
    setLastName(state, value) { 
        state.hero.lastName = value;
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
