import Home from './views/Home.vue';
// import About from './pages/About.vue';


const router = {
    mode: 'history',
    linkExactActiveClass: 'active',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home
        },
    ]
};

export default router;
