import Home from './components/admin/Home.vue';

import CategoryList from './components/admin/category/List.vue';
import AddCategory from './components/admin/category/New.vue';
import EditCategory from './components/admin/category/Edit.vue';

// post

import PostList from './components/admin/post/PostList.vue';
import AddPost from './components/admin/post/New.vue'


export const routes = [
    {
        path:'/',
        component:Home
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
    },
    {
        path: '/post-list',
        component: PostList
    },
    {
        path: '/add-post',
        component: AddPost
    },


    
];

