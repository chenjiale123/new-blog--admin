<template>
  <div id="adduser">
    <div class="form">
      <b-form v-if="show">
        <b-form-group
          id="exampleInputGroup1"
          label="Email input:"
          label-for="exampleInput1"
          description="We'll never share your email with anyone else."
        >
          <b-form-input
            id="exampleInput1"
            type="email"
            v-model="form.email"
            required
            placeholder="Enter email"
          ></b-form-input>
        </b-form-group>

        <b-form-group id="exampleInputGroup2" label="Your password:" label-for="exampleInput3">
          <b-form-input
            id="exampleInput3"
            type="text"
            v-model="form.password"
            required
            placeholder="Enter password"
          ></b-form-input>
        </b-form-group>

        <b-form-group id="exampleInputGroup2" label="Your level:" label-for="exampleInput3">
          <b-form-input
            id="exampleInput4"
            type="text"
            v-model="form.level"
            required
            placeholder="Enter level :0为管理员1为普通用户"
          ></b-form-input>
        </b-form-group>
        <b-form-group id="exampleInputGroup2" label="Your Name:" label-for="exampleInput2">
          <b-form-input
            id="exampleInput2"
            type="text"
            v-model="form.name"
            required
            placeholder="Enter name"
          ></b-form-input>
        </b-form-group>
        <b-button type="button" variant="primary" @click="set">Submit</b-button>
        <b-button type="reset" variant="danger" @reset="onReset">Reset</b-button>
      </b-form>
    </div>
  </div>
</template>
<script>
import qs from "qs";
export default {
  name: "adduser",
  data() {
    return {
      form: {
        email: "",

        password: "",
        level: "",
        name: ""
      },

      show: true
    };
  },
  components: {
  },
  methods: {
    onReset(evt) {
      evt.preventDefault();
      /* Reset our form values */
      this.form.email = "";
      this.form.name = "";
     
      this.form.level = "";
      /* Trick to reset/clear native browser form validation state */
      this.show = false;
      this.$nextTick(() => {
        this.show = true;
      });
    },
    set() {
      let data = qs.stringify(this.form);
      this.axios
        .post("http://chenjiale.gz01.bdysite.com/api/api2/adduser.php", data)
        .then(res => {
          console.log(res.data);
        });
    }
  }
};
</script>
<style scoped>
#adduser {
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
</style>
