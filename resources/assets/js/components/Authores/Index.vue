<template>
    <div class="books">
        <p>{{message}}</p>
        <table class="table" v-if="is_init">
            <thead>
                <tr>
                    <th>
                        ID
                    </th>
                    <th>
                        著者
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(author, key) in authores">
                    <td>{{key + 1}}</td>
                    <td>
                        {{ author.author }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    created() {
        this.fetchAuthores(),
        this.timer = setInterval(this.fetchAuthores, 15000)
    },
    data() {
        return {
            authores: [],
            is_init: false,
            message: "Fetching Data..."
        }
    },
    methods: {
        fetchAuthores() {
            axios.get('/api/authores')
            .then(res =>  {
                this.authores = res.data;
                this.is_init = true;
                this.message = "";
            });

        },
        cancelAutoUpdate: function() {
            clearInterval(this.timer)
        }
    },
    beforeDestroy() {clearInterval(this.timer)}
}
</script>
