<template>
    <b-container class="bv-example-row">
        <b-row>
            <b-col></b-col>
            <b-col>
                <b-card title="Card Title"
                    img-src="https://picsum.photos/600/300/?image=25"
                    img-alt="Image"
                    img-top
                    tag="article"
                    style="max-width: 20rem;"
                    class="mb-2">
                        <p class="card-text">
                            ome quick example text to build on the card title and make up the bulk of the card's content.
                        </p>
                        <b-list-group>
                            <b-list-group-item v-for="quiz in quizes" :key="quiz.id">{{ quiz.name }}</b-list-group-item>
                        </b-list-group>
                </b-card>
            </b-col>
            <b-col></b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
         data: function () {
            return {
                'quizes' : this.$root.sharedState.quizes
            }
        },

        mounted() {
            console.log('List component mounted.')
        }
    }
</script>
