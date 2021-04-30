import Home from './components/admin/Home.vue';

import Example from './components/ExampleComponent.vue';
import Category from './components/admin/category.vue';

export const routes = [
    {
        path:'/',
        component:Home
    },

    {
        path: '/post',
        component: Example
    },
    {
        path: '/category',
        component: Category
    }

    
];

