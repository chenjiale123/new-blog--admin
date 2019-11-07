<template>
  <div id="contect">
  <div id="about">
       <tou :name="name" :img="img" />

  <div class="nav">
      <navBar class="navBar"/>
  </div>
   <div class="content">
     <input type="text" v-model="form.title">
           <div id="wangeditor">
    <div ref="editorElem" style="text-align:left;"></div>
  </div>
  <button @click="send()">提交</button>
   </div>

</div>
  </div>
</template>

<script>

import navBar from "../components/navBar.vue"
import tou from "../components/tou.vue"
import E from "wangeditor";
export default {
   components:{
     'navBar':navBar,
     'tou':tou,

    },

       
      
        
  data() {
    return {
      form: {
        title: "",
        text: "",
       
      },
      editor: null,
      editorContent: '',
      show: true,
          name:this.$cookies.get("name"),
             img: this.$cookies.get("img"),
    };
  },
 created() {

   
 
  },

 mounted() {
    this.editor = new E(this.$refs.editorElem);
    // 编辑器的事件，每次改变会获取其html内容
    this.editor.customConfig.onchange = html => {
      this.form.text = html;

    };
    this.editor.customConfig.menus = [
      // 菜单配置
      'head', // 标题
      'bold', // 粗体
      'fontSize', // 字号
      'fontName', // 字体
      'italic', // 斜体
      'underline', // 下划线
      'strikeThrough', // 删除线
      'foreColor', // 文字颜色
      'backColor', // 背景颜色
      'link', // 插入链接
      'list', // 列表
      'justify', // 对齐方式
      'quote', // 引用
      'emoticon', // 表情
      'image', // 插入图片
      'table', // 表格
      'code', // 插入代码
      'undo', // 撤销
      'redo' // 重复
    ];
 

    this.editor.create();
 },
 methods:{
   send(){
     console.log(this.form)
        this.$post("/api2/addnews.php", {
          id:this.$cookies.get("id"),
          title:this.form.title,
          content:this.form.text
        })
        .then(res => {
          console.log(res)
        });
   }
 }
 
};
</script>
<style scoped>
p{
  color: black
}
#wangeditor{
  margin: 34px auto 0 auto;
}
.w-e-text p {
     color: red;
}

#contect{
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
.content>input{
  border: 1px solid #eee;
  margin-top: 34px;
  width: 100%;
  height: 34px;

}
button{
  width: 80px;
  height: 30px;
  border: none;
  background: #545c64;
  float: right;
  color: #fff;
}
</style>

