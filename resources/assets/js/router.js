import Router from 'vue-router';
import Quizzes from './components/Quizzes.vue';
import User from './components/User.vue';
import Quiz from './components/Quiz.vue';

const router = new Router({
    routes: [ 
        { 
            path: '/', 
            name:'home', 
            component: Quizzes, 
            props: true, 
        },
        {
            path: '/user/:userId',
            name: 'user',
            component: User
        },
        { 
            path: '/quiz/:slug', 
            name:'quiz', 
            component: Quiz, 
            props: true, 
        },
    ]
});

export default router;