import Home from './components/admin/Home.vue';

import Example from './components/ExampleComponent.vue';
import CategoryList from './components/admin/category/List.vue';
import AddCategory from './components/admin/category/New.vue';
import EditCategory from './components/admin/category/Edit.vue';

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
        path: '/category-list',
        component: CategoryList
    },
    {
        path: '/add',
        component: AddCategory
    },
     {
        path: '/edit-category/:categoryId',
        component: EditCategory
    }


    
];

