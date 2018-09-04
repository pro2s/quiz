<template>
    <div v-if="quiz">
        <b-card :title="quiz.name" 
            :img-src="quiz.image + '&' + quiz.slug" 
            img-alt="Image" 
            img-top 
            tag="article" 
            class="mb-2"> 
                <p class="card-text"> 
                    {{ quiz.description }}
                </p> 
        </b-card> 
    </div>
</template> 

<script> 

export default { 
    props: ['quiz'],
} 
</script>