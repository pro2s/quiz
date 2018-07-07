import Router from 'vue-router'
import Post from './components/Post.vue'
import Hello from './components/Hello.vue'
import Login from './components/Login.vue'
import List from './components/quiz/List.vue'

const router = new Router({
    routes: [
      {
        path: '/',
        name:'home',
        component: Hello,
      },
      {
        path: '/post/:id',
        name:'post',
        component: Post,
        props: true,
      },
      {
        path: '/login',
        name:'login',
        component: Login,
        props: true,
      },
      {
        path: '/list',
        name:'list',
        component: List,
        props: true,
      },
    ]
});

export default router;