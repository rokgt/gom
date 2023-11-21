<template lang="">
    <div>
    <!-- <div v-for="item in products" :key="item"> -->
      <!-- <div v-for="(item,i) in products" :key="item"> -->
        
      <!-- <h4 @click="modalFlg= true; modalProduct= item">{{ data.name }}</h4> -->
      <h4 @click="$emit('openModal',data)">{{ data.name }}</h4>
      <p>{{ data.price }}</p>
      <button @click="$emit('fncReport',productKey)">허위 매물 신고</button>
      <!-- <button @click="item.reportCnt++">허위 매물 신고</button> -->
      <span>신고수 : {{ data.reportCnt }}</span>
      
  </div>
</template>
<script>
export default {
    name:'Goods',
    props:{
        data:Object,
        productKey:Number,
    }
}
</script>
<style lang="">
    
</style>