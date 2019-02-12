<template> 
    <div>
        <b-card-footer>{{ question.title }}</b-card-footer>
        <b-card-body v-if="question.description">
            <p class="card-text"> 
                {{ question.question }}
            </p> 
        </b-card-body>
        <b-card-img v-if="question.image" :img-src="question.image"
                    alt="Question Image"
                    bottom>
        </b-card-img>
        <b-list-group flush>
            <b-list-group-item v-for="answer in question.answers" href="#"
                :key="answer.id" 
                :variant="answer.id === selectedAnswer ? 'primary' : ''"
                @click="selectAnswer(answer.id)">
                    {{ answer.answer }}
            </b-list-group-item>
        </b-list-group>
        <b-card-footer v-if="selectedAnswer" :class="{'bg-warning': getAnswer === false, 'bg-success': getAnswer === true}">
            <transition name="slide-fade" :duration="1000" @after-leave="getNext()" @enter="leave()">
                <b-button variant="success" @click="send()" v-if="getAnswer === undefined">
                    Next question
                </b-button>
            </transition>
        </b-card-footer>
    </div>
</template> 
 
<script> 
    import { mapActions, mapGetters } from 'vuex'
    export default { 
        props: ['question', 'quizSlug'],
        data() {
            return {
                selectedAnswer: undefined,
                answer: undefined
            }
        },
        watch: {
            'question': function(newQuestion, oldQuestion) {
                if (newQuestion.slug !== oldQuestion.slug) {
                    this.selectedAnswer = undefined;
                }
            }
        }, 
        computed: {
            ...mapGetters([ 
                'getAnswer'
            ])
        },
        methods: {
            ...mapActions([
                'setAnswer',
                'sendAnswer',
                'getNextQuizQuestion'
            ]),
            selectAnswer(id) {
                console.info(this.question.slug);
                this.selectedAnswer = id;
            },
            send() {
                this.answer = {'quiz': this.quizSlug, 'question': this.question.slug, 'id': this.selectedAnswer};
                this.sendAnswer(this.answer);
                console.time('answer')
            },
            leave() {
                console.timeLog('answer');    
            },
            getNext() {
                console.timeLog('answer');
                console.timeEnd('answer')
                this.getNextQuizQuestion(this.answer);
            }
        }
    } 
</script> 

<style scoped>
    .slide-fade-enter-active {
        transition: all .3s ease;
    }
    .slide-fade-leave-active {
        transition: all .8s cubic-bezier(1.0, 0.5, 0.8, 1.0);
    }
    .slide-fade-enter, .slide-fade-leave-to {
        transform: translateX(500px);
        opacity: 0;
    }
</style>
