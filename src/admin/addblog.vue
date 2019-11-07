<template>
  <div id="addblog">
    <div class="form">
      <b-form v-if="show">
        <b-form-group
          id="exampleInputGroup1"
          label="添加标题:"
          label-for="exampleInput1"
          description="show title"
        >
          <b-form-input
            id="exampleInput1"
            type="text"
            v-model="title"
            required
            placeholder="Enter title"
          ></b-form-input>
        </b-form-group>
        <div class="edit_container">
          <span>添加内容</span>
          <quill-editor
            v-model="contain"
            ref="myQuillEditor"
            :options="editorOption"
            @blur="onEditorBlur($event)"
            @focus="onEditorFocus($event)"
            @change="onEditorChange($event)"
          ></quill-editor>
        </div>

        <b-button type="button" variant="primary" @click="send">Submit</b-button>
        <b-button type="reset" variant="danger" @reset="onReset">Reset</b-button>
      </b-form>
    </div>
  </div>
</template>
<script>
import qs from "qs";
import { quillEditor } from "vue-quill-editor"; //调用编辑器
import "quill/dist/quill.core.css";
import "quill/dist/quill.snow.css";
import "quill/dist/quill.bubble.css";

export default {
  name: "addblog",
  data() {
    return {
      // content: "",
      editorOption: {},

      title: "",
      contain: "",

      show: true
    };
  },
  components: {
  
    quillEditor
  },
  methods: {
    onEditorReady(editor) {
      // 准备编辑器
    },
    onEditorBlur() {}, // 失去焦点事件
    onEditorFocus() {}, // 获得焦点事件
    onEditorChange() {}, // 内容改变事件

    onReset(evt) {
      evt.preventDefault();
      /* Reset our form values */
      this.title = "";
      this.content = "";
      /* Trick to reset/clear native browser form validation state */
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
    send() {
      let obj = {
        title: this.title,
        content: this.contain
      };

      let data = qs.stringify(obj);
      console.log(data);
      this.axios
        .post("http://chenjiale.gz01.bdysite.com/api/api2/addnews.php", data)
        .then(res => {
          console.log(res.data.message)
        });
    }
  },
  computed: {
    editor() {
      return this.$refs.myQuillEditor.quill;
    }
  }
};
</script>
<style scoped>
#addblog {
  width: 500px;
  /* height: 800px; */
  height: 600px;
  position: relative;
}

.form {
  width: 800px;
  height: 500px;
  background: rgb(209, 207, 207);
  /* float: left; */
  /* margin-left: 50px; */
  position: absolute;
  left: 300px;
  top: 30px;
}
form {
  width: 500px;
  margin: 0 auto;
  margin-top: 40px;
}
.quill-editor {
  background: #fff;
  margin-bottom: 20px;
  color: #000;
}
</style>

