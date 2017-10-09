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
                        書名
                    </th>
                    <th>
                        著者
                    </th>
                    <th>
                        ISBN
                    </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(book, key) in books">
                    <td>{{ book.id }}</td>
                    <td>
                        {{ book.name }}
                    </td>
                    <td>
                        {{ book.author }}
                    </td>
                    <td>
                        {{ book.isbn }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    created() {
        this.fetchBooks(),
        this.timer = setInterval(this.fetchBooks, 15000)
    },
    data() {
        return {
            books: [],
            is_init: false,
            message: "Fetching Data..."
        }
    },
    props: ['book'],
    methods: {
        fetchBooks() {
            axios.get('/api/books')
            .then(res =>  {
                this.books = res.data;
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
