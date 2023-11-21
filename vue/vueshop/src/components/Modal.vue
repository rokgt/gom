<template lang="">
<div class="bg_black" >
    <div class="bg_white" >
      <img :src="data.img" alt="img">
      <h4>{{ data.name}}</h4>
      <p>{{ data.content }}</p>
      <p>{{ data.price }}</p>
      <input type="text" v-model="productCount">
      <p>총 가격:{{productCount*data.price}}원</p>
      <p >신고수 :{{ data.reportCnt }} </p>
      <button @click="$emit('closeModal')">닫기</button>
    </div>
</div>
</template>
<script>
export default {
    name:'Modal',
    data(){
        return{
            productCount:0,
        }
    },
    // watch:data를 감시하는 함수를 정의하는 영역
    watch:{
        // 함수명은 감시하고 싶은 데이터바인딩명과 동일해야 합니다.
        productCount(input){
            if(input>10){
                alert('멈춰!');
                this.productCount=10;
            }else if(input<0){
                    alert('이것도 좀');
                    this.productCount=0;
                }
            }

        },

    props: {
        data: Object,
    }

}
</script>
<style lang="">
    
</style>