import { createStore } from 'vuex';
import axios from 'axios';
const store = createStore({
    // state 데이터를 저장하는 여역
    state() {
        return {
            boardData: [], //게시글 저장용
            flgTapUI:0, //Tap UI용 플래그
            imgURL:'',//작성탭 표시용 이미지 URL저장용
            postfileData:null,//글 작성 파일데이터 저장용
            lastBoardId:0,
        }
    },

    // mutations : 데이터 수정용 함수 저장영역
    mutations:{
        setBoardList(state,data){
            state.boardData=data;
            state.lastBoardId=data[data.length-1].id;
        },
        //탭 UI셋팅요
        setFlgTapUI(state,num){
            state.flgTapUI=num;
        },
        //작성탭 표시용 이미지 URL저장용
        setImgURL(state,url){
            state.imgURL=url;
        },
        //글 작성 파일데이터 저장용
        setPostfileData(state,file){
            state.postfileData=file;
        },
        // 작성된 글 삽입용
        setUnshiftBoard(state,data){
            state.boardData.unshift(data);
        },
        setClearAddData(state){
            state.imgURL='';
            state.postfileData=null;
        }
    },

    // actions :ajax로 서버에 데이터를 요청할 때나 시간 함수등 비동기 처리는 actions에 정의
    actions:{
        // 초기 게시글 데이터 획득 ajax처리
        actionGetBoardList(context){
            const url ='http://112.222.157.156:6006/api/boards';
            const header={
                headers:{
                    'Authorization':'Bearer meerkat'
                }
            };
            axios.get(url,header)
            .then(res=>{
                context.commit('setBoardList',res.data);
                res.data
            })
            .catch(err=>{
                console.log(err);
            })
        },
        // 글작성 처리
        actionPostBoardAdd(context){
            const url ='http://112.222.157.156:6006/api/boards';
            const header={
                headers:{
                    'Authorization':'Bearer meerkat',
                    'Content-Type': 'multipart/form-data'
                }
        };
        const data = {
            name:'찮은이형',
            img:context.state.postfileData,
            content:document.getElementById('content').value,
        };
        axios.post(url,data,header)
        .then(res=>{
            // 작성글 데이터 저장
            context.commit('setUnshiftBoard', res.data);
            // 리스트 UI로 전환
            context.commit('setFlgTapUI',0);
            context.commit('setClearAddData')

        })
        .catch(err=>{
            console.log(err);
        })
    },
    actionMorelist(context){
        const url ='http://112.222.157.156:6006/api/boards';
        const header={
            headers:{
                'Authorization':'Bearer meerkat'
            }};
            axios.get(url,header)
            .then(res=>{
                context.commit('setBoardList',res.data);
                res.data
            })
            .catch(err=>{
                console.log(err);
            })

    }
     },
});
export default store;