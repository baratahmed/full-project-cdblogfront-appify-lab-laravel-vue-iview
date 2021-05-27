<template>
    <div class="menu_srch d-flex" @click="showSearch = !showSearch">
        <i class="fas fa-search search_btn"></i>
        <!-- SEARCH INPUT  dis_none-->
        <div class="header_serch" @click.stop v-if="showSearch">
            <div class="header_serch_input">
                <input type="" v-model="str" @keyup.enter="searchBlog" placeholder="Search">
            </div>
            <div class="header_serch_i" @click="searchBlog">
                <i class="fas fa-search"></i>
            </div>
        </div>
        <!-- SEARCH INPUT -->
    </div>
</template>

<script>
export default {
    data(){
        return{
            showSearch : false,
            str : '',
        }
    },
    methods: {
        searchBlog(){
            window.location = `http://cherisheddream.xyz/cdblogfront/search?str=${this.str}`
        }
    },
}
</script>
