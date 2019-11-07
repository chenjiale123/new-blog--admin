<template>
    <div id="detail">
            
<div id="about">
      <tou :name="name" :img="img" />

  <div class="nav">
      <navBar class="navBar"/>
  </div>
   <div class="content">
       <ul>
         <li v-for="(item,index) in comm" :key="index">
      
             <p>{{item.text}}</p>
                                 <span>------{{item.name}}</span>
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

    name:'detail',
     components:{
     'navBar':navBar,
     'tou':tou

    },
    data(){
        return {
           comm:[],
              name:this.$cookies.get("name"),
                 img: this.$cookies.get("img"),
        }
    },

    created(){
          
       this.$get('/api2/gotcomm.php')
       .then(res=>{
           console.log(res)
           this.comm=res
       })
        
    }
    
}
</script>
<style scoped>
#detail{
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
  display: flex;
  justify-content: space-between

}
ul>li{
  margin-bottom: 10px;
  /* background: #fff; */
  width: 30%;
  height: 200px;
  padding: 20px;
    border-radius: 8px;
   -webkit-box-shadow:0px 2px 3px #969696;
    box-shadow:0px 2px 3px #969696;
    background: rgb(238, 238, 238);
    position: relative;
}

ul>li>p{
font-size: 15px;
color: #545c64;
margin-top: 20px;
margin-bottom: 20px;
}
ul>li>span{
font-size: 24px;
color: #545c64;
position: absolute;
bottom: 10px;

}
</style>
