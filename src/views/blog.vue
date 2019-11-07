<template>
  <div id="blog">
  
<div id="about">
      <tou :name="name" :img="img" />
  <div class="nav">
      <navBar class="navBar"/>
  </div>
   <div class="content">
       <ul>
         <li v-for="(item,index) in blog" :key="index">
           <h2>{{item.title}}</h2>
             <!-- {{item.content}} -->
             <p v-html="item.content"></p>
             
         </li>
       </ul>

   </div>

</div>
  </div>
</template>

<script>
import navBar from "../components/navBar.vue"
import tou from "../components/tou.vue"
export default {
  name: "blog",
   components:{
     'navBar':navBar,
     'tou':tou

    },
  data() {
    return {
      blog: [],
    name:this.$cookies.get("name"),
       img: this.$cookies.get("img"),
    };
  },
  methods: {
   
  },
  created() {
    this.$get("/api2/getnews.php")
      .then(res => {
        this.blog = res;
        console.log(res);
      });
  }
};
</script>

<style  scoped>
#blog{
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
  /* background: #545c64; */

}
ul{
  width: 90%;
  height: auto;
  overflow: hidden;
  margin: 0 auto;
  margin-top: 15px;

}
ul>li{
  margin-bottom: 10px;
  background: #fff;
  padding: 20px;
    border-radius: 8px;
   -webkit-box-shadow:0px 2px 3px #969696;
    box-shadow:0px 2px 3px #969696;
    background: rgb(231, 231, 231);
}
ul>li>h2{
font-size: 24px;
color: #545c64;
}
ul>li>p{
font-size: 15px;
color: #545c64;
margin-top: 20px;
}
</style>
