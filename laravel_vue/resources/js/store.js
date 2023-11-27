import { createStore } from 'vuex';
import axios from 'axios';
const store = createStore({
    state() {
       return{ testStr:'vuex테스트용',
       laravelData: null, //라라벨에서 받은 데이터 저장용
        }
    },
    mutations:{
        setLaravelData(state,data){
            state.laravel = data;
        },

    },
    actions:{

    }

})
export default store;