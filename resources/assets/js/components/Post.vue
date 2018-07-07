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
                    <b-button href="#" variant="primary">Post somewhere</b-button>
                </b-card>
            </b-col>
            <b-col></b-col>
        </b-row>
    </b-container>
</template>

<script>
    export default {
        mounted() {
            console.log('Post component mounted.')
        }
    }
</script>
