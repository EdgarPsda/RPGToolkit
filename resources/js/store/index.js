import Vue from 'vue'
import Vuex from 'vuex'

import HerosIndex from './modules/Heros'
import HerosSingle from './modules/Heros/single'
import MonstersIndex from './modules/Monsters'
import MonstersSingle from './modules/Monsters/single'

Vue.use(Vuex)

const debug = process.env.NODE_ENV !== 'production'

export default new Vuex.Store({
    modules: {
        HerosIndex,
        HerosSingle,
        MonstersIndex,
        MonstersSingle
    },
    strict: debug
})