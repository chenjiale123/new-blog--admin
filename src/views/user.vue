<template>
  <div id="user">
    <div id="about">
      <tou :name="name" :img="img" />

      <div class="nav">
        <navBar class="navBar" />
      </div>
      <div class="content" v-if="show">
        <el-button size="mini" type="primary" @click.native="add">添加</el-button>
        <el-table :data="tableData" style="width: 100%">
          <el-table-column label="姓名" width="180">
            <template slot-scope="scope">
              <span style="margin-left: 10px">{{ scope.row.name }}</span>
            </template>
          </el-table-column>
          <el-table-column label="email" width="180">
            <template slot-scope="scope">
              <span style="margin-left: 10px">{{ scope.row.email }}</span>
            </template>
          </el-table-column>
          <el-table-column label="头像" width="180">
            <template slot-scope="scope">
              <span style="margin-left: 10px">
                <img :src="scope.row.image" alt />
              </span>
            </template>
          </el-table-column>
          <el-table-column label="权限" width="180">
            <template slot-scope="scope">
              <span style="margin-left: 10px">{{ scope.row.level }}</span>
            </template>
          </el-table-column>
          <el-table-column label="操作">
            <template slot-scope="scope">
              <el-button size="mini" @click="handleEdit(scope.$index, scope.row)">编辑</el-button>
              <el-button size="mini" type="danger" @click="handleDelete(scope.$index, scope.row)">删除</el-button>
            </template>
          </el-table-column>
        </el-table>
      </div>
      <div class="content" v-if="!show">
        <el-form
          :model="ruleForm2.img"
          status-icon
          :rules="rules2"
          ref="ruleForm2"
          label-width="100px"
          class="demo-ruleForm"
        >
          <el-upload
            class="avatar-uploader"
            action="https://jsonplaceholder.typicode.com/posts/"
            :show-file-list="false"
            :on-success="handleAvatarSuccess"
            :before-upload="beforeAvatarUpload"
          >
            <img v-if="imageUrl" :src="imageUrl" class="avatar" />
            <i v-else class="el-icon-plus avatar-uploader-icon"></i>
          </el-upload>
          <el-form-item label="姓名">
            <el-input type="text" v-model="ruleForm2.name" auto-complete="off"></el-input>
          </el-form-item>
          <el-form-item label="email">
            <el-input type="text" v-model="ruleForm2.email" auto-complete="off"></el-input>
          </el-form-item>
          <el-form-item label="密码">
            <el-input type="password" v-model="ruleForm2.password"></el-input>
          </el-form-item>
          <el-form-item label="确认密码">
            <el-input type="password" v-model="ruleForm2.sure"></el-input>
          </el-form-item>
        
            <el-form-item label="权限">
              <el-select v-model="ruleForm2.level" placeholder="请配置权限">
                <el-option label="管理员" value="5"></el-option>
                <el-option label="普通成员" value="1"></el-option>
              </el-select>
            </el-form-item>
             <el-form-item>
            <el-button type="primary" @click="submitForm()">提交</el-button>
            <el-button @click="resetForm('ruleForm2')">重置</el-button>
          </el-form-item>
        </el-form>
      </div>
    </div>
  </div>
</template>
<script>
import navBar from "../components/navBar.vue";
import tou from "../components/tou.vue";
export default {
  components: {
    navBar: navBar,
    tou: tou
  },
  data() {
    return {
      name: this.$cookies.get("name"),
      img: this.$cookies.get("img"),
      tableData: [],
      show: true,
      ruleForm2:{
          img:'',
          name:'',
          email:'',
          password:'',
          sure:"",
           level:''
      },
      imageUrl:''
    };
  },
  created() {
  this.moren()
  },
  methods: {
      moren(){
  this.$get("/api2/getuser.php").then(res => {
      console.log(res);
      console.log(this.img);

      this.tableData = res;
      for (let i = 0; i <= res.length - 1; i++) {
        if (this.tableData[i].level !== "5") {
          this.tableData[i].level = "普通用户";
        } else {
          this.tableData[i].level = "管理员";
        }
      }
    });
      },
    add() {
      this.show = false;
      console.log("1111");
    },
    handleAvatarSuccess() {},
    beforeAvatarUpload() {},
    submitForm() {
        this.$post("/api2/adduser.php", {
          name:this.ruleForm2.name,
          email:this.ruleForm2.email,
          password:this.ruleForm2.password,
          level:this.ruleForm2.level,
          image:this.ruleForm2.img
        })
        .then(res => {
          console.log(res)
          this.show=true
              this.moren()
        });

    },
    resetForm() {},
    handleEdit(index, row) {
      console.log(index, row);
    },
    handleDelete(index, row) {
        var _this=this
      console.log(index, row);
      this.$get("/api2/del.php?id="+row.id)
        .then(res => {
          console.log(res) 
          this.moren()
        });
    }
  }
};
</script>
<style  scoped>
el-table {
  margin-top: 10px;
}
img {
  width: 30px;
}
#user {
  width: 1200px;
  margin: 0 auto;
  height: 100%;
}
.nav {
  width: 200px;
  height: 100%;
  float: left;
}
.content {
  width: 1000px;
  height: 100%;
  float: left;
  /* background: #545c64; */
  margin-top: 30px;
}
  .avatar-uploader .el-upload {
    border: 1px dashed #d9d9d9;
    border-radius: 6px;
    cursor: pointer;
    position: relative;
    overflow: hidden;
  }
  .avatar-uploader .el-upload:hover {
    border-color: #409EFF;
  }
  .avatar-uploader-icon {
    font-size: 28px;
    color: #8c939d;
    width: 178px;
    height: 178px;
    line-height: 178px;
    text-align: center;
  }
  .avatar {
    width: 178px;
    height: 178px;
    display: block;
  }
</style>