export default {
    data(){
        return{

        }
    },
    methods:{
        async callApi(method, url, dataObj){
            try {
                return await axios({
                    method: method,
                    url: url,
                    data: dataObj,
                })
            } catch (e) {
                console.log(e)
                return e.response
            }
        },

    },

}