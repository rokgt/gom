<template>
    
    <div class="discount">

        <p>지금 구매하면 깎아준다 {{discountNum}}%할인 사라 당장 사라 늦게 사면 안깎아준다</p>

    </div>
    
</template>
<script>
export default {
    name: 'Discount',
    data() {
        return {
            discountNum:90,
            intervalInfo:null,
        }
    },
    // 라이프 사이클훅:mounted단계에서 실행되는 영역
    mounted() {
        this.intervalInfo=setInterval(() => {
            this.discountNum--;
        },1000);
    },
    updated() {
        if (this.discountNum === 0) {
            clearInterval(this.intervalInfo);
        }
        
    },
}
</script>
<style>
    
</style>