export default [
    {
        name: 'external',
        path: '/',
        component: () => import('../components/External'),
        props: (route) => route.query
    }
]