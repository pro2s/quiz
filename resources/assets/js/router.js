import Router from 'vue-router'
import Post from './components/Post.vue'
import Hello from './components/Hello.vue'

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
    ]
});

export default router;