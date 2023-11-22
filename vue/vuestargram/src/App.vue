<template>
  <!-- 헤더 -->
  <div class="header">
    <ul>
      <li v-if="$store.state.flgTapUI !==0" class="header-button header-button-left" @click="canceltxt()">취소 </li>
      <li><img class="logo" alt="wow logo" src="./assets/wow.png"> </li>
      <li v-if="$store.state.flgTapUI ===1" class="header-button header-button-right" @click="addBoard()">작성 </li>
    </ul>
  </div>
  
<!-- 컨테이너 -->
  <ContainerComponent></ContainerComponent>

<!-- 더보기 -->

<button @click="moreList">더보기</button>

<!-- 푸터 -->

  <div class="footer">

    <div class="footer-button-store">
      <label for="file" class="label-store">+</label>
      <input @change="updateImg" accept="image/*" type="file" id="file" class="input-file">
    </div>

  </div>

 
  
</template>

<script>
import ContainerComponent from './components/ContainerComponent.vue';

export default {
  name: 'App',
  created(){
    this.$store.dispatch('actionGetBoardList');
  },
  methods:{
    // 작성페이지 이동 및 이미지 관리
    updateImg(e) {
      const file = e.target.files;
      const imgURL = URL.createObjectURL(file[0]);
      //  작성 영역에 이미지를 표시하기 위한 데이터저장
      this.$store.commit('setImgURL',imgURL);
      // 작성 처리시 보낼 파일 데이터 저장
      this.$store.commit('setPostfileData', file[0]);
      // 작성 ui변경을 위한 플래그 수정
      this.$store.commit('setFlgTapUI',1);
      e.target.value='';
      // console.log(imgURL);
    },
    canceltxt(){
      this.$store.commit('setFlgTapUI',0);
    },
    // 글작성 처리
    addBoard(){
      this.$store.dispatch('actionPostBoardAdd')

    },
    moreList(){
      this.$store.dispatch('actionMoreList')
    }
  },
  components:{
    ContainerComponent,
    }
  }

</script>

<style>
@import url('./assets/css/common.css');
</style> 
