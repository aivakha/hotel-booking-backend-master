import { createRouter, createWebHistory } from 'vue-router'

const router = createRouter({
    history: createWebHistory(process.env.BASE_URL),
    routes: [
        {
            path: '/',
            name: 'home',
            component: () => import('../views/Home/Index.vue'),
            meta: { title: 'Головна' }
        },
        {
            path: '/rooms',
            name: 'rooms',
            component: () => import('../views/Rooms/Index.vue'),
            meta: { title: 'Підбір житла' }
        },
        {
            path: '/rooms/:slug',
            name: 'rooms.show',
            component: () => import('../views/Rooms/Show.vue'),
            meta: { title: 'Кімната' }
        },
        {
            path: '/apartments/:slug',
            name: 'apartments.show',
            component: () => import('../views/Apartments/Show.vue'),
            meta: { title: 'Апартамент' }
        },
        // {
        //     path: '/login',
        //     name: 'auth.login',
        //     component: () => import('../views/Auth/Login.vue')
        // },
        // {
        //     path: '/register',
        //     name: 'auth.register',
        //     component: () => import('../views/Auth/Register.vue')
        // },
    ]
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title

    next()
});

export default router
