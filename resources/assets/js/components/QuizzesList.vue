<template> 
    <b-row> 
        <b-col cols="4" v-for="quiz in allQuizzes" :key="quiz.slug"> 
            <b-card :title="quiz.name" 
                :img-src="quiz.image + '&' + quiz.slug" 
                img-alt="Image" 
                img-top 
                tag="article" 
                style="max-width: 20rem;margin-top: 20px;" 
                class="mb-2"> 
                    <p class="card-text"> 
                        {{ quiz.description }}
                    </p> 
                <b-button href="#" variant="success">Go</b-button> 
            </b-card> 
        </b-col> 
    </b-row> 
</template> 

<script> 
import { mapGetters } from 'vuex' 
export default { 
  computed: mapGetters([ 
    'allQuizzes' 
  ]), 
} 
</script>