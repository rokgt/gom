<template>
  <img alt="Vue logo" src="./assets/logo.png">

  <!-- 헤더 -->

  <div class="nav">
    <!-- <a href="#">홈</a>
    <a href="#">상품</a>
    <a href="#">기타</a> -->
    <!-- 반복문 -->

    <a v-for="item in navList" :key="item">{{ item }}</a>  
   <!-- <a v-for="(item,i) in navList" :key="i">{{i+':'+ item }}</a>  키가 필요한경우 -->

  </div>

  <!-- 모달 -->
<transition name="modalAni">
  <div class="bg_black" v-if="modalFlg">
    <div class="bg_white" >
      <img :src="modalProduct.img" alt="img">
      <h4>{{ modalProduct.name}}</h4>
      <p>{{ modalProduct.content }}</p>
      <p>{{ modalProduct.price }}</p>
      <p >신고수 :{{ modalProduct.reportCnt }} </p>
      <button @click="modalFlg= false">닫기</button>
    </div>
  </div>
</transition>
  <!-- 상품 리스트 -->
  <div>
    <!-- <div v-for="item in products" :key="item"> -->
      <div v-for="(item,i) in products" :key="item">
        
      <h4 @click="modalFlg= true; modalProduct= item">{{ item.name }}</h4>
      <!-- <h4 @click="modalOpen(item)">{{ item.name }}</h4> -->
      <p>{{ item.price }}</p>
      <button @click="plusOne(i)">허위 매물 신고</button>
      <!-- <button @click="item.reportCnt++">허위 매물 신고</button> -->
      <span>신고수 : {{ item.reportCnt }}</span>
    </div>  
  </div>
 <!-- <div>
  <div>
    <h4 :style="sty_color_red[1]">{{products[0]}}</h4>
    <p>{{prices[0]}}원</p>
  </div>
  <div>
    <h4 :style="sty_color_red[2]">{{products[1]}}</h4>
    <p>{{prices[1]}}원</p>
  </div>
  <div>
    <h4 :style="sty_color_red[0]">{{products[2]}}</h4>
    <p>{{prices[2]}}원</p>
  </div>
 </div> -->
  
</template>

<script>


import data from './assets/js/data.js';

export default {
  name: 'App',
 
// 데이터 바인딩: 우리가 사용할 데이터를 저장하는 공간
data(){
  return{
    // prices: [1300,10000,20000],
    navList: ['홈','상품','기타','문의'],
    sty_color_red: ['color:red','color:blue','color:pink'],//[],
    // products: ['양발','티샤쓰','즈봉'],
   
    // reportCnt:0,
    products:data,
    modalFlg:false,
    modalProduct:{}
  }
},

// methods: 함수를 정의하는 영역

methods:{
  plusOne(i){
    this.products[i].reportCnt++;
  },
  // modalOpen(item){
  //   this.modalFlg= true;
  //   this.modalProduct=item;
  // }
},

}
</script>

<style>

@import url('./assets/css/common.css');

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}

/* common으로 이동
.nav{
  background-color: #2c3e50;
  padding: 15px;
  border-radius: 10px;  
}

.nav a{
  text-decoration: none;
  color: aliceblue;
  padding: 15px;
} */
</style>
