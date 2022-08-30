<template>
    <div>
        <form  @submit.prevent="storeData()">
            <input type="text" placeholder="Nome" v-model="name">
            <br>
            <textarea name="" id="" cols="30" rows="10" placeholder="nserisci testo" v-model="content"></textarea>
            <button type="submit">Invia dati</button>
        </form>
    </div>
</template>

<script>
    import axios from 'axios';
export default {
    data(){
        return{
            name:"",
            content:""
        }
    },
    methods:{
        storeData(){
            
            axios.post("/api/contacts",{
                name: this.name,
                content: this.content
            })
        }
    }
}
</script>