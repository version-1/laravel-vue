<template>
    <nav class="navbar navbar-default">
        <div class="title">
            <div class="title-text">Samples</div>
            <div class="site-description">
                <p>{{ description }}</p>
            </div>
        </div>
        <div class="menu-bar">
            <ul class="menu">
                <li
                v-for="(item , idx ) in items"
                v-bind:class="{ active: item.isActive }"
                @click="activeLink"
                class="menu-item" >
                <router-link v-bind:to="item.url">{{item.text}}</router-link>
            </li>
        </ul>
    </div>
</nav>
</template>

<script>
export default {
    data(){
        return {
            items: [
                { url: '/' , text: 'BOOKS' , isActive: true},
                { url: '/authores' , text: 'AUTHORS' , isActive: false}
            ]
        }
    },
    props:['description'],
    methods:{
        activeLink(event){
            this.items.forEach(function(item) {
                item.isActive = event.target.text === item.text ;
            });
        }

    }
}
</script>
