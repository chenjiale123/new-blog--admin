<template>
   <div class="firstdemo">
    <el-form ref="form" label-width="100px">
      <el-row type="flex" justify="center">
        <el-col :span="5">
          <el-form-item label-width="70px">
            <span>
              <font color="black" size="3">注册页面</font>
            </span>
          </el-form-item>
        </el-col>
      </el-row>
        <el-row type="flex" justify="center">
        <el-col :span="5">
          <el-form-item label="姓名：" prop="name">
            <el-input v-model="user.name" size="small"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row type="flex" justify="center">
        <el-col :span="5">
          <el-form-item label="账户：" prop="name">
            <el-input v-model="user.email" size="small"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row type="flex" justify="center">
        <el-col :span="5">
          <el-form-item label="密码：" prop="password">
            <el-input v-model="user.password" size="small"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
         <el-row type="flex" justify="center">
        <el-col :span="5">
          <el-form-item label="确认密码：" prop="password">
            <el-input v-model="user.password1" size="small"></el-input>
          </el-form-item>
        </el-col>
      </el-row>
      <el-row type="flex" justify="center">
        <el-col :span="7">
          <el-form-item>
            <el-button  type="primary" @click="register">注册</el-button>
            <el-button  @click="login">登录</el-button>

          </el-form-item>
        </el-col>
      </el-row>
    </el-form>
  </div>
</template>
<script>
export default {
    data(){
        return{
            user:{
                name:'',
              email:'',
              password:'',
       
              level:1
            }
        }
    },
    created(){

    },
    methods:{
        register(){
            this.$post("/api2/adduser.php",this.user).then(res => {
        let data = res.data;
          console.log(res)
           this.$notify({
         
          message: res.message,
          type: 'success'
        });
     
      });
        },
        login(){
            this.$router.push('/')
        }

    }
}
</script>
<style scoped>
.firstdemo{
    margin-top: 200px;
}
</style>
