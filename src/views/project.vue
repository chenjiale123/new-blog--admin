<template>
    <div id="project">
        <div class="show" v-for="(item,index) in prj" :key="index">
            <img :src="item.msg" alt="">
            <p>{{item.dsc}}</p>
        </div>
    </div>
</template>
<script>
export default {
    name:'project',
    data(){
        return {
              prj:[{
                  msg:require('../assets/images/1.png'),
                  dsc:'乐波资源分享网站'
              },{
                  msg:require('../assets/images/2.png'),
                  dsc:'韩雅化妆品网站'
              },{
                  msg:require('../assets/images/3.png'),
                  dsc:'南昌二三其奇科技网络有限公司网站'
              },{
                  msg:require('../assets/images/3.png'),
                  dsc:'南昌二三其奇科技网络有限公司网站'
              }]
        }
    }
    
}
</script>
<style scoped>
#project{
    width: 800px;
    height: 620px;
    margin: 20px auto;
    background: #ffffff url(../assets/images/xunguang-4.jpg) no-repeat;
    background-size: 100% 100%;
}
.show{
    width: 300px;
    height: 250px;
    background: #fff;
    box-shadow: 0px 2px 2px #eee;
    float: left;
    margin-left: 50px;
    margin-top: 50px;
}
.show img{
width: 100%;
height: 220px;
}
p{
    color: #000;
}
</style>
