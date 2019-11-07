<template>
  <div class="firstdemo">
    <el-form ref="form" label-width="100px">
      <el-row type="flex" justify="center">
        <el-col :span="5">
          <el-form-item label-width="70px">
            <span>
              <font color="black" size="3">登录页面</font>
            </span>
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
        <el-col :span="7">
          <el-form-item>
            <el-button type="primary" @click="login">登录</el-button>
            <el-button @click="register">注册</el-button>
          </el-form-item>
        </el-col>
      </el-row>
    </el-form>
  </div>
</template>
<script>
export default {
  name: "",
  data() {
    return {
      user: {
        send: 1,
        email: "",
        password: "",
        name:''
      },
      cd: 0,
      scode: "",
      rphonenumber: "",
      rcode: "",
      infos: {
        type: "alert",
        show: false,
        message: "rua!"
      }
    };
  },
  methods: {
    login() {
      
   
  
      this.$post("/api2/login.php", this.user).then(res => {
        console.log(res)
           this.$cookies.set("email", this.user.email, 3600);
      this.$cookies.set("name", res.name, 3600);
        this.$cookies.set("id", res.user, 3600);
         this.$cookies.set("img", res.image, 3600);

        if (res.valid) {
          this.$router.push("/about");
        } else {
        }
      });
    },
    register() {
      this.$router.push("/register");
    },
    comm() {
      this.$get("/api2/getuser.php").then(res => {
        let data = res;


        data.forEach(val => {
          if (val.email == this.$cookies.get("email")) {
            this.user.name = val.name;
            console.log(val);
          }
        });
      });
    }
  },
  created() {
    this.comm();
  }
};
</script>
<style scoped>
html,
body {
  width: 100%;
  height: 100%;
  background: #000;
}
.firstdemo {
  margin-top: 200px;
  background: #fff;
}
</style>
