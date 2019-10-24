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
            { value: 'Nema', label: 'Nema' },
            { value: 'Dhusher', label: 'Dhusher' },
            { value: 'Burningsun', label: 'Burningsun' },
            { value: 'Hawkglow', label: 'Hawkglow' },
            { value: 'Nav', label: 'Nav' },
            { value: 'Kadev', label: 'Kadev' },
            { value: 'Lightkeeper', label: 'Lightkeeper' },
            { value: 'Heartdancer', label: 'Heartdancer' },
            { value: 'Fivrithrit', label: 'Fivrithrit' },
            { value: 'Suechit', label: 'Suechit' },
            { value: 'Tuldethatvo', label: 'Tuldethatvo' },
            { value: 'Vrovakya', label: 'Vrovakya' },
            { value: 'Hiao', label: 'Hiao' },
            { value: 'Chiay', label: 'Chiay' },
            { value: 'Hogoscu', label: 'Hogoscu' },
            { value: 'Vedrimor', label: 'Vedrimor' }
        ],
        classEnum: [
            { value: 'Paladin', label: 'Paladin' },
            { value: 'Ranger', label: 'Ranger' },
            { value: 'Barbarian', label: 'Barbarian' },
            { value: 'Wizard', label: 'Wizard' },
            { value: 'Cleric', label: 'Cleric' },
            { value: 'Warrior', label: 'Warrior' },
            { value: 'Thief', label: 'Thief' },
        ],
        weaponEnum: [
            { value: 'Sword', label: 'Sword' },
            { value: 'Dagger', label: 'Dagger' },
            { value: 'Hammer', label: 'Hammer' },
            { value: 'Bow and Arrows', label: 'Bow and Arrows' },
            { value: 'Staff', label: 'Staff' },
        ],
        loading: false,
    }
}

const getters = {
    hero: state => state.hero,
    loading: state => state.loading,
    nameEnum: state => state.nameEnum,
    raceEnum: state => state.raceEnum,
    lastNameEnum: state => state.lastNameEnum,
    classEnum: state => state.classEnum,
    weaponEnum: state => state.weaponEnum,
}

const actions = {

    setFirstName({ commit, dispatch, state }, value) {
        commit('setFirstName', value.value);
        if (state.hero.race == 'Elf') {
            dispatch('reversedName', value.value);
        }
    },

    setLastName({ commit }, value) {
        commit('setLastName', value.value);
    },

    setRace({ commit, dispatch }, value) {
        commit('resetState');

        // Names validations
        if (value.value == 'Half-orc' || value.value == 'Dragonborn') {
            commit('setRace', value.value);
            commit('setLastName', '');

        } else {
            if (value.value == 'Dwarf') {
                dispatch('getDwarfFname');
                dispatch('getDwarfLname');
                dispatch('getClasses', value.value);
                commit('setRace', value.value);
            } else {
                commit('setRace', value.value);
            }
        }

        // Class validations
        if (value.value == 'Human' || value.value == 'Half-elf') {
            commit('setClass', 'Paladin');
            commit('setWeapon', 'Sword');
        } else {
            if (value.value == 'Halfling' || value.value == 'Elf') {
                dispatch('getClasses', value.value);
            } else {
                if (value.value == 'Half-orc') {
                    dispatch('getClasses', value.value);
                } else {
                    if (value.value == 'Dragonborn') {
                        dispatch('getClasses', value.value);
                    } else {
                        commit('setRace', value.value);
                    }
                }
            }
        }
    },

    setClass({ commit, dispatch }, value) {
        // Weapon validation
        if (value.value == 'Ranger') {
            commit('setClass', value.value);
            commit('setWeapon', 'Bow and Arrows');
        } else {
            if (value.value == 'Barbarian') {
                commit('setClass', value.value);
                dispatch('getWeapons', value.value);
            } else {
                if (value.value == 'Wizard' || value.value == 'Cleric') {
                    commit('setClass', value.value);
                    commit('setWeapon', 'Staff');
                } else {
                    if (value.value == 'Thief') {
                        commit('setClass', value.value);
                        dispatch('getWeapons', value.value);
                    } else {
                        if (value.value == 'Paladin') {
                            commit('setClass', value.value);
                            commit('setWeapon', 'Sword');
                        } else { 
                            commit('setClass', value.value);
                        }
                    }
                }
            }
        }
    },

    setWeapon({ commit }, value) {
        commit('setWeapon', value);
    },

    // Assign first name enum to Dwarf race
    getDwarfFname({ commit }) {
        axios.get('/api/heros/dwarf-fnames')
            .then(response => {
                commit('setNameEnum', response.data);
            })
            .catch(error => {
                console.log(error);
            })
    },

    // Assign last name enum to Dwarf race
    getDwarfLname({ commit }) {
        axios.get('/api/heros/dwarf-lnames')
            .then(response => {
                commit('setLastNameEnum', response.data);
            })
            .catch(error => {
                console.log(error);
            })
    },

    // Assign Elf last name method
    reversedName({ commit }, name) {
        let tempName = name.charAt(0).toLowerCase() + name.slice(1);
        tempName = tempName.split("").reverse().join("");
        let elfLastName = tempName.charAt(0).toUpperCase() + tempName.slice(1);
        commit('setLastName', elfLastName);
    },

    // Assign validated class enum
    getClasses({ commit }, race) {
        axios.get('/api/heros/classes/' + race)
            .then(response => {
                commit('setClassEnum', response.data);
            })
            .catch(error => {
                console.log(error);
            })
    },

    // Assign validated wepon enum
    getWeapons({ commit }, clas) {
        axios.get('/api/heros/weapons/' + clas)
            .then(response => {
                console.log(response.data);
                commit('setWeaponEnum', response.data);
            })
            .catch(error => {
                console.log(error);
            })
    },
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
    },
    setNameEnum(state, value) {
        state.nameEnum = value;
    },
    setLastNameEnum(state, value) {
        state.lastNameEnum = value;
    },
    setClass(state, value) {
        state.hero.class = value;
    },
    setClassEnum(state, value) {
        state.classEnum = value;
    },
    setWeapon(state, value) {
        state.hero.weapon = value;
        console.log(state.hero.weapon);
    },
    setWeaponEnum(state, value) {
        state.weaponEnum = value;
    },
    resetState(state) {
        state = Object.assign(state, initialState())
    }
}

export default {
    namespaced: true,
    state: initialState,
    getters,
    actions,
    mutations
}
