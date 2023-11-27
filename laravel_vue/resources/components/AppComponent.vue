<template>
    <div>
        APP VUE 컴포넌트
    </div>
    <h2>{{ $store.state.testStr }}</h2>
    <h2>라라벨 데이터 name:{{ laravelData.name }}</h2>
    <h2>라라벨 데이터 id:{{ laravelData.id }}</h2>
    <ul>
        <li><a href="/">루트</a></li>
        <li><a href="/login">로그인</a></li>
        <li><a href="/board">보드</a></li>
    </ul>
    <router-link to="/login">라우터 로그인</router-link>
    <router-view></router-view>
</template>
<script>
export default {
    name: 'AppComponent',
    props: {
        laravelData: Object,
    },
    beforeCreated(){
        this.$store.commit('setLaravelData',this.laravelData);
    },
}
</script>
<style>
    
</style>