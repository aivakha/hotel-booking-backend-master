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
        {
            path: '/rooms/:slug',
            name: 'rooms.show',
            component: () => import('../views/Rooms/Show.vue')
        },
        {
            path: '/apartments/:slug',
            name: 'apartments.show',
            component: () => import('../views/Apartments/Show.vue')
        },
    ]
})

export default router
