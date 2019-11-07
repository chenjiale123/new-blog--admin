<template>

<div id="about">
      <tou :name="name" :img="img" />
  <div class="nav">
      <navBar class="navBar"/>
  </div>
   <div class="content">
      <div id="chart1"></div>

   </div>

</div>
</template>
<script>
import navBar from "../components/navBar.vue"
import tou from "../components/tou.vue"
export default {
    components:{
     'navBar':navBar,
     'tou':tou

    },
    
    data(){
        return{
            name:this.$cookies.get("name"),
               img: this.$cookies.get("img"),
        }
    },
    mounted(){
         this.$chart.line1('chart1');
    }
}
</script>
<style scoped >

#about{
    width: 1200px;
    margin: 0 auto;
    height: 100%;
}
.nav{
    width: 200px;
    height: 100%;
    float: left;
}
.content{
      width: 1000px;
    height: 100%;
    float: left; 
}
#chart1{
    width: 300px;
    height: 300px;
 
    margin-top: 98px;
    margin: 0 auto
}
</style>
