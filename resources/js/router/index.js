import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/Home/Index.vue')
        },
        {
            path: '/rooms',
            name: 'rooms',
            component: () => import('../views/Rooms/Index.vue')
        },
    ]
})

export default router
