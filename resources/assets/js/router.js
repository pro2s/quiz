import Router from 'vue-router';
import Quizzes from './components/Quizzes.vue'
const router = new Router({
    routes: [ 
        { 
            path: '/', 
            name:'home', 
            component: Quizzes, 
            props: true, 
        },
    ]
});

export default router;