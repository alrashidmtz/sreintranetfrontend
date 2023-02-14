
const routes = [
  {
    path: '/',
    component: () => import('layouts/MainLayout.vue'),
    children: [
      { path: '/', name: 'home', component: () => import('pages/IndexPage.vue') },
      { path: 'documentacion', name: 'documentacion', component: () => import('pages/DocumentacionPage.vue') },
      { path: 'proteccion', name: 'proteccion', component: () => import('pages/ProteccionPage.vue') },
      { path: 'civil', name: 'civil', component: () => import('pages/CivilPage.vue') },
      { path: 'comunitarios', name: 'comunitario', component: () => import('pages/ComunitariosPage.vue') },
      { path: 'general', name: 'general', component: () => import('pages/GeneralPage.vue') },
      { path: 'minutario', name: 'minutario', component: () => import('pages/MinutarioPage.vue') },
      { path: 'vacaciones', name: 'vacaciones', component: () => import('pages/VacacionesPage.vue') },
      { path: 'conmovil', name: 'conmovil', component: () => import('pages/MovilPage.vue') },
      { path: 'settings', name: 'settings', component: () => import('pages/SettingsPage.vue') },
    ]
  },

  // Always leave this as last one,
  // but you can also remove it
  {
    path: '/:catchAll(.*)*',
    component: () => import('pages/ErrorNotFound.vue')
  }
]

export default routes
