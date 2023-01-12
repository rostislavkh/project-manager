require('./bootstrap')

import { createApp } from 'vue'
import MainController from './components/main/controller'

const app = createApp({})

app.component('main-controller', MainController);

app.mount('#app')