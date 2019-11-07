<template>
    <div id="comm">
  
          <table>
              <thead>
                  <th>
                      <tr>名字</tr>
                  </th>
                     <th>
                      <tr>留言</tr>
                  </th>
              </thead>
              <tbody v-for="(item,index) in comm" :key="index">
                  <td>
                      <tr>{{item.name}}</tr>
                  </td>
                   <td>
                      <tr>{{item.text}}</tr>
                  </td>
               
              </tbody>
          </table>
    
        
        
    </div>
</template>
<script>
export default {
    name:"comm",
    data(){
        return{
           comm:[{
               name:'',
               text:''
           }]

           
        }
    },components:{
    },
    methods:{
        gotcomm(){
       this.axios.get('http://chenjiale.gz01.bdysite.com/api/api2/gotcomm.php')
       .then(res=>{
           console.log(res.data)
           this.comm=res.data
       })
        }
    },
    created(){
        this. gotcomm()
    }
}
</script>
<style scoped>
#comm{
    height: 500px;
    width: 800px;
    background: #fff;
    margin: 20px auto;
}
table{
    width: 60%;
    height: 20px;
    color: #000;
    text-align: center;
    margin: 20px auto;
}
table td,table th{
border: 1px solid #ddd;

}
table tr{
    text-align: center;
}
</style>
