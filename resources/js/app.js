import './bootstrap';

import '../css/app.css';


import { createApp, h } from 'vue'
import { createInertiaApp, router, Link } from '@inertiajs/vue3'

import NProgress from 'nprogress'

createInertiaApp({
  resolve: name => {
    const pages = import.meta.glob('./Pages/**/*.vue', { eager: true })
    return pages[`./Pages/${name}.vue`]
  },
  setup({ el, App, props, plugin }) {
    createApp({ render: () => h(    App, props) })
      .use(plugin)
      .component('Link', Link)
      .mount(el)
  },

  progress: {
    // The delay after which the progress bar will appear, in milliseconds...
    delay: 250,

    // The color of the progress bar...
    color: '#cc2718',

    // Whether to include the default NProgress styles...
    includeCSS: true,

    // Whether the NProgress spinner will be shown...
    showSpinner: true,
  },
})

router.on('start', () => NProgress.start())
router.on('finish', () => NProgress.done())

