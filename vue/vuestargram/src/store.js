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
            flgBtnMoreView: true,//더보기버튼 활성여부 플래그
        }
    },

    // mutations : 데이터 수정용 함수 저장영역
    mutations:{
        setBoardList(state,data){
            state.boardData=data;
            this.commit('setLastBoardId',data[data.length-1].id);
        },
        // 마지막 게시글 번호 셋팅용
        setLastBoardId(state,num){
            state.lastBoardId=num;
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
        },
        // 더보기 데이터 추가
        setAddBoardData(state,data){
            state.boardData.push(data);
        },
        //더보기 버튼 활성화
        setFlgBtnMoreView(state,boo){
            state.flgBtnMoreView=boo;
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
    // 더보기
    actionGetBoardItem(context){
        const url ='http://112.222.157.156:6006/api/boards/'+ context.state.lastBoardId;
        const header={
            headers:{
                'Authorization':'Bearer meerkat'
            }};
        axios.get(url,header)
        .then(res=>{
            if(res.data){
            context.commit('setAddBoardData',res.data);
            context.commit('setLastBoardId',res.data.id);
            }else{
                context.commit('setFlgBtnMoreView',false);
            }
        })
        .catch(err=>{
            console.log(err.response.data);
        })

    }
     },
});
export default store;