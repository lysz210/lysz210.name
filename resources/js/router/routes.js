export default [
    {
        name: 'external',
        path: '/:lang',
        component: () => import('../components/External'),
        props: true
    },
    {
        path: '*',
        redirect: '/en'
    }
]
