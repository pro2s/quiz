<template>
    <div v-if="quiz">
        <b-card no-body
            :img-src="quiz.image + '&' + quiz.slug" 
            img-alt="Quiz Image" 
            img-top 
            tag="article" 
            class="mb-2"> 
                <h4 slot="header">{{quiz.name}}</h4>
                <b-card-body>
                    <p class="card-text"> 
                        {{ quiz.description }}
                    </p> 
                </b-card-body>
            </b-card> 
    </div>
</template> 

<script> 
export default { 
    props: ['quiz']
} 
</script>
