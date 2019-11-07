<template>
<div id="navBar">
    <el-row class="tac">
  <el-col >
    <h5>默认颜色</h5>
    <el-menu
   
      class="el-menu-vertical-demo"
      @open="handleOpen"
      @close="handleClose"
      @select="handleSelect"
       background-color="#545c64"
      text-color="#fff"
      active-text-color="#ffd04b">
      <el-menu-item index="1">
          <i class="el-icon-location"></i>
          <span slot="title">主页</span>
      </el-menu-item>
      <el-menu-item index="2">
        <i class="el-icon-menu"></i>
        <span slot="title">博客</span>
      </el-menu-item>
      <el-menu-item index="3">
        <i class="el-icon-setting"></i>
        <span slot="title">读评论</span>
      </el-menu-item>
         <el-menu-item index="4">
        <i class="el-icon-setting"></i>
        <span slot="title">写博客</span>
      </el-menu-item>
         <el-menu-item index="5">
        <i class="el-icon-setting"></i>
        <span slot="title">用户管理</span>
      </el-menu-item>
         <el-menu-item index="6">
        <i class="el-icon-setting"></i>
        <span slot="title">导航三</span>
      </el-menu-item>
    </el-menu>
  </el-col>
    </el-row>

    </div>
</template>
<script>
  export default {
    name:'navBar',

    methods: {
      handleOpen(key, keyPath) {
        console.log(key, keyPath);
      },
      handleClose(key, keyPath) {
        console.log(key, keyPath);
      },
          handleSelect(key, keyPath){
                switch(key){
                    case '1':
                        this.$router.push('/about');
                 
                        break;
                    case '2':
                        this.$router.push('/blog')
                
                        break;
                    case '3':
                        this.$router.push('/detail')
          
                        break;
                         case '4':
                        this.$router.push('/contect')
          
                        break;
                        case '5':
                        this.$router.push('/user')
          
                        break;
                }
            },


    }
  }
</script>
<style  scoped>
#navBar{
  width: 100%;
  height: 100%;
}
h5{
  color: #fff;
}
</style>