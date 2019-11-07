import axios from 'axios';
import qs from 'qs';
// axios 配置
axios.defaults.timeout = 5000;
axios.defaults.headers.post['Content-Type'] = 'application/x-www-form-urlencoded;charset=UTF-8';
axios.defaults.withCredentials = true;
//Axios实现请求重试
axios.defaults.retry = 1; //重试次数
axios.defaults.retryDelay = 1000; //重试延时
axios.defaults.shouldRetry = (error) => true; //重试条件，默认只要是错误都需要重试

/* 封装get方法*/
export function get(url,params={}){
return new Promise((resolve,reject)=>{
axios.get(url,{
params:params
}).then(response=>{
resolve(response.data);
}).catch(err=>{
reject(err);
})
})
}

/* 封装post方法 */
export function post(url,data={}){
return new Promise((resolve,reject)=>{
axios.post(url,qs.stringify(data)).then(response=>{
resolve(response.data);
}).catch(err=>{
reject(err);
})
})
}
