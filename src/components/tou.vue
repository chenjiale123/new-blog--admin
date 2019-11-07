<template>
    <div id="tou">
        <img :src="img" alt="">
       
     <div class="xinxi">
             <el-row>
           <el-col >
    <el-dropdown trigger="click">
      <span style="color:#fff" class="el-dropdown-link">
        {{name}}<i class="el-icon-arrow-down el-icon--right"></i>
      </span>
      <el-dropdown-menu slot="dropdown">
        <el-dropdown-item>编辑信息</el-dropdown-item>
        <el-dropdown-item @click.native="exit">退出登录</el-dropdown-item>

   
      </el-dropdown-menu>
    </el-dropdown>
  </el-col>
</el-row>
     </div>


    </div>
</template>
<script>
export default {
    name:'tou',
    props:{
       name:{},
       img:""
    },
    data(){
     return{
     }
    },
    created(){
      console.log(this.img)
         
    },
    methods:{
      exit(){
        console.log('0')
        this.$router.push("/")
      }
    }
}
</script>
<style  scoped>

#tou{
    background: #545c64;
    height: 68px;
}

#tou>img{
    display: inline-block;
    width: 30px;
    height: 30px;
    margin-left: 60px;
  margin-top: 15px;
}
.xinxi{
    width: 100px;
    height: 34px;
    margin-top: 17px;
    float: right;
    margin-right: 60px;
}

</style>